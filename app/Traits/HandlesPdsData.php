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

    protected function getWorkEntryData(int $entryId){
        return [
            'pds_entry_id' => $entryId,
            'workExperiences' => $this->workExperiences ?? $this->initializeWorkExperiences(),
        ];
    }

    protected function getVolWorkEntryData(int $entryId){
        return [
            'pds_entry_id' => $entryId,
            'voluntaryWorks' => $this->voluntaryWorks ?? $this->initializeVoluntaryWorkExperiences(),
        ];
    }

    protected function getTrainingsData(int $entryId){
        return[
            'pds_entry_id' => $entryId,
            'trainings' => $this->trainings ?? $this->initializeTrainingEntries(),
        ];
    }

    protected function getSkillData(int $entryId){
        return[
            'pds_entry_id' => $entryId,
            'skills' => $this->skills ?? $this->initializeSkillEntries(),
        ];
    }

    protected function getReconitionData(int $entryId){
        return[
            'pds_entry_id' => $entryId,
            'recognitions' => $this->recognitions ?? $this->initializeRecognitionEntries(),
        ];
    }

    protected function getOrganizationData(int $entryId){
        return[
            'pds_entry_id' => $entryId,
            'organizations' => $this->organizations ?? $this->initializeOrganizationEntries(),
        ];
    }

    protected function getQuestionResponsesData(int $entryId){
        return[
            'pds_entry_id' => $entryId,

            'has_third_degree_relative' => $this->has_third_degree_relative,
            'has_fourth_degree_relative' => $this->has_fourth_degree_relative,
            'fourth_degree_relative' => $this->fourth_degree_relative,

            'has_admin_case' => $this->has_admin_case,
            'admin_case_details' => $this->admin_case_details,

            'has_criminal_charge' => $this->has_criminal_charge,
            'criminal_charge_date' => $this->criminal_charge_date,
            'criminal_charge_status' => $this->criminal_charge_status,

            'has_criminal_conviction' => $this->has_criminal_conviction,
            'criminal_conviction_details' => $this->criminal_conviction_details,

            'has_separation_from_service' => $this->has_separation_from_service,
            'separation_details' => $this->separation_details,

            'is_election_candidate' => $this->is_election_candidate,
            'election_details' => $this->election_details,

            'has_resigned_for_election' => $this->has_resigned_for_election,
            'resignation_details' => $this->resignation_details,

            'is_immigrant' => $this->is_immigrant,
            'immigrant_country' => $this->immigrant_country,

            'is_indigenous' => $this->is_indigenous,
            'indigenous_details' => $this->indigenous_details,

            'is_disabled' => $this->is_disabled,
            'disabled_person_id' => $this->disabled_person_id,

            'is_solo_parent' => $this->is_solo_parent,
            'solo_parent_id' => $this->solo_parent_id,
        ];
    }

    protected function getReferencePersonData(int $additioanlQuestionId){
        return[
            'additional_question_id' => $additioanlQuestionId,
            'references' => $this->references ?? $this->initializeReferencePeople(),
        ];
    }

    protected function getAttachmentData(int $pdsEntryId){
        return[
            'pds_entry_id' => $pdsEntryId,
            'passport_photo' => $this->passport_photo,
            'right_thumbmark_photo' => $this->right_thumbmark_photo,
            'government_id_type' => $this->government_id_type,
            'government_id_no' => $this->government_id_no,
            'government_id_photo' => $this->government_id_photo,
            'date_of_issuance' => $this->date_of_issuance,
            'signature_photo' => $this->signature_photo,
            'otr_photo' => $this->otr_photo,
            'diploma_photo' => $this->diploma_photo,
            'employement_certificate' => $this->employement_certificate,
        ];
    }
}
