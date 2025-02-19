<?php

namespace App\Services;

use App\Models\CivilServiceEligibility;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class CivilServiceEligibilityService
{

    /**
     * Creates or updates the eligibility entry
     * @param array $data
     * @return bool
     */
    public function store($data): bool
    {
        DB::beginTransaction();
        try {
            $pdsEntryId = $data['pds_entry_id'];

            $existingRecords = CivilServiceEligibility::where('pds_entry_id', $pdsEntryId)
                ->get()
                ->keyBy(function ($item) {
                    return $item->pds_entry_id . '_' . $item->career_service;
                });


            $processedData = $this->filterData($data['eligibilities'], $pdsEntryId, ['career_service']);
            $processedKeys = [];

            // dd($processedData);

            foreach ($processedData as $entry) {
                $key = $entry['pds_entry_id'] . '_' . $entry['career_service'];
                $processedKeys[] = $key;

                if ($existingRecords->has($key)) {
                    $existingRecords[$key]->update($entry);
                } else {
                    CivilServiceEligibility::create($entry);
                }
            }

            if (!empty($pdsEntryId)) {
                CivilServiceEligibility::where('pds_entry_id', $pdsEntryId)
                    ->whereNotIn(DB::raw("CONCAT(pds_entry_id, '_', career_service)"), $processedKeys)
                    ->delete();
            }

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollback();
            \Log::error('Failed to update eligibilities:', ['error' => $e->getMessage()]);
            return false;
        }
    }

    public function filterData($entries, $pdsEntryId, $columns = [])
    {
        $validData = [];

        // Ensure $entries is an array
        if (!is_array($entries)) {
            throw new InvalidArgumentException('Invalid entry provided. Must be an array.');
        }

        foreach ($entries as $entry) {
            // Convert object to array if necessary
            $entryArray = is_object($entry) ? (array) $entry : $entry;

            $entryArray['pds_entry_id'] = $pdsEntryId;

            $isValid = true;

            // Validate each required column
            foreach ($columns as $column) {
                if (!array_key_exists($column, $entryArray) || is_null($entryArray[$column])) {
                    $isValid = false;
                    break; // Skip adding this entry
                }
            }

            if ($isValid) {
                $validData[] = $entryArray; // Store only valid data
            }
        }

        return $validData; // Return only filtered valid entries
    }
}
