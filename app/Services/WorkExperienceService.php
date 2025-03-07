<?php

namespace App\Services;

use Exception;
use InvalidArgumentException;
use App\Models\WorkExperience;
use Illuminate\Support\Facades\DB;

class WorkExperienceService
{

    /**
     * Creates or updates the work experience entry
     * @param array $data
     * @return bool
     */
    public function store($data): bool
    {
        // dd($data);
        DB::beginTransaction();

        try {
            $pdsEntryId = $data['pds_entry_id'] ?? null;

            // Fetch existing records
            $existingRecords = WorkExperience::where('pds_entry_id', $pdsEntryId)
                ->get()
                ->keyBy(function ($item) {
                    return "{$item->pds_entry_id}_{$item->position}_{$item->agency}_{$item->date_from}";
                });

            $processedData = $this->filterData($data['workExperiences'], $pdsEntryId, ['position', 'agency', 'status', 'date_from']);
            $processedKeys = [];

            foreach($processedData as $entry){
                $key = "{$entry['pds_entry_id']}_{$entry['position']}_{$entry['agency']}_{$entry['date_from']}";
                $processedKeys[] = $key;

                if($existingRecords->has($key)){
                    // dump($existingRecords);
                    $existingRecords[$key]->update($entry);
                } else{
                    WorkExperience::create($entry);
                }

                // dump($entry);
            }

            if(!empty($pdsEntryId)){
                WorkExperience::where('pds_entry_id', $pdsEntryId)
                    ->whereNotIn(DB::raw("CONCAT(pds_entry_id, '_', position, '_', agency, '_', date_from)"), $processedKeys)
                    ->delete();
            }

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollback();

            \Log::error('Failed to update work experiences data: ' . $e->getMessage());

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
