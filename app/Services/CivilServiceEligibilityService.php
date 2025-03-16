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
        // dd($data);
        // Validate required data
        if (empty($data['eligibilities']) || !is_array($data['eligibilities'])) {
            \Log::warning('No eligibilities provided or invalid format');
            return false;
        }

        $pdsEntryId = $data['pds_entry_id'] ?? null;
        if (empty($pdsEntryId)) {
            \Log::warning('No PDS entry ID provided');
            return false;
        }

        \Log::info('Processing eligibilities for PDS entry: ' . $pdsEntryId);
        \Log::info('Data received: ' . json_encode($data['eligibilities']));

        DB::beginTransaction();

        try {
            $existingRecords = CivilServiceEligibility::where('pds_entry_id', $pdsEntryId)
                ->get()
                ->keyBy(function ($item) {
                    return $this->generateUniqueKey($item);
                });

            \Log::info('Existing records: ' . $existingRecords->count());

            $processedData = $this->filterData($data['eligibilities'], $pdsEntryId, ['career_service']);
            $processedKeys = [];
            \Log::info('Filtered data count: ' . count($processedData));

            // dd($processedData);

            foreach ($processedData as $entry) {
                if (isset($entry['exam_date']) && !empty($entry['exam_date'])) {
                    $entry['exam_date'] = date('Y-m-d', strtotime($entry['exam_date']));
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
                    CivilServiceEligibility::create($entry);
                }
            }

            if (!empty($pdsEntryId) && count($processedKeys) > 0) {
                $deleteQuery = CivilServiceEligibility::where('pds_entry_id', $pdsEntryId)
                    ->whereNotIn(DB::raw("CONCAT(pds_entry_id, '_', LOWER(TRIM(career_service)), '_', DATE_FORMAT(exam_date, '%Y-%m-%d'))"), $processedKeys);

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
            \Log::error('Failed to update eligibilities:', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            return false;
        }
    }

    private function generateUniqueKey($entry)
    {
        return trim($entry['pds_entry_id']) . '_' .
            strtolower(trim($entry['career_service'])) . '_' .
            date('Y-m-d', strtotime($entry['exam_date']));
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
