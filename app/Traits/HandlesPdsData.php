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
            'identifiers' => [
                'gsis' => $this->gsis_id,
                'pag-ibig' => $this->pagibig_id,
                'philhealth' => $this->philhealth_id,
                'sss' => $this->sss_id,
                'tin' => $this->tin_id,
                'agency' => $this->agency_id,
            ],
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
            'children' => $this->children,
        ];
    }
}
