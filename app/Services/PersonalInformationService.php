<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\PersonalInformation;
use Exception;

class PersonalInformationService
{
    /**
     * Creates or updates a personal information entry.
     *
     * @param array $data
     * @return PersonalInformation|null
     */
    public function store(array $data): ?PersonalInformation
    {
        DB::beginTransaction();

        try {
            $personal_information = PersonalInformation::updateOrCreate(
                ['pds_entry_id' => $data['pds_entry_id']],
                [
                    'first_name' => $data['first_name'] ?? null,
                    'middle_name' => $data['middle_name'] ?? null,
                    'last_name' => $data['last_name'] ?? null,
                    'suffix' => $data['suffix'] ?? null,
                    'birth_date' => $data['birth_date'] ?? null,
                    'birth_place' => $data['birth_place'] ?? null,
                    'sex' => $data['sex'] ?? null,
                    'civil_status' => $data['civil_status'] ?? null,
                    'height' => $data['height'] ?? null,
                    'weight' => $data['weight'] ?? null,
                    'blood_type' => $data['blood_type'] ?? null,
                    'citizenship' => $data['citizenship'] ?? null,
                    'citizenship_by' => $data['citizenship_by'] ?? null,
                    'country' => $data['country'] ?? null,
                    'telephone_no' => $data['telephone_no'] ?? null,
                    'mobile_no' => $data['mobile_no'] ?? null,
                    'email' => $data['email'] ?? null,
                ]
            );

            DB::commit(); // Commit the transaction

            return $personal_information;
        } catch (Exception $e) {
            DB::rollback(); // Rollback on failure

            \Log::error('Failed to update personal information draft', ['error' => $e->getMessage()]);

            return null; // Return null to indicate failure
        }
    }
}
