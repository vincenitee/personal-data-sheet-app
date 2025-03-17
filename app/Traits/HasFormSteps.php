<?php

namespace App\Traits;

use App\Enums\TrainingTypes;
use App\Enums\EmploymentStatus;
use Illuminate\Validation\Rule;

trait HasFormSteps
{
    public $currentStep = 7;
    public $highestStepReached = 0;

    protected $steps = [
        1 => 'Personal Information',
        2 => 'Family Background',
        3 => 'Educational Background',
        4 => 'Civil Service Eligibility',
        5 => 'Work Experience',
        6 => 'Voluntary Work',
        7 => 'Learning and Development',
        8 => 'Other Information',
        9 => 'Additional Questions',
        10 => 'Attachments',
    ];

    protected $stepIcons = [
        1 => 'bi-person',
        2 => 'bi-people',
        3 => 'bi-book',
        4 => 'bi-award',
        5 => 'bi-briefcase',
        6 => 'bi-heart',
        7 => 'bi-mortarboard',
        8 => 'bi-info-circle',
        9 => 'bi-question-circle',
        10 => 'bi-paperclip'
    ];

    protected $stepsDescription = [
        1 => 'Provide your basic details, including full name, birthdate, address, and contact information.',
        2 => 'Record essential details about your family members, including spouse, parents, and children.',
        3 => 'Document your academic journey by providing details about your schools, degrees, and achievements across all education levels.',
        4 => 'Record your civil service examinations and eligibility details, including ratings, examination dates, and relevant certifications.',
        5 => 'Detail your professional work history, including roles, responsibilities, and employment dates.',
        6 => 'List your voluntary service experiences, including the nature of work and the organizations you contributed to',
        7 => 'Document training programs and development interventions you\'ve attended, including titles, dates, and sponsors.',
        8 => 'Highlight your special skills, non-academic achievements, and memberships in organizations.',
        9 => 'Provide responses to important questions, including legal disclosures and family-related information.',
        10 => 'I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and complete statement...',
    ];


    public function incrementSteps()
    {
        if (!$this->saveDraft()) {
            return; // Stop if validation fails
        }

        $this->currentStep = min($this->currentStep + 1, count($this->steps));

        $this->highestStepReached = max($this->highestStepReached, $this->currentStep);
        // Save the step count to session
        session(['current_step' => $this->currentStep]);

        session(['highest_step_reached' => $this->highestStepReached]);
    }

    public function decrementSteps()
    {
        if (!$this->saveDraft()) {
            return; // Stop if validation fails
        }

        $this->currentStep = max($this->currentStep - 1, 1);

        // Save the step count to session
        session(['current_step' => $this->currentStep]);
    }

    public function jumpToStep($step)
    {
        if (!$this->saveDraft()) {
            return; // Stop if validation fails
        }

        $this->currentStep = $step;

        // Save the step count to session
        session(['current_step' => $this->currentStep]);
    }

    public function getStepDescription()
    {
        return $this->stepsDescription[$this->currentStep] ?? '';
    }

    public function getStepTitle()
    {
        return $this->steps[$this->currentStep] ?? '';
    }

    protected function isFileUpload($field)
    {
        return is_object($field);
    }

    protected function rules()
    {
        return [
            // Step 1: Personal Information
            1 => [
                'first_name' => 'required|string|max:100|regex:/^[a-zA-Z\' -]+$/',
                'middle_name' => 'sometimes|nullable|string|max:100|regex:/^[a-zA-Z\' -]*$/',
                'last_name' => 'required|string|max:100|regex:/^[a-zA-Z\' -]+$/',
                'suffix' => 'sometimes|nullable|string|max:10|regex:/^[a-zA-Z\.]*$/',

                'birth_date' => 'required|date|before:today',
                'birth_place' => 'required|string|max:255',

                'sex' => 'required|in:male,female',
                'civil_status' => 'required|in:single,married,divorced,widowed,separated',

                'height' => 'sometimes|nullable|numeric|min:0.5|max:2.5',
                'weight' => 'sometimes|nullable|numeric|min:10|max:500',

                'blood_type' => 'sometimes|nullable|in:A+,A-,B+,B-,AB+,AB-,O+,O-',

                'identifiers.*' => 'sometimes|nullable|string|max:20',

                'citizenship' => 'required|in:filipino,dual',
                'citizenship_by' => 'required|in:birth,naturalization',
                'country' => 'required_if:citizenship,dual',

                'residential.region' => 'required',
                'residential.province' => 'required',
                'residential.municipality' => 'required',
                'residential.barangay' => 'required',
                'residential.subdivision' => 'sometimes|nullable|string|max:30',
                'residential.street' => 'required|string|max:30',
                'residential.house' => 'required|string|max:20',

                'permanent.region' => 'required',
                'permanent.province' => 'required',
                'permanent.municipality' => 'required',
                'permanent.barangay' => 'required',
                'permanent.subdivision' => 'sometimes|nullable|string|max:30',
                'permanent.street' => 'required|string|max:30',
                'permanent.house' => 'required|string|max:20',

                'telephone_no' => 'sometimes|nullable|string|max:20',
                'mobile_no' => 'required|string|max:11',
                'email' => 'required|email|max:255',
            ],

            // Step 2: Family Background
            2 => [
                'spouse.first_name' => 'sometimes|nullable|string|max:255',
                'spouse.middle_name' => 'sometimes|nullable|string|max:255',
                'spouse.last_name' => 'sometimes|nullable|string|max:255',
                'spouse.suffix' => 'sometimes|nullable|string|max:10',
                'spouse.occupation' => 'sometimes|nullable|string|max:255',
                'spouse.employer' => 'sometimes|nullable|string|max:255',
                'spouse.business_address' => 'sometimes|nullable|string|max:255',
                'spouse.telephone_no' => 'sometimes|nullable|string|max:20',

                // Father and Mother (Required Fields)
                'father.first_name' => 'required|string|max:255',
                'father.middle_name' => 'sometimes|nullable|string|max:255',
                'father.last_name' => 'required|string|max:255',
                'father.suffix' => 'sometimes|nullable|string|max:10',

                'mother.first_name' => 'required|string|max:255',
                'mother.middle_name' => 'sometimes|nullable|string|max:255',
                'mother.last_name' => 'required|string|max:255',

                // Children (Dynamic Validation)
                'children' => 'sometimes|array',
                'children.*.full_name' => 'sometimes|nullable|string|max:255',
                'children.*.birth_date' => 'sometimes|nullable|date|before:today',
            ],

            // Step 3: Educational Background
            3 => [
                // Elementary & Secondary (Single Entry)
                'education.elementary.school_name' => 'nullable|string|max:255',
                'education.secondary.school_name' => 'nullable|string|max:255',

                'education.elementary.attendance_from' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
                'education.elementary.attendance_to' => 'nullable|digits:4|integer|min:1900|max:' . date('Y') . '|gte:education.elementary.attendance_from',
                'education.elementary.year_graduated' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),

                'education.secondary.attendance_from' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
                'education.secondary.attendance_to' => 'nullable|digits:4|integer|min:1900|max:' . date('Y') . '|gte:education.secondary.attendance_from',
                'education.secondary.year_graduated' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),

                // Vocational, College, and Graduate Studies (Multiple Entries)
                'education.vocational.*.school_name' => 'nullable|string|max:255',
                'education.college.*.school_name' => 'nullable|string|max:255',
                'education.graduate_studies.*.school_name' => 'nullable|string|max:255',

                'education.vocational.*.degree_earned' => 'nullable|string|max:255',
                'education.college.*.degree_earned' => 'nullable|string|max:255',
                'education.graduate_studies.*.degree_earned' => 'nullable|string|max:255',

                'education.vocational.*.attendance_from' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
                'education.college.*.attendance_from' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
                'education.graduate_studies.*.attendance_from' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),

                'education.vocational.*.attendance_to' => 'nullable|digits:4|integer|min:1900|max:' . date('Y') . '|gte:education.vocational.*.attendance_from',
                'education.college.*.attendance_to' => 'nullable|digits:4|integer|min:1900|max:' . date('Y') . '|gte:education.college.*.attendance_from',
                'education.graduate_studies.*.attendance_to' => 'nullable|digits:4|integer|min:1900|max:' . date('Y') . '|gte:education.graduate_studies.*.attendance_from',

                'education.vocational.*.year_graduated' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
                'education.college.*.year_graduated' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
                'education.graduate_studies.*.year_graduated' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            ],

            4 => [
                'eligibilities.*.career_service' => 'nullable|string',
                'eligibilities.*.ratings' => 'nullable|numeric|between:0,100',
                'eligibilities.*.exam_date' => 'nullable|date',
                'eligibilities.*.exam_place' => 'nullable|string',
                'eligibilities.*.license_number' => 'nullable|string',
                'eligibilities.*.license_validity' => 'nullable|date',
            ],
            5 => [
                'workExperiences.*.position' => 'nullable|string|max:100',
                'workExperiences.*.agency' => 'nullable|string|max:100',
                'workExperiences.*.salary' => 'nullable|numeric|min:0|max:9999999.99',
                'workExperiences.*.salary_grade' => 'nullable|integer|min:1|max:33',
                'workExperiences.*.salary_step' => 'nullable|integer|min:1|max:8',
                'workExperiences.*.status' => ['nullable', Rule::in(EmploymentStatus::values())],
                'workExperiences.*.government_service' => 'required|boolean',
                'workExperiences.*.date_from' => 'nullable|date|before_or_equal:today',
                'workExperiences.*.date_to' => 'nullable|date|after_or_equal:workExperiences.*.date_from|before_or_equal:today',
            ],
            6 => [
                'voluntaryWorks.*.position' => 'nullable|string|max:100',
                'voluntaryWorks.*.organization_name' => 'nullable|string|max:255',
                'voluntaryWorks.*.organization_address' => 'nullable|string|max:255',
                'voluntaryWorks.*.date_from' => 'nullable|date',
                'voluntaryWorks.*.date_to' => 'nullable|date|after_or_equal:voluntaryWorks.*.date_from',
                'voluntaryWorks.*.total_hours' => 'nullable|integer|min:1',
            ],
            7 => [
                'trainings.*.title' => ['nullable', 'string', 'max:100'],
                'trainings.*.type' => ['nullable', Rule::in(TrainingTypes::values())], // Ensures type is one of the enum values
                'trainings.*.sponsored_by' => ['nullable', 'string', 'max:100'],
                'trainings.*.date_from' => ['nullable', 'date', 'sometimes', 'before_or_equal:trainings.*.date_to'],
                'trainings.*.date_to' => ['nullable', 'date', 'sometimes', 'after_or_equal:trainings.*.date_from'],
                // Ensures date_to is after or equal to date_from
                'trainings.*.total_hours' => ['nullable', 'integer', 'min:1'], // Must be a positive integer
                'trainings.*.certificate' => ['nullable', 'string', 'max:255'], // Can be a filename or path
            ],
            8 => [
                'skills.*.skill' => ['nullable', 'string', 'max:100'],
                'recognitions.*.recognition' => ['nullable', 'string', 'max:255'],
                'organizations.*.organization' => ['nullable', 'string', 'max:100'],
            ],
            9 => [
                'has_third_degree_relative' => ['boolean'],
                'has_fourth_degree_relative' => ['boolean'],
                'fourth_degree_relative' => ['nullable', 'required_if:has_fourth_degree_relative,true', 'string', 'max:255'], // ✅ Fix

                'has_admin_case' => ['boolean'],
                'admin_case_details' => ['nullable', 'required_if:has_admin_case,true', 'string', 'max:500'], // ✅ Fix

                'has_criminal_charge' => ['boolean'],
                'criminal_charge_date' => ['nullable', 'required_if:has_criminal_charge,true', 'date', 'before_or_equal:today'], // ✅ Fix
                'criminal_charge_status' => ['nullable', 'required_if:has_criminal_charge,true', 'string', 'max:255'], // ✅ Fix

                'has_criminal_conviction' => ['boolean'],
                'criminal_conviction_details' => ['nullable', 'required_if:has_criminal_conviction,true', 'string', 'max:500'], // ✅ Fix

                'has_separation_from_service' => ['boolean'],
                'separation_details' => ['nullable', 'required_if:has_separation_from_service,true', 'string', 'max:500'], // ✅ Fix

                'is_election_candidate' => ['boolean'],
                'election_details' => ['nullable', 'required_if:is_election_candidate,true', 'string', 'max:255'], // ✅ Fix

                'has_resigned_for_election' => ['boolean'],
                'resignation_details' => ['nullable', 'required_if:has_resigned_for_election,true', 'string', 'max:255'], // ✅ Fix

                'is_immigrant' => ['boolean'],
                'immigrant_country' => ['nullable', 'required_if:is_immigrant,true', 'string', 'max:100'], // ✅ Fix

                'is_indigenous' => ['boolean'],
                'indigenous_details' => ['nullable', 'required_if:is_indigenous,true', 'string', 'max:100'], // ✅ Fix (Corrected key name)

                'is_disabled' => ['boolean'],
                'disabled_person_id' => ['nullable', 'required_if:is_disabled,true', 'string', 'max:50'], // ✅ Fix

                'is_solo_parent' => ['boolean'],
                'solo_parent_id' => ['nullable', 'required_if:is_solo_parent,true', 'string', 'max:50'], // ✅ Fix
            ],

            10 => [
                'passport_photo' => $this->isFileUpload($this->passport_photo)
                    ? 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
                    : 'required|string',

                'right_thumbmark_photo' => $this->isFileUpload($this->right_thumbmark_photo)
                    ? 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
                    : 'required|string',

                'government_id_photo' => $this->isFileUpload($this->government_id_photo)
                    ? 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
                    : 'required|string',

                'government_id_type' => 'required|required_with:government_id_photo|string|max:255',
                'government_id_no' => 'required|required_with:government_id_photo|string|max:255',
                'date_of_issuance' => [
                    'required',
                    'date',
                    'before_or_equal:today',
                    'after_or_equal:1900-01-01', // Prevent unrealistic dates
                ],

                'signature_photo' => $this->isFileUpload($this->signature_photo)
                    ? 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
                    : 'required|string',

                'otr_photo' => $this->isFileUpload($this->otr_photo)
                    ? 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
                    : 'required|string',

                'diploma_photo' => $this->isFileUpload($this->diploma_photo)
                    ? 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
                    : 'nullable|string',

                'employement_certificate' => $this->isFileUpload($this->employement_certificate)
                    ? 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
                    : 'nullable|string',
            ],

        ];
    }

    protected function messages()
    {
        return [
            // ------------------- Step 1: Personal Information -------------------
            'first_name.required' => 'First name is required.',
            'first_name.regex' => 'First name may only contain letters, apostrophes, hyphens, and spaces.',
            'first_name.max' => 'First name must not exceed 100 characters.',

            'middle_name.regex' => 'Middle name may only contain letters, apostrophes, hyphens, and spaces.',
            'middle_name.max' => 'Middle name must not exceed 100 characters.',

            'last_name.required' => 'Last name is required.',
            'last_name.regex' => 'Last name may only contain letters, apostrophes, hyphens, and spaces.',
            'last_name.max' => 'Last name must not exceed 100 characters.',

            'suffix.regex' => 'Suffix may only contain letters or a period.',
            'suffix.max' => 'Suffix must not exceed 10 characters.',

            'birth_date.required' => 'Birthdate is required.',
            'birth_date.date' => 'Please enter a valid date.',
            'birth_date.before' => 'Birthdate must be before today.',

            'birth_place.required' => 'Birthplace is required.',
            'birth_place.max' => 'Birthplace must not exceed 255 characters.',

            'sex.required' => 'Sex is required.',
            'sex.in' => 'Invalid sex selection.',

            'civil_status.required' => 'Civil status is required.',
            'civil_status.in' => 'Invalid civil status.',

            'height.numeric' => 'Height must be a numeric value.',
            'height.min' => 'Height must be at least 0.5 meters.',
            'height.max' => 'Height must not exceed 2.5 meters.',

            'weight.numeric' => 'Weight must be a numeric value.',
            'weight.min' => 'Weight must be at least 10 kg.',
            'weight.max' => 'Weight must not exceed 500 kg.',

            'blood_type.in' => 'Invalid blood type.',

            'identifiers.gsis.max' => 'GSIS ID must not exceed 20 characters.',
            'identifiers.pagibig.max' => 'PAG-IBIG ID must not exceed 20 characters.',
            'identifiers.philhealth.max' => 'PhilHealth ID must not exceed 20 characters.',
            'identifiers.sss.max' => 'SSS ID must not exceed 20 characters.',
            'identifiers.tin.max' => 'TIN must not exceed 20 characters.',
            'identifiers.agency.max' => 'Agency ID must not exceed 20 characters.',

            'citizenship.required' => 'Citizenship is required.',
            'citizenship.in' => 'Invalid citizenship type.',
            'citizenship_by.required_if' => 'Please specify if citizenship is by birth or naturalization.',
            'citizenship_by.in' => 'Invalid citizenship method.',
            'country.required_if' => 'Country of citizenship is required for dual citizenship.',

            // Residential Address
            'residential.region.required' => 'Residential region is required.',
            'residential.province.required' => 'Residential province is required.',
            'residential.municipality.required' => 'Residential municipality is required.',
            'residential.barangay.required' => 'Residential barangay is required.',
            'residential.subdivision.max' => 'Subdivision name must not exceed 30 characters.',
            'residential.street.required' => 'Residential street is required.',
            'residential.street.max' => 'Residential street must not exceed 30 characters.',
            'residential.house.required' => 'House number is required.',
            'residential.house.max' => 'House number must not exceed 20 characters.',

            // Permanent Address
            'permanent.region.required' => 'Permanent region is required.',
            'permanent.province.required' => 'Permanent province is required.',
            'permanent.municipality.required' => 'Permanent municipality is required.',
            'permanent.barangay.required' => 'Permanent barangay is required.',
            'permanent.subdivision.max' => 'Subdivision name must not exceed 30 characters.',
            'permanent.street.required' => 'Permanent street is required.',
            'permanent.street.max' => 'Permanent street must not exceed 30 characters.',
            'permanent.house.required' => 'Permanent house number is required.',
            'permanent.house.max' => 'House number must not exceed 20 characters.',

            'telephone_no.max' => 'Telephone number must not exceed 20 characters.',
            'mobile_no.required' => 'Mobile number is required.',
            'mobile_no.max' => 'Mobile number must not exceed 11 characters.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email address must not exceed 255 characters.',

            // ------------------- Step 2: Family Background -------------------
            // Spouse
            'spouse.first_name.max' => 'Spouse\'s first name must not exceed 255 characters.',
            'spouse.middle_name.max' => 'Spouse\'s middle name must not exceed 255 characters.',
            'spouse.last_name.max' => 'Spouse\'s last name must not exceed 255 characters.',
            'spouse.suffix.max' => 'Spouse\'s suffix must not exceed 10 characters.',
            'spouse.occupation.max' => 'Spouse\'s occupation must not exceed 255 characters.',
            'spouse.employer.max' => 'Spouse\'s employer name must not exceed 255 characters.',
            'spouse.business_address.max' => 'Spouse\'s business address must not exceed 255 characters.',
            'spouse.telephone_no.max' => 'Spouse\'s telephone number must not exceed 20 characters.',

            // Father
            'father.first_name.required' => 'Father\'s first name is required.',
            'father.first_name.max' => 'Father\'s first name must not exceed 255 characters.',
            'father.middle_name.max' => 'Father\'s middle name must not exceed 255 characters.',
            'father.last_name.required' => 'Father\'s last name is required.',
            'father.last_name.max' => 'Father\'s last name must not exceed 255 characters.',
            'father.suffix.max' => 'Father\'s suffix must not exceed 10 characters.',

            // Mother
            'mother.first_name.required' => 'Mother\'s first name is required.',
            'mother.first_name.max' => 'Mother\'s first name must not exceed 255 characters.',
            'mother.middle_name.max' => 'Mother\'s middle name must not exceed 255 characters.',
            'mother.last_name.required' => 'Mother\'s last name is required.',
            'mother.last_name.max' => 'Mother\'s last name must not exceed 255 characters.',

            // Children
            'children.array' => 'Children information must be in an array format.',
            'children.*.full_name.max' => 'Child\'s full name must not exceed 255 characters.',
            'children.*.birth_date.date' => 'Child\'s birth date must be a valid date.',
            'children.*.birth_date.before' => 'Child\'s birth date must be before today.',

            // ------------------- Step 3: Educational Background -------------------
            'education.elementary.school_name.required' => 'The school name is required for elementary.',
            'education.secondary.school_name.required' => 'The school name is required for secondary.',

            'education.vocational.*.school_name.required' => 'The school name is required.',
            'education.college.*.school_name.required' => 'The school name is required.',
            'education.graduate_studies.*.school_name.required' => 'The school name is required.',

            // Ensure attendance_from and attendance_to are valid 4-digit years
            'education.elementary.attendance_from.digits:4' => 'The attendance from year must be a 4-digit year.',
            'education.elementary.attendance_to.digits:4' => 'The attendance to year must be a 4-digit year.',

            'education.secondary.attendance_from.digits:4' => 'The attendance from year must be a 4-digit year.',
            'education.secondary.attendance_to.digits:4' => 'The attendance to year must be a 4-digit year.',

            'education.vocational.*.attendance_from.digits:4' => 'The attendance from year must be a 4-digit year.',
            'education.vocational.*.attendance_to.digits:4' => 'The attendance to year must be a 4-digit year.',

            'education.college.*.attendance_from.digits:4' => 'The attendance from year must be a 4-digit year.',
            'education.college.*.attendance_to.digits:4' => 'The attendance to year must be a 4-digit year.',

            'education.graduate_studies.*.attendance_from.digits:4' => 'The attendance from year must be a 4-digit year.',
            'education.graduate_studies.*.attendance_to.digits:4' => 'The attendance to year must be a 4-digit year.',

            // Ensure attendance_to is greater than or equal to attendance_from
            'education.elementary.attendance_to.gte:education.elementary.attendance_from' => 'The attendance to year must be after or equal to the attendance from year.',
            'education.secondary.attendance_to.gte:education.secondary.attendance_from' => 'The attendance to year must be after or equal to the attendance from year.',

            'education.vocational.*.attendance_to.gte:education.vocational.*.attendance_from' => 'The attendance to year must be after or equal to the attendance from year.',
            'education.college.*.attendance_to.gte:education.college.*.attendance_from' => 'The attendance to year must be after or equal to the attendance from year.',
            'education.graduate_studies.*.attendance_to.gte:education.graduate_studies.*.attendance_from' => 'The attendance to year must be after or equal to the attendance from year.',

            // Ensure year_graduated is a valid 4-digit year
            'education.elementary.year_graduated.digits:4' => 'The year graduated must be a 4-digit year.',
            'education.secondary.year_graduated.digits:4' => 'The year graduated must be a 4-digit year.',
            'education.vocational.*.year_graduated.digits:4' => 'The year graduated must be a 4-digit year.',
            'education.college.*.year_graduated.digits:4' => 'The year graduated must be a 4-digit year.',
            'education.graduate_studies.*.year_graduated.digits:4' => 'The year graduated must be a 4-digit year.',

            // ------------------- Step 4: Civil Service Elibility-------------------
            'eligibilities.*.career_service.required' => 'The career service field is required.',
            'eligibilities.*.ratings.numeric' => 'The ratings must be a number.',
            'eligibilities.*.ratings.between' => 'The ratings must be between 0.00 and 100.00.',
            'eligibilities.*.exam_date.required' => 'The exam date is required.',
            'eligibilities.*.exam_date.date' => 'The exam date must be a valid date.',
            'eligibilities.*.exam_place.required' => 'The exam place is required.',
            'eligibilities.*.exam_place.string' => 'The exam place must be a string.',
            'eligibilities.*.license_number.string' => 'The license number must be a string.',
            'eligibilities.*.license_validity.date' => 'The license validity must be a valid date.',

            // ------------------- Step 5: Work Experiences -------------------
            'workExperiences.*.position.required' => 'The position field is required.',
            'workExperiences.*.position.max' => 'The position must not exceed 100 characters.',

            'workExperiences.*.agency.required' => 'The agency field is required.',
            'workExperiences.*.agency.max' => 'The agency name must not exceed 100 characters.',

            'workExperiences.*.salary.numeric' => 'The salary must be a valid number.',
            'workExperiences.*.salary.min' => 'The salary cannot be negative.',
            'workExperiences.*.salary.max' => 'The salary must not exceed 9,999,999.99.',

            'workExperiences.*.salary_grade.required' => 'The salary grade is required.',
            'workExperiences.*.salary_grade.integer' => 'The salary grade must be a number.',
            'workExperiences.*.salary_grade.min' => 'The salary grade must be at least 1.',
            'workExperiences.*.salary_grade.max' => 'The salary grade must not exceed 33.',

            'workExperiences.*.salary_step.required' => 'The salary step is required.',
            'workExperiences.*.salary_step.integer' => 'The salary step must be a number.',
            'workExperiences.*.salary_step.min' => 'The salary step must be at least 1.',
            'workExperiences.*.salary_step.max' => 'The salary step must not exceed 8.',

            'workExperiences.*.status.required' => 'The employment status is required.',
            'workExperiences.*.status.in' => 'Invalid employment status selected.',

            'workExperiences.*.government_service.required' => 'Please indicate if this is a government service.',
            'workExperiences.*.government_service.boolean' => 'Invalid selection for government service.',

            'workExperiences.*.date_from.required' => 'The start date is required.',
            'workExperiences.*.date_from.date' => 'The start date must be a valid date.',
            'workExperiences.*.date_from.before_or_equal' => 'The start date cannot be in the future.',

            'workExperiences.*.date_to.date' => 'The end date must be a valid date.',
            'workExperiences.*.date_to.after_or_equal' => 'The end date cannot be before the start date.',
            'workExperiences.*.date_to.before_or_equal' => 'The end date cannot be in the future.',

            // ------------------- Step 6: Voluntary Work Experiences -------------------
            'voluntaryWorks.*.position.required' => 'The position field is required.',
            'voluntaryWorks.*.position.string' => 'The position must be a valid string.',
            'voluntaryWorks.*.position.max' => 'The position must not exceed 100 characters.',

            'voluntaryWorks.*.organization_name.required' => 'The organization name is required.',
            'voluntaryWorks.*.organization_name.string' => 'The organization name must be a valid string.',
            'voluntaryWorks.*.organization_name.max' => 'The organization name must not exceed 255 characters.',

            'voluntaryWorks.*.organization_address.required' => 'The organization address is required.',
            'voluntaryWorks.*.organization_address.string' => 'The organization address must be a valid string.',
            'voluntaryWorks.*.organization_address.max' => 'The organization address must not exceed 255 characters.',

            'voluntaryWorks.*.date_from.required' => 'The start date is required.',
            'voluntaryWorks.*.date_from.date' => 'The start date must be a valid date.',

            'voluntaryWorks.*.date_to.date' => 'The end date must be a valid date.',
            'voluntaryWorks.*.date_to.after_or_equal' => 'The end date must be on or after the start date.',

            'voluntaryWorks.*.total_hours.integer' => 'Total hours must be a valid number.',
            'voluntaryWorks.*.total_hours.min' => 'Total hours must be at least 1.',

            // ------------------- Step 7: Learning and Development -------------------
            'trainings.*.title.required' => 'The training title is required.',
            'trainings.*.title.string' => 'The training title must be a valid string.',
            'trainings.*.title.max' => 'The training title cannot exceed 100 characters.',

            'trainings.*.type.required' => 'The training type is required.',
            'trainings.*.type.in' => 'Invalid training type selected.',

            'trainings.*.sponsored_by.string' => 'The sponsor name must be a valid string.',
            'trainings.*.sponsored_by.max' => 'The sponsor name cannot exceed 100 characters.',

            'trainings.*.date_from.required' => 'The start date is required.',
            'trainings.*.date_from.date' => 'The start date must be a valid date.',
            'trainings.*.date_from.before_or_equal' => 'The start date must be before or on the end date.',

            'trainings.*.date_to.required' => 'The end date is required.',
            'trainings.*.date_to.date' => 'The end date must be a valid date.',
            'trainings.*.date_to.after_or_equal' => 'The end date must be after or on the start date.',

            'trainings.*.total_hours.integer' => 'Total hours must be a whole number.',
            'trainings.*.total_hours.min' => 'Total hours must be at least 1.',

            'trainings.*.certificate.string' => 'The certificate information must be a valid string.',
            'trainings.*.certificate.max' => 'The certificate information cannot exceed 255 characters.',

            // ------------------- Step 8: Learning and Development -------------------
            'skills.*.skill.required' => 'The skill field is required.',
            'skills.*.skill.string' => 'The skill must be a valid text.',
            'skills.*.skill.max' => 'The skill must not exceed 100 characters.',

            'recognitions.*.recognition.required' => 'The recognition field is required.',
            'recognitions.*.recognition.string' => 'The recognition must be a valid text.',
            'recognitions.*.recognition.max' => 'The recognition must not exceed 255 characters.',

            'organizations.*.organization.required' => 'The organization field is required.',
            'organizations.*.organization.string' => 'The organization must be a valid text.',
            'organizations.*.organization.max' => 'The organization must not exceed 100 characters.',

            // ------------------- Step 9: Additional Questions -------------------
            'fourth_degree_relative.required_if' => 'Fourth degree relative details are required when selected.',
            'admin_case_details.required_if' => 'Administrative case details are required when selected.',
            'criminal_charge_date.required_if' => 'Please provide the date of the criminal charge if you have one.',
            'criminal_charge_date.date' => 'The criminal charge date must be a valid date.',
            'criminal_charge_date.before_or_equal' => 'The criminal charge date cannot be in the future.',

            'criminal_charge_status.required_if' => 'Please provide the status of the criminal charge if you have one.',
            'criminal_charge_status.string' => 'The criminal charge status must be a valid text description.',
            'criminal_charge_status.max' => 'The criminal charge status must not exceed 255 characters.',
            'criminal_conviction_details.required_if' => 'Criminal conviction details are required when selected.',
            'separation_details.required_if' => 'Separation details are required when selected.',
            'election_details.required_if' => 'Election details are required when selected.',
            'resignation_details.required_if' => 'Resignation details are required when selected.',
            'immigrant_country.required_if' => 'Please specify the country if you are an immigrant.',
            'indigenous_details.required_if' => 'Please specify your indigenous group if applicable.',
            'disabled_person_id.required_if' => 'PWD ID is required if you are a person with a disability.',
            'solo_parent_id.required_if' => 'Solo Parent ID is required if you are a solo parent.',

            // ------------------- Step 9: Additional Questions -------------------
            'passport_photo.image' => 'The passport photo must be an image file.',
            'passport_photo.mimes' => 'The passport photo must be a file of type: jpg, jpeg, png, gif, webp.',
            'passport_photo.max' => 'The passport photo must not exceed 2MB.',

            'right_thumbmark_photo.image' => 'The right thumbmark photo must be an image file.',
            'right_thumbmark_photo.mimes' => 'The right thumbmark photo must be a file of type: jpg, jpeg, png, gif, webp.',
            'right_thumbmark_photo.max' => 'The right thumbmark photo must not exceed 2MB.',

            'government_id_photo.image' => 'The government ID photo must be an image file.',
            'government_id_photo.mimes' => 'The government ID photo must be a file of type: jpg, jpeg, png, gif, webp.',
            'government_id_photo.max' => 'The government ID photo must not exceed 2MB.',

            'government_id_type.required_with' => 'The government ID type is required when uploading an ID photo.',
            'government_id_type.string' => 'The government ID type must be a valid string.',
            'government_id_type.max' => 'The government ID type must not exceed 255 characters.',

            'government_id_no.required_with' => 'The government ID number is required when uploading an ID photo.',
            'government_id_no.string' => 'The government ID number must be a valid string.',
            'government_id_no.max' => 'The government ID number must not exceed 255 characters.',

            'date_of_issuance.required' => 'The issuance date is required.',
            'date_of_issuance.date' => 'Please enter a valid date format (YYYY-MM-DD).',
            'date_of_issuance.before_or_equal' => 'The issuance date cannot be in the future.',
            'date_of_issuance.after_or_equal' => 'The issuance date must be after January 1, 1900.',

            'signature_photo.image' => 'The signature photo must be an image file.',
            'signature_photo.mimes' => 'The signature photo must be a file of type: jpg, jpeg, png, gif, webp.',
            'signature_photo.max' => 'The signature photo must not exceed 2MB.',

            'otr_photo.image' => 'The OTR photo must be an image file.',
            'otr_photo.mimes' => 'The OTR photo must be a file of type: jpg, jpeg, png, gif, webp.',
            'otr_photo.max' => 'The OTR photo must not exceed 2MB.',

            'diploma_photo.image' => 'The diploma photo must be an image file.',
            'diploma_photo.mimes' => 'The diploma photo must be a file of type: jpg, jpeg, png, gif, webp.',
            'diploma_photo.max' => 'The diploma photo must not exceed 2MB.',

            'employement_certificate.image' => 'The certificate photo must be an image file.',
            'employement_certificate.mimes' => 'The certificate photo must be a file of type: jpg, jpeg, png, gif, webp.',
            'employement_certificate.max' => 'The certificate photo must not exceed 2MB.',
        ];
    }
}
