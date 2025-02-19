<?php

namespace App\Services;

use Exception;
use App\Models\EmployeeIdentifier;
use Illuminate\Support\Facades\DB;

class EmployeeIdentifierService
{
    public function store(array $data)
    {
        DB::beginTransaction();

        try {
            foreach ($data['identifiers'] as $type => $number) {
                EmployeeIdentifier::updateOrCreate(
                    [
                        'personal_information_id' => $data['personal_information_id'],
                        'type' => $type
                    ],
                    [
                        'number' => $number ?? null,
                        'updated_at' => now()
                    ]
                );
            }

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollback();
            \Log::error("Failed to update employee identifiers", [
                'error' => $e->getMessage(),
                'data' => $data
            ]);
            return false;
        }
    }
}
