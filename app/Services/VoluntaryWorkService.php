<?php

namespace App\Services;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\Models\VoluntaryWorkExperience;

class VoluntaryWorkService
{

    /**
     * Creates or updates a voluntary work record
     * @param array $data
     * @return bool
     */
    public function store($data)
    {
        DB::beginTransaction();

        try {
            $pdsEntryId = $data['pds_entry_id'] ?? null;

            $existingRecords = VoluntaryWorkExperience::where('pds_entry_id', $pdsEntryId)
                ->get()
                ->keyBy(function ($item) {
                    return "{$item->pds_entry_id}_{$item->position}_{$item->organization_name}_{$item->date_from}";
                });

            $processedData =  $this->filterData($data['voluntaryWorks'], $pdsEntryId, ['position', 'organization_name', 'date_from']);
            $processedKeys = [];


            foreach ($processedData as $entry) {
                $key = "{$entry['pds_entry_id']}_{$entry['position']}_{$entry['organization_name']}_{$entry['date_from']}";

                $processedKeys[] = $key;

                if ($existingRecords->has($key)) {
                    $existingRecords[$key]->update($entry);
                } else {
                    VoluntaryWorkExperience::create($entry);
                }
            }

            if (!empty($pdsEntryId) && count($processedKeys) > 0) {
                VoluntaryWorkExperience::where('pds_entry_id', $pdsEntryId)
                    ->whereNotIn(DB::raw("CONCAT(pds_entry_id, '_', position, '_', organization_name, '_', date_from)"), $processedKeys)
                    ->delete();
            }

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollback();

            \Log::error('Failed to update voluntary work experiences data: ' . $e->getMessage());

            return false;
        }
    }

    /**
     * Filters and validates work experience entries
     */
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
