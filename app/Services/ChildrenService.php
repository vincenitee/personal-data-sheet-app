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
        DB::beginTransaction();

        try {
            // Delete all existing children records for the given pds_entry_id
            Children::where('pds_entry_id', $data['pds_entry_id'])->delete();

            // Filter valid children (ensure no null values)
            $validChildren = array_filter($data['children'], function ($child) {
                return !empty($child['full_name']) && !empty($child['birth_date']);
            });

            // Insert only valid children records
            foreach ($validChildren as $child) {
                Children::create([
                    'pds_entry_id' => $data['pds_entry_id'],
                    'fullname' => trim($child['full_name']), // Trim to remove accidental spaces
                    'birth_date' => $child['birth_date'],
                ]);
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollback();
            \Log::error("Failed to update children's draft", ['error' => $e->getMessage()]);
            return false;
        }
    }
}
