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
        if (empty($data['voluntaryWorks']) || !is_array($data['voluntaryWorks'])) {
            \Log::warning('No voluntary work experiences provided or invalid format');
            return false;
        }

        $pdsEntryId = $data['pds_entry_id'] ?? null;

        if (empty($pdsEntryId)) {
            \Log::warning('No PDS entry ID provided');
            return false;
        }

        \Log::info('Processing work experiences for PDS entry: ' . $pdsEntryId);
        \Log::info('Data received: ' . json_encode($data['voluntaryWorks']));

        DB::beginTransaction();

        try {
            $existingRecords = VoluntaryWorkExperience::where('pds_entry_id', $pdsEntryId)
                ->get()
                ->keyBy(function ($item) {
                    return $this->generateUniqueKey($item);
                });
            \Log::info('Existing records: ' . $existingRecords->count());


            $processedData =  $this->filterData($data['voluntaryWorks'], $pdsEntryId, ['position', 'organization_name', 'date_from']);
            \Log::info('Filtered data count: ' . count($processedData));

            $processedKeys = [];

            foreach ($processedData as $entry) {
                // Ensure date_from is in correct format
                if (isset($entry['date_from']) && !empty($entry['date_from'])) {
                    $entry['date_from'] = date('Y-m-d', strtotime($entry['date_from']));
                }

                $key = $this->generateUniqueKey($entry);
                $processedKeys[] = $key;

                \Log::info('Processing entry: ' . json_encode($entry));
                \Log::info('Generated key: ' . $key);

                if ($existingRecords->has($key)) {
                    \Log::info('Updating existing record');
                    $existingRecords[$key]->update($entry);
                } else {
                    \Log::info('Creating new record');
                    VoluntaryWorkExperience::create($entry);
                }
            }

            if (!empty($pdsEntryId) && count($processedKeys) > 0) {
                $deleteQuery = VoluntaryWorkExperience::where('pds_entry_id', $pdsEntryId)
                    ->whereNotIn(DB::raw("
                        CONCAT(
                            pds_entry_id,
                            '_',
                            LOWER(TRIM(position)),
                            '_',
                            LOWER(TRIM(organization_name)),
                            '_',
                            DATE_FORMAT(date_from, '%Y-%m-%d'
                        ))"), $processedKeys);

                // dd($deleteQuery);
                $toDelete = $deleteQuery->count();
                \Log::info('Records to delete: ' . $toDelete);

                if($toDelete > 0){
                    $deleteQuery->delete();
                }
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
     * Generate a consistent and unique key for work experience entries.
     */
    private function generateUniqueKey($entry)
    {
        return trim($entry['pds_entry_id']) . '_' .
            strtolower(trim($entry['position'])) . '_' .
            strtolower(trim($entry['organization_name'])) . '_' .
            date('Y-m-d', strtotime($entry['date_from']));
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
