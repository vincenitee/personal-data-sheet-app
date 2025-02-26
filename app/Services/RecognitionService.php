<?php

namespace App\Services;

use App\Models\Recognition;
use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;

class RecognitionService
{
    /**
     * Creates or updates the work experience entry
     * @param array $data
     * @return bool
     */

    public function store(array $data){
        // dd($data);
        DB::beginTransaction();

        try{
            $pdsEntryId = $data['pds_entry_id'] ?? null;

            $existingRecords = Recognition::where('pds_entry_id', $pdsEntryId)
                ->get()
                ->keyBy(function ($item){
                    return "{$item->pds_entry_id}_{$item->recognition}";
                });

            $processedData = $this->filterData($data['recognitions'], $pdsEntryId, ['recognition']);
            $processedKeys = [];

            foreach($processedData as $entry){
                $key = "{$entry['pds_entry_id']}_{$entry['recognition']}";

                $processedKeys[] = $key;

                if($existingRecords->has($key)){
                    $existingRecords[$key]->update($entry);
                } else{
                    Recognition::create($entry);
                }
            }

            if(!empty($pdsEntryId)){
                Recognition::where('pds_entry_id', $pdsEntryId)
                    ->whereNotIn(DB::raw("CONCAT(pds_entry_id, '_', recognition)"), $processedKeys)
                    ->delete();
            }

            DB::commit();

            return true;
        } catch(Exception $e){
            DB::rollback();

            \Log::error('Failed to update recognitions data: ' . $e->getMessage());

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
