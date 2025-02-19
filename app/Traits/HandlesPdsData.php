<?php

namespace App\Traits;

trait HandlesPdsData
{
    protected function getPersonalInformationData(int $entryId): array
    {
        return ['pds_entry_id' => $entryId] + $this->only([
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
        ]);
    }

    protected function getIdentifierData(int $personalInformationId)
    {
        return [
            'personal_information_id' => $personalInformationId,
            'identifiers' => array_intersect_key($this->identifiers, array_flip([
                'gsis',
                'pagibig',
                'philhealth',
                'sss',
                'tin',
                'agency',
            ])),
        ];
    }

    protected function getAddressData(int $personalInformationId)
    {
        return [
            'personal_information_id' => $personalInformationId,
            'residential' => collect($this->residential)->except(['provinces', 'municipalities', 'barangays'])->toArray(),
            'permanent' => collect($this->permanent)->except(['provinces', 'municipalities', 'barangays'])->toArray(),
        ];
    }

    protected function getSpouseData(int $entryId)
    {
        return array_merge(['pds_entry_id' => $entryId], $this->spouse);
    }

    protected function getParentsData(int $entryId)
    {
        return [
            'pds_entry_id' => $entryId,
            'father' => $this->father,
            'mother' => $this->mother,
        ];
    }

    protected function getChildrenData(int $entryId)
    {
        return [
            'pds_entry_id' => $entryId,
            'children' => $this->children ?? $this->initializeChildren(),
        ];
    }

    protected function getEducationalBackgroundData(int $entryId)
    {
        $data = [
            'pds_entry_id' => $entryId,
        ];

        foreach ($this->education as $level => $entries) {
            if (in_array($level, ['elementary', 'secondary'])) {
                $data[$level] = [
                    'school_name' => $entries['school_name'],
                    'degree_earned' => $entries['degree_earned'],
                    'attendance_from' => $entries['attendance_from'],
                    'attendance_to' => $entries['attendance_to'],
                    'level_unit_earned' => $entries['level_unit_earned'],
                    'year_graduated' => $entries['year_graduated'],
                    'academic_honors' => $entries['academic_honors'],
                ];
            } else {
                $data[$level] = array_map(fn($entry) => [
                    'school_name' => $entry['school_name'],
                    'degree_earned' => $entry['degree_earned'],
                    'attendance_from' => $entry['attendance_from'],
                    'attendance_to' => $entry['attendance_to'],
                    'level_unit_earned' => $entry['level_unit_earned'],
                    'year_graduated' => $entry['year_graduated'],
                    'academic_honors' => $entry['academic_honors'],
                ], $entries);
            }
        }

        return $data;
    }

    protected function getEligibilityData(int $entryId)
    {
        // dd($this->eligibilities);
        return [
            'pds_entry_id' => $entryId,
            'eligibilities' => $this->eligibilities ?? $this->initializeEligibilities(),
        ];
    }
}
