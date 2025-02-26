<?php

namespace App\Services;

use Exception;
use InvalidArgumentException;
use App\Models\ReferencePerson;
use Illuminate\Support\Facades\DB;

class ReferencePersonService
{

    /**
     * Create or update a reference person entry
     * @param array data
     * @return bool
     */
    public function store(array $data): bool
    {
        DB::beginTransaction();

        try {
            $additionalQuestionId = $data['additional_question_id'] ?? null;

            // Fetch existing records and map them with the key pattern
            $existingRecords = ReferencePerson::where('additional_question_id', $additionalQuestionId)
                ->get()
                ->keyBy(fn($item) => "{$item->additional_question_id}_{$item->fullname}");

            // Process new data for insert/update
            $processedData = $this->filterData($data['references'], $additionalQuestionId, ['fullname', 'address']);
            $processedKeys = [];

            foreach ($processedData as $entry) {
                $key = "{$entry['additional_question_id']}_{$entry['fullname']}";
                $processedKeys[] = $key;

                if ($existingRecords->has($key)) {
                    $existingRecords[$key]->update($entry); // Update if exists
                } else {
                    ReferencePerson::create($entry); // Insert if new
                }
            }

            // Delete records that are not in the processed keys
            if (!empty($additionalQuestionId)) {
                ReferencePerson::where('additional_question_id', $additionalQuestionId)
                    ->whereNotIn(DB::raw("CONCAT(additional_question_id, '_', fullname)"), $processedKeys)
                    ->delete();
            }

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();

            \Log::error('Failed to update/insert reference people entry: ' . $e->getMessage());

            return false;
        }
    }


    /**
     * Filters and validates reference person entries
     */
    public function filterData($entries, $entryId, $columns = [])
    {
        $validData = [];

        // Ensure $entries is an array
        if (!is_array($entries)) {
            throw new InvalidArgumentException('Invalid entry provided. Must be an array.');
        }

        foreach ($entries as $entry) {
            // Convert object to array if necessary
            $entryArray = is_object($entry) ? (array) $entry : $entry;

            $entryArray['additional_question_id'] = $entryId;

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
