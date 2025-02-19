<?php

namespace App\Traits;

trait HasFormSteps
{
    public $currentStep = 4;

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
        8 => 'Highlight your special skills, hobbies, non-academic achievements, and memberships in organizations.',
        9 => 'Provide responses to important questions, including legal disclosures and family-related information.',
        10 => 'I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and complete statement...',
    ];

    public function incrementSteps()
    {
        // Validates the data before proceeding to the next steps
        $this->validate($this->rules()[$this->currentStep]);

        $this->saveDraft();

        $this->currentStep = min($this->currentStep + 1, count($this->steps));
    }

    public function decrementSteps()
    {
        $this->validate($this->rules()[$this->currentStep]);

        $this->saveDraft();

        $this->currentStep = max($this->currentStep - 1, 1);
    }

    public function jumpToStep($step)
    {
        $this->currentStep = $step;
        $this->saveDraft();
    }

    public function getStepDescription()
    {
        return $this->stepsDescription[$this->currentStep] ?? '';
    }

    public function getStepTitle()
    {
        return $this->steps[$this->currentStep] ?? '';
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
                'citizenship_by' => 'required_if:citizenship,dual|in:birth,naturalization',
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
                'mobile_no' => 'required|string|max:15',
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

                // Vocational, College, and Graduate Studies (Multiple Entries)
                'education.vocational.*.school_name' => 'nullable|string|max:255',
                'education.college.*.school_name' => 'nullable|string|max:255',
                'education.graduate_studies.*.school_name' => 'nullable|string|max:255',

                'education.vocational.*.degree_earned' => 'nullable|string|max:255',
                'education.college.*.degree_earned' => 'nullable|string|max:255',
                'education.graduate_studies.*.degree_earned' => 'nullable|string|max:255',

                'education.vocational.*.attendance_from' => 'nullable|date',
                'education.college.*.attendance_from' => 'nullable|date',
                'education.graduate_studies.*.attendance_from' => 'nullable|date',

                'education.vocational.*.attendance_to' => 'nullable|date|after_or_equal:education.vocational.*.attendance_from',
                'education.college.*.attendance_to' => 'nullable|date|after_or_equal:education.college.*.attendance_from',
                'education.graduate_studies.*.attendance_to' => 'nullable|date|after_or_equal:education.graduate_studies.*.attendance_from',

                'education.vocational.*.year_graduated' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
                'education.college.*.year_graduated' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
                'education.graduate_studies.*.year_graduated' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),

                // Certificate Upload Rules
                'education.vocational.*.certificate' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
                'education.college.*.certificate' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
                'education.graduate_studies.*.certificate' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            ],
            4 => [
                'eligibilities.*.career_service' => 'nullable|string',
                'eligibilities.*.ratings' => 'nullable|numeric|between:0,100',
                'eligibilities.*.exam_date' => 'nullable|date',
                'eligibilities.*.exam_place' => 'nullable|string',
                'eligibilities.*.license_number' => 'nullable|string',
                'eligibilities.*.license_validity' => 'nullable|date',
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
            'mobile_no.max' => 'Mobile number must not exceed 15 characters.',
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

            'education.vocational.*.attendance_to.after_or_equal' => 'The attendance to date must be after or equal to the attendance from date.',
            'education.college.*.attendance_to.after_or_equal' => 'The attendance to date must be after or equal to the attendance from date.',
            'education.graduate_studies.*.attendance_to.after_or_equal' => 'The attendance to date must be after or equal to the attendance from date.',

            'education.vocational.*.year_graduated.digits' => 'The year graduated must be a 4-digit year.',
            'education.college.*.year_graduated.digits' => 'The year graduated must be a 4-digit year.',
            'education.graduate_studies.*.year_graduated.digits' => 'The year graduated must be a 4-digit year.',

            // Certificates
            'education.vocational.*.certificate.file' => 'The certificate must be a valid file.',
            'education.vocational.*.certificate.mimes' => 'The certificate must be a file of type: PDF, JPG, or PNG.',
            'education.vocational.*.certificate.max' => 'The certificate size must not exceed 2MB.',

            'education.college.*.certificate.file' => 'The certificate must be a valid file.',
            'education.college.*.certificate.mimes' => 'The certificate must be a file of type: PDF, JPG, or PNG.',
            'education.college.*.certificate.max' => 'The certificate size must not exceed 2MB.',

            'education.graduate_studies.*.certificate.file' => 'The certificate must be a valid file.',
            'education.graduate_studies.*.certificate.mimes' => 'The certificate must be a file of type: PDF, JPG, or PNG.',
            'education.graduate_studies.*.certificate.max' => 'The certificate size must not exceed 2MB.',

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

        ];
    }
}
