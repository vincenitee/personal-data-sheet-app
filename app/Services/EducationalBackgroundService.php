<?php
namespace App\Services;

use App\Models\EducationalBackground;
use Exception;
use Illuminate\Support\Facades\DB;

class EducationalBackgroundService
{
    public function store($data)
    {
        // dd($data);
        DB::beginTransaction();

        try {
            $pdsEntryId = $data['pds_entry_id'] ?? null;

            // Get existing records for this PDS entry
            $existingRecords = EducationalBackground::where('pds_entry_id', $pdsEntryId)
                ->get()
                ->keyBy(function ($item) {
                    // Create a unique key combining level and school_name
                    return $item->level . '_' . $item->school_name;
                });

            $processedData = $this->prepareData($data);

            // Track which records were processed
            $processedKeys = [];

            foreach ($processedData as $entry) {
                $key = $entry['level'] . '_' . $entry['school_name'];
                $processedKeys[] = $key;

                if ($existingRecords->has($key)) {
                    // Update existing record
                    $existingRecords[$key]->update($entry);
                } else {
                    // Insert new record
                    EducationalBackground::create($entry);
                }
            }

            // Delete records that are no longer present in the new data
            if (!empty($pdsEntryId)) {
                EducationalBackground::where('pds_entry_id', $pdsEntryId)
                    ->whereNotIn(DB::raw("CONCAT(level, '_', school_name)"), $processedKeys)
                    ->delete();
            }

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            \Log::error("Failed to save educational background entry: " . $e->getMessage());
            return false;
        }
    }

    protected function prepareData($data)
    {
        $processedData = [];
        $pdsEntryId = $data['pds_entry_id'] ?? null;

        foreach ($data as $level => $entries) {
            if ($level === 'pds_entry_id') {
                continue;
            }

            $entries = is_array(reset($entries)) ? $entries : [$entries];

            foreach ($entries as $entry) {
                if ($this->isValidData($entry)) {
                    $processedData[] = [
                        'pds_entry_id' => $pdsEntryId,
                        'level' => $level,
                        'school_name' => $entry['school_name'] ?? null,
                        'degree_earned' => $entry['degree_earned'] ?? null,
                        'attendance_from' => $entry['attendance_from'] ?? null,
                        'attendance_to' => $entry['attendance_to'] ?? null,
                        'level_unit_earned' => $entry['level_unit_earned'] ?? null,
                        'year_graduated' => $entry['year_graduated'] ?? null,
                        'academic_honors' => $entry['academic_honors'] ?? null,
                        'updated_at' => now(),
                    ];
                }
            }
        }

        return $processedData;
    }

    protected function isValidData($entry) {
        return !empty($entry['school_name'])
            && !empty($entry['attendance_from']);
    }
}
