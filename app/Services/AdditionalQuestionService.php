<?php
namespace App\Services;

use Exception;
use App\Models\AdditionalQuestion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdditionalQuestionService
{
    /**
     * Creates or updates the additional questions entry
     * @param array $data
     * @return AdditionalQuestion|null
     */
    public function store(array $data): ?AdditionalQuestion
    {
        DB::beginTransaction();

        try {
            $questionEntry = AdditionalQuestion::updateOrCreate(
                ['pds_entry_id' => $data['pds_entry_id']], // Condition to check existing entry
                [ // Fields to update or insert
                    'has_third_degree_relative' => $data['has_third_degree_relative'] ?? false,
                    'has_fourth_degree_relative' => $data['has_fourth_degree_relative'] ?? false,
                    'fourth_degree_relative' => $data['fourth_degree_relative'] ?? null,

                    'has_admin_case' => $data['has_admin_case'] ?? false,
                    'admin_case_details' => $data['admin_case_details'] ?? null,

                    'has_criminal_charge' => $data['has_criminal_charge'] ?? false,
                    'criminal_charge_date' => $data['criminal_charge_date'] ?? null,
                    'criminal_charge_status' => $data['criminal_charge_status'] ?? null,

                    'has_criminal_conviction' => $data['has_criminal_conviction'] ?? false,
                    'criminal_conviction_details' => $data['criminal_conviction_details'] ?? null,

                    'has_separation_from_service' => $data['has_separation_from_service'] ?? false,
                    'separation_details' => $data['separation_details'] ?? null,

                    'is_election_candidate' => $data['is_election_candidate'] ?? false,
                    'election_details' => $data['election_details'] ?? null,

                    'has_resigned_for_election' => $data['has_resigned_for_election'] ?? false,
                    'resignation_details' => $data['resignation_details'] ?? null,

                    'is_immigrant' => $data['is_immigrant'] ?? false,
                    'immigrant_country' => $data['immigrant_country'] ?? null,

                    'is_indigenous' => $data['is_indigenous'] ?? false,
                    'indigenous_details' => $data['indigenous_details'] ?? null,

                    'is_disabled' => $data['is_disabled'] ?? false,
                    'disabled_person_id' => $data['disabled_person_id'] ?? null,

                    'is_solo_parent' => $data['is_solo_parent'] ?? false,
                    'solo_parent_id' => $data['solo_parent_id'] ?? null,
                ]
            );

            DB::commit();
            return $questionEntry; // Return the ID of the created/updated entry
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error in AdditionalQuestionService::store', ['error' => $e->getMessage()]);
            return null; // Indicate failure
        }
    }
}
