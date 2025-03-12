<?php

namespace App\Services;

use Exception;
use App\Models\Training;
use Carbon\Carbon;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;

class TrainingService
{
    /**
     * Creates or updates the work experience entry
     * @param array $data
     * @return bool
     */
    public function store($data): bool
    {
        // Validate required data
        if (empty($data['trainings']) || !is_array($data['trainings'])) {
            \Log::warning('No trainings provided or invalid format');
            return false;
        }

        $pdsEntryId = $data['pds_entry_id'] ?? null;
        if (empty($pdsEntryId)) {
            \Log::warning('No PDS entry ID provided');
            return false;
        }

        \Log::info('Processing trainings for PDS entry: ' . $pdsEntryId);
        \Log::info('Data received: ' . json_encode($data['trainings']));

        DB::beginTransaction();

        try {
            // Fetch existing records
            $existingRecords = Training::where('pds_entry_id', $pdsEntryId)
                ->get()
                ->keyBy(function ($item) {
                    return $this->generateUniqueKey($item);
                });

            // dd($existingRecords);
            $processedData = $this->filterData($data['trainings'], $pdsEntryId, ['title', 'type', 'sponsored_by', 'date_from']);
            $processedKeys = [];

            foreach ($processedData as $entry) {
                if (isset($entry['date_from']) && !empty($entry['date_from'])) {
                    $entry['date_from'] = Carbon::parse($entry['date_from'])->format('Y-m-d');
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
                    Training::create($entry);
                }
            }

            if (!empty($pdsEntryId)) {

                $deleteQuery = Training::where('pds_entry_id', $pdsEntryId)
                    ->whereNotIn(DB::raw("CONCAT(
                        pds_entry_id, '_',
                        LOWER(TRIM(title)), '_',
                        LOWER(TRIM(type)), '_',
                        DATE_FORMAT(date_from, '%Y-%m-%d')
                    )"), $processedKeys);

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

            \Log::error('Failed to update trainings data: ' . $e->getMessage());

            return false;
        }
    }

    /**
     * Generate a consistent and unique key for work experience entries.
     */
    private function generateUniqueKey($entry)
    {
        return trim($entry['pds_entry_id']) . '_' .
            strtolower(trim($entry['title'])) . '_' .
            strtolower(trim($entry['type'])) . '_' .
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
