<?php

namespace App\Services;

use App\Models\Children;
use Exception;
use Illuminate\Support\Facades\DB;

class ChildrenService
{
    /**
     * Delete existing children's data and insert new ones
     * @param array $data
     * @return bool
     */
    public function store(array $data): bool
    {
        // dd($data['children']);
        DB::beginTransaction();

        try {
            $pdsEntryId = $data['pds_entry_id'];

            // Filter valid children (ensure 'full_name' and 'birth_date' exist)
            $validChildren = array_filter($data['children'], function ($child) {
                return !empty($child['full_name']) && !empty($child['birth_date']);
            });

            // **Delete all existing children first to prevent duplicates**
            Children::where('pds_entry_id', $pdsEntryId)->delete();

            if (!empty($validChildren)) {
                $childrenData = $this->prepareData($pdsEntryId, $validChildren);

                // Bulk insert new children
                Children::upsert(
                    $childrenData,
                    ['pds_entry_id', 'fullname'], // Unique constraint
                    ['birth_date', 'updated_at'] // Columns to update
                );
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollback();
            \Log::error("Failed to update children's draft", ['error' => $e->getMessage()]);

            return false;
        }
    }

    protected function prepareData($pdsEntryId, $childrenData)
    {
        return array_map(fn($child) => [
            'pds_entry_id' => $pdsEntryId,
            'fullname' => trim($child['full_name']),
            'birth_date' => $child['birth_date'],
            'updated_at' => now(),
        ], $childrenData);
    }
}
