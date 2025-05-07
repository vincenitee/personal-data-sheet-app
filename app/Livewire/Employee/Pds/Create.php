<?php

namespace App\Livewire\Employee\Pds;

use Exception;
use App\Enums\Sex;
use Carbon\Carbon;
use Livewire\Component;
use App\Enums\BloodType;
use App\Models\PdsEntry;
use App\Enums\CivilStatus;
use App\Models\Submission;
use App\Enums\GovernmentId;
use Livewire\Attributes\On;
use App\Enums\TrainingTypes;
use App\Services\PdsService;
use App\Traits\HasFormSteps;
use App\Services\SkillService;
use App\Traits\HandlesPdsData;
use App\Enums\EmploymentStatus;
use App\Enums\SubmissionStatus;
use App\Services\SalaryService;
use App\Services\SpouseService;
use App\Traits\HasAlertMessage;
use App\Traits\HasFlashMessage;
use App\Services\AddressService;
use App\Enums\CriminalCaseStatus;
use App\Services\ChildrenService;
use App\Services\TrainingService;
use App\Traits\HasDynamicEntries;
use App\Traits\LoadsEmployeeData;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Services\RecognitionService;
use Illuminate\Support\Facades\Auth;
use App\Services\OrganizationService;
use App\Services\PdsAttachmentService;
use App\Services\VoluntaryWorkService;
use App\Services\EmployeeParentService;
use App\Services\WorkExperienceService;
use App\Services\ReferencePersonService;
use App\Services\AdditionalQuestionService;
use App\Services\EmployeeIdentifierService;
use App\Services\PersonalInformationService;
use App\Services\EducationalBackgroundService;
use Illuminate\Validation\ValidationException;
use App\Services\CivilServiceEligibilityService;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use HasFormSteps,
        LoadsEmployeeData,
        HasDynamicEntries,
        HasFlashMessage,
        HandlesPdsData,
        HasAlertMessage,
        WithFileUploads;

    public ?PdsEntry $entry;
    public $user = null;
    public $nextUpdateAllowedAt = null;
    public $status = null;
    public $comments;

    // Basic Information
    public $first_name = null;
    public $middle_name = null;
    public $last_name = null;
    public $suffix = null;
    public $birth_date = null;
    public $birth_place = null;
    public $sex = null;
    public $civil_status = null;
    public $height = null;
    public $weight = null;
    public $blood_type = null;

    // Identifiers
    public $identifiers = [
        'gsis' => null,
        'pagibig' => null,
        'philhealth' => null,
        'sss' => null,
        'tin' => null,
        'agency' => null,
    ];

    // Nationality
    public $citizenship = 'filipino';
    public $citizenship_by = 'birth';
    public $country = null;

    // Address
    public $residential = [
        'region' => null,
        'province' => null,
        'provinces' => [],
        'municipality' => null,
        'municipalities' => [],
        'barangay' => null,
        'barangays' => [],
        'subdivision' => null,
        'street' => null,
        'house' => null,
    ];

    public $permanent = [
        'region' => null,
        'province' => null,
        'provinces' => [],
        'municipality' => null,
        'municipalities' => [],
        'barangay' => null,
        'barangays' => [],
        'subdivision' => null,
        'street' => null,
        'house' => null,
    ];

    // Contact Information
    public $telephone_no = null;
    public $mobile_no = null;
    public $email = null;

    // Spouse Information
    public $spouse = [
        'first_name' => null,
        'middle_name' => null,
        'last_name' => null,
        'suffix' => null,
        'occupation' => null,
        'employer' => null,
        'business_address' => null,
        'telephone_no' => null,
    ];

    public $father = [
        'first_name' => null,
        'middle_name' => null,
        'last_name' => null,
        'suffix' => null,
    ];

    public $mother = [
        'first_name' => null,
        'middle_name' => null,
        'last_name' => null,
    ];

    public $children = [];

    public $defaultFields = [
        'school_name' => null,
        'degree_earned' => null,
        'attendance_from' => null,
        'attendance_to' => null,
        'level_unit_earned' => null,
        'year_graduated' => null,
        'academic_honors' => null,
    ];

    public $education = [
        'elementary' => [],
        'secondary' => [],
        'vocational' => [],
        'college' => [],
        'graduate_studies' => [],
    ];

    public $eligibilities = [];

    public $workExperiences = [];

    public $voluntaryWorks = [];

    public $trainings = [];

    public $skills = [];

    public $recognitions = [];

    public $organizations = [];

    // Questionnaires
    public bool $has_third_degree_relative = false;
    public bool $has_fourth_degree_relative = false;
    public $fourth_degree_relative = null;

    public bool $has_admin_case = false;
    public $admin_case_details = null;

    public bool $has_criminal_charge = false;
    public $criminal_charge_date = null;
    public $criminal_charge_status = null;

    public bool $has_criminal_conviction = false;
    public $criminal_conviction_details = null;

    public bool $has_separation_from_service = false;
    public $separation_details = null;

    public bool $is_election_candidate = false;
    public $election_details = null;

    public bool $has_resigned_for_election = false;
    public $resignation_details = null;

    public bool $is_immigrant = false;
    public $immigrant_country = null;

    public bool $is_indigenous = false;
    public $indigenous_details = null;

    public bool $is_disabled = false;
    public $disabled_person_id = null;

    public bool $is_solo_parent = false;
    public $solo_parent_id = null;

    public $references = [];

    // Attachments
    public $passport_photo = null;
    public $right_thumbmark_photo = null;
    public $government_id_photo = null;
    public $date_of_issuance = null;
    public $government_id_type = null;
    public $government_id_no = null;
    public $signature_photo = null;
    public $otr_photo = null;
    public $diploma_photo = null;
    public $employement_certificate = null;

    // Services
    protected PdsService $pdsService;
    protected PersonalInformationService $personalInformationService;
    protected AddressService $addressService;
    protected EmployeeIdentifierService $employeeIdentifierService;
    protected SpouseService $spouseService;
    protected EmployeeParentService $employeeParentService;
    protected ChildrenService $childrenService;
    protected EducationalBackgroundService $educationalBackgroundService;
    protected CivilServiceEligibilityService $eligibilityService;
    protected WorkExperienceService $workExperienceService;
    protected SalaryService $salaryService;
    protected VoluntaryWorkService $voluntaryWorkService;
    protected TrainingService $trainingService;
    protected SkillService $skillService;
    protected RecognitionService $recognitionService;
    protected OrganizationService $organizationService;
    protected AdditionalQuestionService $additionalQuestionService;
    protected ReferencePersonService $referencePersonService;
    protected PdsAttachmentService $pdsAttachmentService;

    public function boot(
        PersonalInformationService $personalInformationService,
        AddressService $addressService,
        EmployeeIdentifierService $employeeIdentifierService,
        SpouseService $spouseService,
        EmployeeParentService $employeeParentService,
        ChildrenService $childrenService,
        EducationalBackgroundService $educationalBackgroundService,
        CivilServiceEligibilityService $eligibilityService,
        WorkExperienceService $workExperienceService,
        SalaryService $salaryService,
        VoluntaryWorkService $voluntaryWorkService,
        TrainingService $trainingService,
        SkillService $skillService,
        RecognitionService $recognitionService,
        OrganizationService $organizationService,
        AdditionalQuestionService $additionalQuestionService,
        ReferencePersonService $referencePersonService,
        PdsAttachmentService $pdsAttachmentService,
        PdsService $pdsService,
    ) {
        $this->personalInformationService = $personalInformationService;
        $this->addressService = $addressService;
        $this->employeeIdentifierService = $employeeIdentifierService;
        $this->spouseService = $spouseService;
        $this->employeeParentService = $employeeParentService;
        $this->childrenService = $childrenService;
        $this->educationalBackgroundService = $educationalBackgroundService;
        $this->eligibilityService = $eligibilityService;
        $this->workExperienceService = $workExperienceService;
        $this->salaryService = $salaryService;
        $this->voluntaryWorkService = $voluntaryWorkService;
        $this->trainingService = $trainingService;
        $this->skillService = $skillService;
        $this->recognitionService = $recognitionService;
        $this->organizationService = $organizationService;
        $this->additionalQuestionService = $additionalQuestionService;
        $this->referencePersonService = $referencePersonService;
        $this->pdsAttachmentService = $pdsAttachmentService;
        $this->pdsService = $pdsService;
    }

    public function mount()
    {
        $this->currentStep = session('current_step', 1);
        $this->highestStepReached = session('highest_step_reached', 0);
        $this->user = Auth::user();

        if (!$this->user) {
            return;
        }

        // Initialize education fields before fetching the entry
        $this->education = [
            'elementary' => [...$this->defaultFields],
            'secondary' => [...$this->defaultFields],
            'vocational' => [[...$this->defaultFields]],
            'college' => [[...$this->defaultFields]],
            'graduate_studies' => [[...$this->defaultFields]],
        ];

        // Fetch the latest PDS entry
        $entry = $this->user->entries()
            ->with([
                'personalInformation.addresses',
                'personalInformation.identifiers',
                'spouse',
                'parents',
                'children',
                'educationalBackgrounds',
                'eligibilities',
                'workExperiences',
                'volWorkExperiences',
                'trainings',
                'skills',
                'recognitions',
                'organizations',
                'question',
                'attachment',
                'submissions',
            ])
            ->latest()
            ->first();

        $this->entry = $entry;

        if ($entry) {
            $this->status = $entry->status;

            switch ($entry->status) {
                case SubmissionStatus::APPROVED->value:
                    session(['highest_step_reached' => 10]);
                    $this->highestStepReached = session('highest_step_reached', 0);

                    $this->nextUpdateAllowedAt = Carbon::parse($entry->updated_at)->addYear();
                    $this->loadEntryData($entry); // Load data for editing
                    break;

                case SubmissionStatus::UNDER_REVIEW->value:
                    // Keep status tracking for under review entries
                    break;

                case SubmissionStatus::NEEDS_REVISION->value:
                    $this->comments = $entry->submissions()
                        ->where('status', SubmissionStatus::UNDER_REVIEW->value)
                        ->latest()
                        ->first()
                        ?->comments ?? collect();

                    $this->highestStepReached = 10;
                    // No break; continue to load data

                case SubmissionStatus::DRAFT->value:
                    $this->loadEntryData($entry);
                    break;
            }
        } else {
            // If no entry exists, create a new one
            $entry = $this->user->entries()->create([
                'is_current' => false,
                'status' => SubmissionStatus::DRAFT->value,
            ]);

            $this->loadEntryData($entry);
        }

        $this->initializeEntries();
    }


    protected function loadUserAddresses($addresses)
    {
        // Work out on this later
        // dd($addresses->get(1, collect()));
        // Ensure $addresses is a collection and has the expected structure
        if (!$addresses instanceof Collection) {
            $addresses = collect($addresses);
        }

        // Load residential and permanent addresses
        $this->loadAddresses(
            residential: $addresses->get(1, collect()), // Default to empty collection if index 1 is missing
            permanent: $addresses->get(0, collect())   // Default to empty collection if index 0 is missing
        );
    }

    protected function loadEmployeeParentsInformation($parents)
    {
        // dd($parents);
        $this->loadParentsInformation(
            father: $parents?->get(0, null),
            mother: $parents?->get(1, null),
        );
    }

    protected function initializeChildren()
    {
        $this->addEntry('children', ['full_name' => null, 'birth_date' => null]);
    }

    protected function initializeEligibilities()
    {
        $this->addEntry('eligibilities', [
            'career_service' => null,
            'ratings' => null,
            'exam_date' => null,
            'exam_place' => null,
            'license_number' => null,
            'license_validity' => null,
        ]);
    }

    protected function initializeWorkExperiences()
    {
        $this->addEntry('workExperiences', [
            'position' => null,
            'agency' => null,
            'salary' => null,
            'salary_grade' => null,
            'salary_step' => null,
            'status' => null,
            'government_service' => 1,
            'date_from' => null,
            'date_to' => null,
        ]);
    }

    protected function initializeVoluntaryWorkExperiences()
    {
        $this->addEntry('voluntaryWorks', [
            'position' => null,
            'organization_name' => null,
            'organization_address' => null,
            'date_from' => null,
            'date_to' => null,
            'total_hours' => null,
        ]);
    }

    protected function initializeTrainingEntries()
    {
        $this->addEntry('trainings', [
            'title' => null,
            'type' => null,
            'sponsored_by' => null,
            'date_from' => null,
            'date_to' => null,
            'total_hours' => null,
            'certificate' => null,
        ]);
    }

    protected function initializeSkillEntries()
    {
        $this->addEntry('skills', [
            'skill' => null,
        ]);
    }

    protected function initializeRecognitionEntries()
    {
        $this->addEntry('recognitions', [
            'recognition' => null,
        ]);
    }

    protected function initializeOrganizationEntries()
    {
        $this->addEntry('organizations', [
            'organization' => null,
        ]);
    }

    protected function initializeReferencesPeople()
    {
        $this->addEntry('references', [
            'fullname' => null,
            'address' => null,
            'telephone_no' => null,
        ]);
    }

    protected function loadEntryData($entry)
    {
        if (!$entry) {
            return;
        }

        $personalInformation = $entry->personalInformation ?? null;
        $this->loadPersonalInformation($personalInformation);
        $this->loadUserAddresses($personalInformation?->addresses ?? collect());
        $this->loadIdentifiers($personalInformation?->identifiers ?? collect());
        $this->loadSpouseInformation($entry?->spouse()?->first() ?? null);
        $this->loadEmployeeParentsInformation($entry?->parents ?? collect());
        $this->loadChildrenData($entry?->children ?? collect());
        $this->loadEducationalBackgroundData($entry?->educationalBackgrounds ?? collect());
        $this->loadEligibilities($entry?->eligibilities ?? collect());
        $this->loadWorkExperiences($entry?->workExperiences ?? collect());
        $this->loadVolWorkEntries($entry?->volWorkExperiences ?? collect());
        $this->loadTrainingEntries($entry?->trainings ?? collect());
        $this->loadOtherInformationEntries(
            $entry?->skills ?? collect(),
            $entry?->recognitions ?? collect(),
            $entry?->organizations ?? collect()
        );
        $this->loadQuestionResponses($entry?->question ?? collect());
        $this->loadReferencePerson($entry?->question?->referencePersons ?? collect());
        $this->loadAttachments($entry?->attachment);
    }


    protected function initializeEntries()
    {
        $this->initializeChildren();
        $this->initializeEligibilities();
        $this->initializeWorkExperiences();
        $this->initializeVoluntaryWorkExperiences();
        $this->initializeTrainingEntries();
        $this->initializeSkillEntries();
        $this->initializeRecognitionEntries();
        $this->initializeOrganizationEntries();
        $this->initializeReferencesPeople();
    }

    public function saveDraft()
    {
        // dd($this->all());

        // Fetch the current PDS entry for the user
        $entry = PdsEntry::where('user_id', $this->user->id)
            ->whereIn('status', [SubmissionStatus::DRAFT, SubmissionStatus::NEEDS_REVISION, SubmissionStatus::APPROVED]) // Only allow drafts or rejected entries to be edited
            ->first();

        // Prevent saving if the entry is under review or approved
        if (!$entry) {
            $this->dispatchAlertMessage(
                'Action Not Allowed',
                'Your PDS entry is either under review or already approved and cannot be modified.',
                'warning'
            );
            return false;
        }

        try {
            $this->validate($this->rules()[$this->currentStep]);
        } catch (ValidationException $e) {
            $this->setErrorBag($e->errors());

            $generalMessage = "Please check all the fields and correct any errors.";
            $firstField = $e->validator->errors()->keys()[0] ?? null;
            $firstErrorMessage = $e->validator->errors()->first();
            $detailedMessage = $firstField
                ? $firstErrorMessage
                : "Please review your input: $firstErrorMessage";

            $this->dispatchAlertMessage('Validation Error', $detailedMessage, 'error');

            return false; // Stop execution if validation fails
        }

        try {
            switch ($this->currentStep) {
                case 1:
                    $this->saveStepOne($entry);
                    break;
                case 2:
                    $this->saveStepTwo($entry);
                    break;
                case 3:
                    $this->saveStepThree($entry);
                    break;
                case 4:
                    $this->saveStepFour($entry);
                    break;
                case 5:
                    $this->saveStepFive($entry);
                    break;
                case 6:
                    $this->saveStepSix($entry);
                    break;
                case 7:
                    $this->saveStepSeven($entry);
                    break;
                case 8:
                    $this->saveStepEight($entry);
                    break;
                case 9:
                    $this->saveStepNine($entry);
                    break;
                case 10:
                    $this->saveStepTen($entry);
                    break;
                default:
                    throw new Exception('Invalid step');
            }

            $this->flashMessage(
                "Draft saved at " . now()->format('H:i A'),
                'success'
            );

            $this->dispatch('draft-saved');

            return true; // Indicate success
        } catch (Exception $e) {
            \Log::error('Failed to save draft', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            $this->flashMessage('Failed to save draft: ' . $e->getMessage(), 'error');

            return false; // Indicate failure
        }
    }


    #[On('entry-submitted')]
    public function save()
    {
        $this->saveDraft();
        try {
            $this->validate($this->rules()[$this->currentStep]);
        } catch (ValidationException $e) {
            $this->setErrorBag($e->errors());

            $generalMessage = "Please check all the fields and correct any errors.";
            $firstField = $e->validator->errors()->keys()[0] ?? null;
            $firstErrorMessage = $e->validator->errors()->first();
            $detailedMessage = $firstField
                ? $firstErrorMessage
                : "Please review your input: $firstErrorMessage";

            $this->dispatchAlertMessage('Validation Error', $detailedMessage, 'error');

            return; // Stop execution if validation fails
        }

        // Fetch the user's latest PDS entry
        $entry = $this->user->entries()->latest()->first();

        if (!$entry) {
            $this->dispatchAlertMessage("Error", "No PDS entry found to submit.", "error");
            return;
        }

        // Prevent new submission if the latest submission is still under review or draft
        if ($entry->status === SubmissionStatus::UNDER_REVIEW) {
            $this->dispatchAlertMessage("Error", "Your latest entry is already under review.", "error");
            return;
        }

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create a new submission record
            Submission::create([
                'pds_entry_id' => $entry->id,
                'status' => SubmissionStatus::UNDER_REVIEW,
                'remarks' => 'Initial Submission', // You can make this dynamic if needed
            ]);

            // Updates the entry
            $this->pdsService->updateStatus($entry->id, SubmissionStatus::UNDER_REVIEW);

            // Commit the transaction
            DB::commit();

            // Reset session variables on success
            session(['current_step' => 1]);
            session(['highest_step_reached' => 0]);

            // Display success message and redirect
            $this->dispatchAlertMessage("Success", "Your entry has been submitted for review.", "success");

            return redirect()->route('employee.submission.logs');
        } catch (\Exception $e) {
            // Roll back the transaction on error
            DB::rollBack();

            // Display error message
            $this->dispatchAlertMessage("Error", "Failed to submit your entry. Please try again.", "error");

            // Log the error for debugging
            logger()->error('Entry submission failed: ' . $e->getMessage());
        }
    }


    protected function saveStepOne($entry)
    {
        $personal_info = $this->personalInformationService
            ->store($this->getPersonalInformationData($entry->id));

        if (!$personal_info) throw new Exception('Failed to save personal information');

        if (!$this->addressService->store($this->getAddressData($personal_info->id))) {
            throw new Exception('Address saving failed');
        }

        if (!$this->employeeIdentifierService->store($this->getIdentifierData($personal_info->id))) {
            throw new Exception('Identifier saving failed');
        }
    }

    protected function saveStepTwo($entry)
    {
        if (!$this->spouseService->store($this->getSpouseData($entry->id))) {
            throw new Exception('Spouse information saving failed');
        }

        if (!$this->employeeParentService->store($this->getParentsData($entry->id))) {
            throw new Exception('Parents information saving failed');
        }

        if (!$this->childrenService->store($this->getChildrenData($entry->id))) {
            throw new Exception('Children information saving failed');
        }
    }

    protected function saveStepThree($entry)
    {
        // dd($entry->id);
        if (!$this->educationalBackgroundService->store($this->getEducationalBackgroundData($entry->id))) {
            throw new Exception('Educational background saving failed');
        }
    }

    protected function saveStepFour($entry)
    {
        if (!$this->eligibilityService->store($this->getEligibilityData($entry->id))) {
            throw new Exception('Eligibility data saving failed');
        }
    }

    protected function saveStepFive($entry)
    {
        if (!$this->workExperienceService->store($this->getWorkEntryData($entry->id))) {
            throw new Exception('Work experiences data saving failed');
        }
    }

    protected function saveStepSix($entry)
    {
        if (!$this->voluntaryWorkService->store($this->getVolWorkEntryData($entry->id))) {
            throw new Exception('Voluntary work experiences data saving failed');
        }
    }

    protected function saveStepSeven($entry)
    {
        // dd($this->getTrainingsData($entry->id));
        if (!$this->trainingService->store($this->getTrainingsData($entry->id))) {
            throw new Exception('Trainings data saving failed');
        }
    }

    protected function saveStepEight($entry)
    {
        // dd($this->getSkillData($entry->id));
        if (!$this->skillService->store($this->getSkillData($entry->id))) {
            throw new Exception('Skills data saving failed');
        }

        if (!$this->recognitionService->store($this->getReconitionData($entry->id))) {
            throw new Exception('Recognitions data saving failed');
        }

        if (!$this->organizationService->store($this->getOrganizationData($entry->id))) {
            throw new Exception('Organizations data saving failed');
        }
    }

    protected function saveStepNine($entry)
    {
        // Save questionnaire responses
        $additional_question = $this->additionalQuestionService->store($this->getQuestionResponsesData($entry->id));

        if (!$additional_question) throw new Exception('Failed to save the responses data');

        // Save the reference person data for later
        if (!$this->referencePersonService->store($this->getReferencePersonData($additional_question->id))) {
            throw new Exception('References person data saving failed');
        }
    }

    protected function saveStepTen($entry)
    {
        $this->saveImages();

        if (!$this->pdsAttachmentService->store($this->getAttachmentData($entry->id))) {
            throw new Exception('Attachement data saving failed');
        }
    }

    // Work on here tomorrow
    protected function saveImages()
    {
        $fileProperties = [
            'passport_photo' => 'passport_photos',
            'right_thumbmark_photo' => 'right_thumbmark_photos',
            'government_id_photo' => 'government_id_photos',
            'signature_photo' => 'signature_photos',
            'otr_photo' => 'otr_photos',
            'diploma_photo' => 'diploma_photos',
            'employement_certificate' => 'employement_certificates',
        ];

        foreach ($fileProperties as $fileProperty => $dir) {
            if ($this->{$fileProperty}) {
                // Store the new file and update property with its path
                $this->uploadImage($fileProperty, $dir);
            }
        }
    }

    // Initializes enums options
    protected function getOptions()
    {
        return [
            'sexOptions' => Sex::labels(),
            'civilStatusOptions' => CivilStatus::labels(),
            'bloodTypeOptions' => BloodType::labels(),
            'employementStatusOptions' => EmploymentStatus::options(),
            'trainingOptions' => TrainingTypes::options(),
            'criminalCaseOptions' => CriminalCaseStatus::options(),
            'governmentIdOptions' => GovernmentId::options(),
        ];
    }

    // Children Entry
    public function addChild()
    {
        $this->addEntry('children', ['full_name' => null, 'birth_date' => null]);
    }

    public function removeAllChild()
    {
        $this->removeAllEntry('children');

        $this->saveDraft();

        $this->addEntry('children', ['full_name' => null, 'birth_date' => null]);
    }

    // Educational Entry
    public function addEducationEntry($level)
    {
        if (in_array($level, ['vocational', 'college', 'graduate_studies'])) {
            $this->education[$level][] = [...$this->defaultFields];
        }
    }

    public function removeEducationEntry($level, $index)
    {
        if (in_array($level, ['vocational', 'college', 'graduate_studies']) && count($this->education[$level]) > 1) {
            unset($this->education[$level][$index]);
            $this->education[$level] = array_values($this->education[$level]); // Reindex the array
        }

        $this->dispatchAlertMessage(
            'Removed Successfully',
            "Entry #$index has been removed successfully",
            'success'
        );
    }

    public function removeAllEducationEntry($level)
    {
        if (in_array($level, ['vocational', 'college', 'graduate_studies'])) {
            $this->removeAllEntry($level);
            $this->education[$level] = [[...$this->defaultFields]];

            $this->saveDraft();
        }
    }

    // Eligibility Entry
    public function addEligibility()
    {
        $this->addEntry('eligibilities', [
            'career_service' => null,
            'ratings' => null,
            'exam_date' => null,
            'exam_place' => null,
            'license_number' => null,
            'license_validity' => null,
        ]);
    }

    public function removeAllEligibilities()
    {
        $this->removeAllEntry('eligibilities');
        $this->initializeEligibilities();
    }

    // Work Entries
    public function addWorkEntry()
    {
        $this->addEntry('workExperiences', [
            'position' => null,
            'agency' => null,
            'salary' => null,
            'salary_grade' => null,
            'salary_step' => null,
            'status' => null,
            'government_service' => 1,
            'date_from' => null,
            'date_to' => null,
        ]);
    }

    public function removeAllWorkEntry()
    {
        $this->removeAllEntry('workExperiences');
        $this->initializeWorkExperiences();
    }

    // Voluntary Works
    public function addVolWorkEntry()
    {
        $this->addEntry('voluntaryWorks', [
            'position' => null,
            'organization_name' => null,
            'organization_address' => null,
            'date_from' => null,
            'date_to' => null,
            'total_hours' => null,
        ]);
    }

    public function removeAllVolWorkEntry()
    {
        $this->removeAllEntry('voluntaryWorks');
        $this->initializeVoluntaryWorkExperiences();
    }

    // Trainings
    public function addTrainingEntry()
    {
        $this->addEntry('trainings', [
            'title' => null,
            'type' => null,
            'sponsored_by' => null,
            'date_from' => null,
            'date_to' => null,
            'total_hours' => null,
            'certificate' => null,
        ]);
    }

    public function removeAllTrainingEntry()
    {
        $this->removeAllEntry('trainings');
        $this->initializeTrainingEntries();
    }

    // Skills
    public function addSkillEntry()
    {
        $this->addEntry('skills', ['skill' => null]);
    }

    public function removeAllSkillEntry()
    {
        $this->removeAllEntry('skills');
        $this->initializeSkillEntries();
    }

    // Recognitions
    public function addRecognitionEntry()
    {
        $this->addEntry('recognitions', ['recognition' => null]);
    }

    public function removeAllRecognitionEntry()
    {
        $this->removeAllEntry('recognitions');
        $this->initializeRecognitionEntries();
    }

    // Organization
    public function addOrganizationEntry()
    {
        $this->addEntry('organizations', ['organization' => null]);
    }

    public function removeAllOrganizationEntry()
    {
        $this->removeAllEntry('organizations');
        $this->initializeOrganizationEntries();
    }

    public function addReferencePeople()
    {
        $this->addEntry('references', [
            'fullname' => null,
            'address' => null,
            'telephone_no' => null
        ]);
    }

    public function removeAllReferencePeople()
    {
        $this->removeAllEntry('references');
        $this->initializeReferencesPeople();
    }

    #[On('address-updated')]
    public function updateAddresses($addresses)
    {
        $this->residential = array_merge($this->residential, $addresses['residential']);
        $this->permanent = array_merge($this->permanent, $addresses['permanent']);
    }

    #[On('nationality-updated')]
    public function updateNationality($nationality)
    {
        $this->citizenship = $nationality['citizenship'];
        $this->citizenship_by = $nationality['citizenship_by'];
        $this->country = $nationality['country'];
    }

    // Process Automatic filling up for salary grade an step
    // public function updatedWorkExperiences($value, $key)
    // {
    //     if (str_contains($key, 'salary')) {
    //         $salaryData = $this->salaryService->getSalaryGradeAndStep($value);

    //         ['salary_grade' => $salaryGrade, 'salary_step' => $salaryStep] = $salaryData;

    //         if (preg_match('/^(\d+)\.([a-zA-Z_]+)$/ ', $key, $matches)) {

    //             $arrayName = 'workExperiences';
    //             $index = $matches[1];

    //             $this->$arrayName[$index] = array_merge($this->$arrayName[$index], [
    //                 'salary_grade' => $salaryGrade,
    //                 'salary_step' => $salaryStep
    //             ]);
    //         }
    //     }
    // }

    // Process Certificates
    public function updatedTrainings($value, $key)
    {
        if (str_ends_with($key, '.certificate')) {
            $index = explode('.', $key)[0]; // Get the training entry index

            // Store old file path before overwriting it
            $oldFilePath = $this->trainings[$index]['certificate_path'] ?? null;

            // Check if the uploaded file is valid
            if (isset($this->trainings[$index]['certificate']) && is_object($this->trainings[$index]['certificate'])) {
                try {
                    // Generate a unique filename
                    $filename = time() . '_' . $this->trainings[$index]['certificate']->getClientOriginalName();

                    // Store the file in storage/app/public/training directory
                    $path = $this->trainings[$index]['certificate']->storeAs(
                        'training',
                        $filename,
                        'public'
                    );

                    // Delete the previous file if it exists
                    if (!empty($oldFilePath) && Storage::disk('public')->exists($oldFilePath)) {
                        Storage::disk('public')->delete($oldFilePath);
                    }

                    // Save the file path
                    $this->trainings[$index]['certificate'] = $path; // Clear the file object

                } catch (\Exception $e) {
                    $this->dispatch('show-toast', [
                        'type' => 'error',
                        'title' => 'Error uploading certificate: ' . $e->getMessage()
                    ]);
                }
            }
        }
    }

    public function uploadImage($fileProperty, $dir)
    {
        if (!isset($this->{$fileProperty}) || !is_object($this->{$fileProperty})) {
            \Log::error("Upload failed: File not set or not an object.");
            return null;
        }

        try {
            \Log::info("Processing file upload for property: $fileProperty");

            if ($this->{$fileProperty}->getSize() > 2 * 1024 * 1024) { // 2MB in bytes
                \Log::warning("Upload failed: File size exceeds limit.");
                $this->addError($fileProperty, "The uploaded file must not exceed 2MB.");
                return null;
            }

            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            $fileMimeType = $this->{$fileProperty}->getMimeType();
            \Log::info("File MIME type: " . $fileMimeType);

            if (!in_array($fileMimeType, $allowedMimeTypes)) {
                \Log::warning("Upload failed: Invalid file type ($fileMimeType).");
                $this->addError($fileProperty, "Invalid file format. Allowed formats: JPG, JPEG, PNG, GIF, WEBP.");
                return null;
            }

            $filename = time() . '_' . uniqid() . '.' . $this->{$fileProperty}->getClientOriginalExtension();
            $filePath = "{$dir}/{$filename}";

            \Log::info("Storing file as: $filePath");

            $path = $this->{$fileProperty}->storeAs($dir, $filename, 'public');

            if (!$path) {
                throw new \Exception("Failed to store the file.");
            }

            \Log::info("File stored successfully at: $path");

            // Delete the old file if it exists
            $oldFile = $this->{$fileProperty . 'Path'} ?? null;
            if ($oldFile && Storage::exists("public/{$oldFile}")) {
                \Log::info("Deleting old file: $oldFile");
                Storage::delete("public/{$oldFile}");
            }

            $this->{$fileProperty} = $filePath;

            return $filePath;
        } catch (\Exception $e) {
            \Log::error("Error uploading image: " . $e->getMessage());
            $this->addError($fileProperty, "Error uploading image: " . $e->getMessage());
            return null;
        }
    }

    #[On('remove-entry')]
    public function removeItem($type, $index)
    {
        $this->removeEntry($type, $index);

        $this->dispatchAlertMessage(
            'Removed Successfully',
            "Entry #" . ($index + 1) . " has been removed successfully",
            'success'
        );
    }

    public function render()
    {
        return view(
            'livewire.employee.pds.create',
            ['steps' => $this->steps, 'stepIcons' => $this->stepIcons],
            $this->getOptions(),

        )
            ->extends('layouts.app')
            ->title('Add New Entry')
            ->section('content');
    }
}
