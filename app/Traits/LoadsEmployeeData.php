<?php

namespace App\Traits;

use Carbon\Carbon;
use PHPUnit\Event\TestSuite\Sorted;

trait LoadsEmployeeData
{
    use HasDynamicEntries, FiltersData;
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
        // Validate input types
        $residential = $residential ?? collect();
        $permanent = $permanent ?? collect();

        // dd($residential);
        // Map address fields with default values
        $this->residential = $this->mapAddressFields($residential);
        $this->permanent = $this->mapAddressFields($permanent);
    }

    protected function mapAddressFields($address)
    {
        // Ensure $address is a collection
        if (!$address instanceof \Illuminate\Support\Collection) {
            $address = collect($address);
        }

        // Map address fields with default values
        return [
            'region' => $address->get('region_id'),
            'province' => $address->get('province_id'),
            'municipality' => $address->get('municipality_id'),
            'barangay' => $address->get('barangay_id'),
            'subdivision' => $address->get('subdivision', ''),
            'street' => $address->get('street', ''),
            'house' => $address->get('house_no', ''),
            'zip' => $address->get('zip', ''),
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
                $this->education[$education->level] = $this->filterData($education, ['id', 'pds_entry_id', 'level', 'timestamps']);
                continue;
            }

            $this->education[$education->level][] = $this->filterData($education, ['id', 'pds_entry_id', 'level', 'timestamps']);
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

    protected function loadEligibilities($eligibilities)
    {
        foreach ($eligibilities as $eligibility) {
            $this->eligibilities[] = $this->filterData($eligibility, ['id', 'pds_entry_id', 'timestamps']);
        }
    }

    protected function loadWorkExperiences($workExperiences)
    {
        if (empty($workExperiences)) return;

        $sortedWorkExperiences = collect($workExperiences)->sortByDesc('date_from');

        foreach ($sortedWorkExperiences as $workExperience) {
            if (isset($workExperience['date_from']) && !empty($workExperience['date_from'])) {
                $workExperience['date_from'] = date('Y-m-d', strtotime($workExperience['date_from']));
            }

            if (isset($workExperience['date_to']) && !empty($workExperience['date_to'])) {
                $workExperience['date_to'] = Carbon::parse($workExperience['date_to'])->format('Y-m-d');
            }

            $this->workExperiences[] = $this->filterData($workExperience, ['id', 'pds_entry_id', 'timestamps']);
        }

        // dd($this->workExperiences);
    }

    protected function loadVolWorkEntries($voluntaryWorks)
    {
        if (empty($voluntaryWorks)) return;
        $sortedVolWorkExperiences = collect($voluntaryWorks)->sortByDesc('date_from');

        foreach ($sortedVolWorkExperiences as $volWorkExperience) {
            if (isset($volWorkExperience['date_from']) && !empty($volWorkExperience['date_from'])) {
                $volWorkExperience['date_from'] = date('Y-m-d', strtotime($volWorkExperience['date_from']));
            }

            if (isset($volWorkExperience['date_to']) && !empty($volWorkExperience['date_to'])) {
                $volWorkExperience['date_to'] = date('Y-m-d', strtotime($volWorkExperience['date_to']));
            }

            $this->voluntaryWorks[] = $this->filterData($volWorkExperience, ['id', 'pds_entry_id', 'timestamps']);
        }
    }

    protected function loadTrainingEntries($trainings)
    {
        if (empty($trainings)) return;

        $sortedTrainings = collect($trainings)->sortByDesc('date_from');

        foreach ($sortedTrainings as $training) {
            $this->trainings[] = $this->filterData($training, ['id', 'pds_entry_id', 'timestamps']);
        }
    }

    protected function loadOtherInformationEntries($skills, $recognitions, $organizations)
    {
        $sortedSkills = collect($skills)->sortByDesc('updated_at');

        foreach ($sortedSkills as $skill) {
            $this->skills[] = $this->filterData($skill, ['id', 'pds_entry_id', 'timestamps']);
        }

        $sortedRecognitions = collect($recognitions)->sortByDesc('updated_at');

        foreach ($sortedRecognitions as $recognition) {
            $this->recognitions[] = $this->filterData($recognition, ['id', 'pds_entry_id', 'timestamps']);
        }

        $sortedOrganizations = collect($organizations)->sortByDesc('updated_at');

        foreach ($sortedOrganizations as $organization) {
            $this->organizations[] = $this->filterData($organization, ['id', 'pds_entry_id', 'timestamps']);
        }
    }

    protected function loadQuestionResponses($responses)
    {
        // dd($responses);
        $questionnaireFields = [
            'has_third_degree_relative',
            'has_fourth_degree_relative',
            'fourth_degree_relative',
            'has_admin_case',
            'admin_case_details',
            'has_criminal_charge',
            'criminal_charge_date',
            'criminal_charge_status',
            'has_criminal_conviction',
            'criminal_conviction_details',
            'has_separation_from_service',
            'separation_details',
            'is_election_candidate',
            'election_details',
            'has_resigned_for_election',
            'resignation_details',
            'is_immigrant',
            'immigrant_country',
            'is_indigenous',
            'indigenous_details',
            'is_disabled',
            'disabled_person_id',
            'is_solo_parent',
            'solo_parent_id',
        ];

        $filteredResponse = $this->filterData($responses, ['id', 'pds_entry_id', 'timestamps']);

        foreach ($filteredResponse as $key => $value) {
            if (in_array($key, $questionnaireFields)) {
                $this->$key = $value;
            }
        }
    }

    protected function loadReferencePerson($referencePeople)
    {
        $sortedReferencesPeople = collect($referencePeople)->sortBy('fullname');

        foreach ($sortedReferencesPeople as $entry) {
            $this->references[] = $this->filterData($entry, ['id', 'additional_question_id', 'timestamps']);
        }
    }

    protected function loadAttachments($attachments)
    {
        if (is_null($attachments)) return;

        $attachmentFields = [
            'passport_photo',
            'right_thumbmark_photo',
            'government_id_photo',
            'government_id_type',
            'date_of_issuance',
            'government_id_no',
            'signature_photo',
            'otr_photo',
            'diploma_photo',
            'employement_certificate',
        ];

        foreach ($attachmentFields as $field) {
            if (!empty($attachments->{$field})) {
                // ✅ Properly check if the field is "date_of_issuance" and format it
                if ($field === 'date_of_issuance') {
                    $this->{$field} = Carbon::parse($attachments->{$field})->format('Y-m-d');
                } else {
                    $this->{$field} = $attachments->{$field};
                }
            }
        }
    }
}
