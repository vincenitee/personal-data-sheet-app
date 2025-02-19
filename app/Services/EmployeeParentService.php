<?php

namespace App\Services;

use App\Enums\FamilyRelationship;
use App\Models\EmployeeParent;
use App\Traits\HasFlashMessage;
use Exception;
use Illuminate\Support\Facades\DB;

class EmployeeParentService
{
    use HasFlashMessage;
    /**
     * Create or update employee parent information
     * @param array $data
     * @return bool
     */
    public function store($data): bool
    {
        $mother = $data['mother'];
        $father = $data['father'];

        DB::beginTransaction();
        try {
            // Mother information insertion
            EmployeeParent::updateOrCreate(
                [
                    'pds_entry_id' => $data['pds_entry_id'],
                    'relationship' => FamilyRelationship::MOTHER
                ],
                [
                    'relationship' => FamilyRelationship::MOTHER,
                    'first_name' => $mother['first_name'] ?? null,
                    'middle_name' => $mother['middle_name'] ?? null,
                    'last_name' => $mother['last_name'] ?? null,
                    'suffix' => $mother['suffix'] ?? null,
                ]
            );

            // Father information insertion
            EmployeeParent::updateOrCreate(
                [
                    'pds_entry_id' => $data['pds_entry_id'],
                    'relationship' => FamilyRelationship::FATHER,
                ],
                [
                    'relationship' => FamilyRelationship::FATHER,
                    'first_name' => $father['first_name'] ?? null,
                    'middle_name' => $father['middle_name'] ?? null,
                    'last_name' => $father['last_name'] ?? null,
                    'suffix' => $father['suffix'] ?? null,
                ]
            );

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollback();

            \Log::error('Failed to save employee parent information: ' . $e->getMessage());

            $this->flashMessage('Failed to save employee parent information', $e->getMessage());

            return false;
        }
        // Mother Data
    }
}
