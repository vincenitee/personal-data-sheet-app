<?php

namespace App\Services;

use App\Enums\AddressType;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
use Exception;

class AddressService{

    /**
     * Creates or updates the addresses entry
     * @param array $data
     * @return bool
     */
    public function store(array $data): bool
    {
        $residential = $data['residential'];
        $permanent = $data['permanent'];

        // dd($residential, $permanent);

        DB::beginTransaction();

        try{
            Address::updateOrCreate(
                [
                    'personal_information_id' => $data['personal_information_id'],
                    'address_type' => AddressType::RESIDENTIAL->value
                ],
                [
                    'region_id' => $residential['region'] ?? null,
                    'province_id' => $residential['province'] ?? null,
                    'municipality_id' => $residential['municipality'] ?? null,
                    'barangay_id' => $residential['barangay'] ?? null,
                    'subdivision' => $residential['sundivision'] ?? null,
                    'street' => $residential['street'] ?? null,
                    'house_no' => $residential['house'] ?? null,
                    'zip' => $residential['zip'] ?? null
                ]
            );

            Address::updateOrCreate(
                [
                    'personal_information_id' => $data['personal_information_id'],
                    'address_type' => AddressType::PERMANENT->value
                ],
                [
                    'region_id' => $permanent['region'] ?? null,
                    'province_id' => $permanent['province'] ?? null,
                    'municipality_id' => $permanent['municipality'] ?? null,
                    'barangay_id' => $permanent['barangay'] ?? null,
                    'subdivision' => $permanent['subdivision'] ?? null,
                    'street' => $permanent['street'] ?? null,
                    'house_no' => $permanent['house'] ?? null,
                    'zip' => $permanent['zip'] ?? null,
                ]
            );

            DB::commit();

            return true;
        } catch(Exception $e){

            DB::rollback();

            \Log::error('Failed to update address draft', ['error' => $e->getMessage()]);

            return false;
        }
    }


}
