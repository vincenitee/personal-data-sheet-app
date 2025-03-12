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
        // Validate required data
        if (empty($data['workExperiences']) || !is_array($data['workExperiences'])) {
            \Log::warning('No work experiences provided or invalid format');
            return false;
        }

        $pdsEntryId = $data['pds_entry_id'] ?? null;
        if (empty($pdsEntryId)) {
            \Log::warning('No PDS entry ID provided');
            return false;
        }

        \Log::info('Processing work experiences for PDS entry: ' . $pdsEntryId);
        \Log::info('Data received: ' . json_encode($data['workExperiences']));

        DB::beginTransaction();

        try {
            // Fetch existing records with normalized keys
            $existingRecords = WorkExperience::where('pds_entry_id', $pdsEntryId)
                ->get()
                ->keyBy(function ($item) {
                    return $this->generateUniqueKey($item);
                });

            \Log::info('Existing records: ' . $existingRecords->count());

            $processedData = $this->filterData($data['workExperiences'], $pdsEntryId, ['position', 'agency', 'status', 'date_from']);
            \Log::info('Filtered data count: ' . count($processedData));

            $processedKeys = [];

            foreach ($processedData as $entry) {
                // Ensure date_from is in the correct format
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
                    WorkExperience::create($entry);
                }
            }

            if (!empty($pdsEntryId) && count($processedKeys) > 0) {
                $deleteQuery = WorkExperience::where('pds_entry_id', $pdsEntryId)
                    ->whereNotIn(DB::raw("CONCAT(pds_entry_id, '_', LOWER(TRIM(position)), '_', LOWER(TRIM(agency)), '_', DATE_FORMAT(date_from, '%Y-%m-%d'))"), $processedKeys);

                $toDelete = $deleteQuery->count();
                \Log::info('Records to delete: ' . $toDelete);

                if ($toDelete > 0) {
                    $deleteQuery->delete();
                }
            }

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollback();
            \Log::error('Failed to update work experiences data: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
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
            strtolower(trim($entry['agency'])) . '_' .
            date('Y-m-d', strtotime($entry['date_from']));
    }

    /**
     * Filters and validates work experience entries
     */
    public function filterData($entries, $pdsEntryId, $columns = [])
    {
        $validData = [];

        if (!is_array($entries)) {
            throw new InvalidArgumentException('Invalid entry provided. Must be an array.');
        }

        foreach ($entries as $entry) {
            $entryArray = is_object($entry) ? (array) $entry : $entry;
            $entryArray['pds_entry_id'] = $pdsEntryId;

            $isValid = true;

            foreach ($columns as $column) {
                if (!array_key_exists($column, $entryArray) || is_null($entryArray[$column])) {
                    $isValid = false;
                    break;
                }
            }

            if ($isValid) {
                $validData[] = $entryArray;
            }
        }

        return $validData;
    }
}
