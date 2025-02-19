<?php

namespace App\Traits;

trait LoadsEmployeeData
{
    use HasDynamicEntries;
    protected function loadPersonalInformation($personal_information)
    {
        $fields = [
            'first_name',
            'middle_name',
            'last_name',
            'suffix',
            'birth_date',
            'birth_place',
            'sex',
            'civil_status',
            'height',
            'weight',
            'blood_type',
            'citizenship',
            'citizenship_by',
            'country',
            'telephone_no',
            'mobile_no',
            'email'
        ];

        foreach ($fields as $field) {
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
            'zip' => $residential?->zip,
        ];

        $this->permanent = [
            'region' => $permanent?->region_id,
            'province' => $permanent?->province_id,
            'municipality' => $permanent?->municipality_id,
            'barangay' => $permanent?->barangay_id,
            'subdivision' => $permanent?->subdivision,
            'street' => $permanent?->street,
            'house' => $permanent?->house_no,
            'zip' => $permanent?->zip,
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
            'zip' => $permanent?->zip,
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
            'zip' => $residential?->zip,
        ];
    }

    protected function loadIdentifiers($identifiers)
    {
        $this->identifiers = $identifiers
            ->mapWithKeys(fn($item) => [strtolower($item->type) => $item->number])
            ->toArray();
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

    protected function loadParentsInformation($father, $mother)
    {
        $this->father = [
            'first_name' => $father?->first_name,
            'middle_name' => $father?->middle_name,
            'last_name' => $father?->last_name,
            'suffix' => $father?->suffix,
        ];

        $this->mother = [
            'first_name' => $mother?->first_name,
            'middle_name' => $mother?->middle_name,
            'last_name' => $mother?->last_name,
            'suffix' => $mother?->suffix,
        ];
    }

    protected function loadChildrenData($children)
    {
        $children = $children->toArray();

        foreach ($children as $child) {
            $this->addEntry(
                'children',
                [
                    'full_name' => $child['fullname'],
                    'birth_date' => $child['birth_date']
                ]
            );
        }
    }

    protected function loadEducationalBackgroundData($educationalBackground)
    {
        // dd($educationalBackground);
        if (empty($educationalBackground)) return;

        // Sort by attendance_from
        $sortedEducation = collect($educationalBackground)->sortBy('attendance_from');

        foreach ($sortedEducation as $education) {
            if (in_array($education->level, ['elementary', 'secondary'])) {
                $this->education[$education->level] = $this->filterData($education, ['id', 'pds_entry_id', 'level', 'created_at', 'updated_at']);
                continue;
            }

            $this->education[$education->level][] = $this->filterData($education, ['id', 'pds_entry_id', 'level', 'created_at', 'updated_at']);
        }

        // dd($this->education);
         // Sort $this->education array after populating it
        foreach ($this->education as $level => &$entries) {
            if (!in_array($level, ['vocational', 'college', 'graduate_studies'])) continue;

            $entries = collect($entries)->sortBy(function ($entry) {
                $hasEmptyFields = empty($entry['attendance_from']) || empty($entry['attendance_to']) || empty($entry['school_name']);
                return [$hasEmptyFields, $entry['attendance_from'] ?? PHP_INT_MAX];
            })->values()->toArray();
        }
    }


    protected function filterData($array, $fields = [])
    {
        return collect($array)
            ->except([...$fields])
            ->toArray();
    }
}
