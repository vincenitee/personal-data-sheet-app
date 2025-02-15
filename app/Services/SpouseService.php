<?php

namespace App\Services;

use App\Models\Spouse;
use Exception;
use Illuminate\Support\Facades\DB;

class SpouseService{

    /**
     * Creates or updates spouse information
     * @param array $data
     * @return bool
     */

    public function store($data){
        DB::beginTransaction();

        try{
            Spouse::updateOrCreate(
                ['pds_entry_id' => $data['pds_entry_id']],
                [
                    'first_name' => $data['first_name'] ?? null,
                    'middle_name' => $data['middle_name'] ?? null,
                    'last_name' => $data['last_name'] ?? null,
                    'suffix' => $data['suffix'] ?? null,
                    'occupation' => $data['occupation'] ?? null,
                    'employer' => $data['employer'] ?? null,
                    'business_address' => $data['business_address'] ?? null,
                    'telephone_no' => $data['telephone_no'] ?? null,
                ]
            );

            DB::commit();

            return true;
        } catch(Exception $e){
            DB::rollback();

            \Log::error('Failed to update spouse draft', ['error' => $e->getMessage()]);

            return false;
        }
    }
}
