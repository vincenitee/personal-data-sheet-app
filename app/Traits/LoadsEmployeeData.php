<?php

namespace App\Traits;

trait LoadsEmployeeData
{
    use HasDynamicEntries;
    protected function loadPersonalInformation($personal_information)
    {
        $fields = [
            'first_name', 'middle_name', 'last_name', 'suffix',
            'birth_date', 'birth_place', 'sex', 'civil_status',
            'height', 'weight', 'blood_type', 'citizenship',
            'citizenship_by', 'country', 'telephone_no',
            'mobile_no', 'email'
        ];

        foreach($fields as $field){
            $this->{$field} = $personal_information?->{$field} ?? null;
        }
    }

    protected function loadAddresses($residential, $permanent)
    {
        $this->residential = [
            'region' => $residential?->region_id,
            'province' => $residential?->province_id,
            'municipality' => $residential?->municipality_id,
            'barangay' => $residential?->barangay_id,
            'subdivision' => $residential?->subdivision,
            'street' => $residential?->street,
            'house' => $residential?->house_no,
        ];

        $this->permanent = [
            'region' => $permanent?->region_id,
            'province' => $permanent?->province_id,
            'municipality' => $permanent?->municipality_id,
            'barangay' => $permanent?->barangay_id,
            'subdivision' => $permanent?->subdivision,
            'street' => $permanent?->street,
            'house' => $permanent?->house_no,
        ];
    }

    protected function loadPermanentAddress($permanent)
    {
        // Assign permanent address fields safely
        $this->permanent = [
            'region' => $permanent?->region_id,
            'province' => $permanent?->province_id,
            'municipality' => $permanent?->municipality_id,
            'barangay' => $permanent?->barangay_id,
            'subdivision' => $permanent?->subdivision,
            'street' => $permanent?->street,
            'house' => $permanent?->house_no,
        ];
    }

    protected function loadResidentialAddress($residential)
    {
        $this->residential = [
            'region' => $residential?->region_id,
            'province' => $residential?->province_id,
            'municipality' => $residential?->municipality_id,
            'barangay' => $residential?->barangay_id,
            'subdivision' => $residential?->subdivision,
            'street' => $residential?->street,
            'house' => $residential?->house_no,
        ];
    }

    protected function loadIdentifiers($identifiers)
    {
        $this->gsis_id = $identifiers[0]->number;
        $this->pagibig_id = $identifiers[1]->number;
        $this->philhealth_id = $identifiers[2]->number;
        $this->sss_id = $identifiers[3]->number;
        $this->tin_id = $identifiers[4]->number;
        $this->agency_id = $identifiers[5]->number;
    }

    protected function loadSpouseInformation($spouse)
    {
        $this->spouse = [
            'first_name' => $spouse?->first_name,
            'middle_name' => $spouse?->middle_name,
            'last_name' => $spouse?->last_name,
            'suffix' => $spouse?->suffix,
            'occupation' => $spouse?->occupation,
            'employer' => $spouse?->employer,
            'business_address' => $spouse?->business_address,
            'telephone_no' => $spouse?->telephone_no,
        ];
    }

    protected function loadParentsInformation($father, $mother){
        $this->father = [
            'first_name' => $father?->firstname,
            'middle_name' => $father?->middlename,
            'last_name' => $father?->lastname,
            'suffix' => $father?->suffix,
        ];

        $this->mother = [
            'first_name' => $mother?->firstname,
            'middle_name' => $mother?->middlename,
            'last_name' => $mother?->lastname,
            'suffix' => $mother?->suffix,
        ];
    }

    protected function loadChildrenData($children){
        $children = $children->toArray();

        foreach($children as $child)
        {
            $this->addEntry('children', [
                'full_name' => $child['fullname'],
                'birth_date' => $child['birth_date']]
            );
        }
    }
}
