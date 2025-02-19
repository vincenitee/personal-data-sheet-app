<?php

namespace App\Livewire\Employee\Pds;

use App\Enums\Sex;
use Livewire\Component;
use App\Models\PdsEntry;
use App\Enums\CivilStatus;
use Livewire\Attributes\On;
use App\Traits\HasFormSteps;
use App\Enums\SubmissionStatus;
use App\Services\EmployeeParentService;
use App\Services\AddressService;
use App\Services\ChildrenService;
use App\Services\CivilServiceEligibilityService;
use App\Services\EducationalBackgroundService;
use App\Traits\HasDynamicEntries;
use App\Traits\LoadsEmployeeData;
use Illuminate\Support\Facades\Auth;
use App\Services\EmployeeIdentifierService;
use App\Services\PersonalInformationService;
use App\Services\SpouseService;
use App\Traits\HandlesPdsData;
use App\Traits\HasFlashMessage;
use Exception;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Create extends Component
{
    use HasFormSteps, LoadsEmployeeData, HasDynamicEntries, HasFlashMessage, HandlesPdsData, WithFileUploads;

    public $user = null;
    public $isLocked = false;

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

    // Services
    protected PersonalInformationService $personalInformationService;
    protected AddressService $addressService;
    protected EmployeeIdentifierService $employeeIdentifierService;
    protected SpouseService $spouseService;
    protected EmployeeParentService $employeeParentService;
    protected ChildrenService $childrenService;
    protected EducationalBackgroundService $educationalBackgroundService;
    protected CivilServiceEligibilityService $eligibilityService;

    public function boot(
        PersonalInformationService $personalInformationService,
        AddressService $addressService,
        EmployeeIdentifierService $employeeIdentifierService,
        SpouseService $spouseService,
        EmployeeParentService $employeeParentService,
        ChildrenService $childrenService,
        EducationalBackgroundService $educationalBackgroundService,
        CivilServiceEligibilityService $eligibilityService,

    ) {
        $this->personalInformationService = $personalInformationService;
        $this->addressService = $addressService;
        $this->employeeIdentifierService = $employeeIdentifierService;
        $this->spouseService = $spouseService;
        $this->employeeParentService = $employeeParentService;
        $this->childrenService = $childrenService;
        $this->educationalBackgroundService = $educationalBackgroundService;
        $this->eligibilityService = $eligibilityService;
    }


    public function mount()
    {
        $this->user = Auth::user();

        if (!$this->user) {
            return;
        }

        // Initialize education field before fetching the entry
        $this->education = [
            'elementary' => [...$this->defaultFields],
            'secondary' => [...$this->defaultFields],
            'vocational' => [[...$this->defaultFields]],
            'college' => [[...$this->defaultFields]],
            'graduate_studies' => [[...$this->defaultFields]],
        ];

        $entry = $this->user->entries()
            ->with([
                'personalInformation.addresses',
                'personalInformation.identifiers',
                'spouse',
                'parents',
                'children',
                'educationalBackgrounds'
            ])
            ->firstOrCreate(
                ['status' => SubmissionStatus::DRAFT],
                ['is_current' => false]
            );

        if ($entry) {
            $this->loadEntryData($entry);
        }

        $this->initializeChildren();
        $this->initializeEligibilities();
    }

    protected function loadUserAddresses($addresses)
    {
        $this->loadAddresses(
            residential: $addresses->get(1, null),
            permanent: $addresses->get(0, null)
        );
    }

    protected function loadEmployeeParentsInformation($parents)
    {
        $this->loadParentsInformation(
            father: $parents->get(0, null),
            mother: $parents->get(1, null),
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

    protected function loadEntryData($entry)
    {
        $personalInformation = $entry->personalInformation;

        $this->loadPersonalInformation($personalInformation);
        $this->loadUserAddresses($personalInformation?->addresses ?? collect());
        $this->loadIdentifiers($personalInformation?->identifiers ?? collect());
        $this->loadSpouseInformation($entry?->spouse()?->first());
        $this->loadEmployeeParentsInformation($entry?->parents->get());
        $this->loadChildrenData($entry?->children);
        $this->loadEducationalBackgroundData($entry?->educationalBackgrounds);

        // dd($entry?->educationalBackgrounds);
        // dd($this->education);
    }

    public function saveDraft()
    {
        // dd($this->education);
        $entry = PdsEntry::firstOrCreate(
            ['user_id' => $this->user->id, 'status' => SubmissionStatus::DRAFT],
            ['is_current' => false]
        );

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
                default:
                    throw new Exception('Invalid step');
                    break;
            }

            $this->flashMessage(
                "Draft saved at " . now()->format('H:i A'),
                'success'
            );
        } catch (Exception $e) {
            \Log::error('Failed to save draft', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            $this->flashMessage('Failed to save draft: ' . $e->getMessage(), 'error');
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

    // Work on this later
    protected function saveStepFour($entry)
    {
        if(!$this->eligibilityService->store($this->getEligibilityData($entry->id))){
            throw new Exception('Eligibility data saving failed');
        }
    }

    // Initializes enums options
    protected function getOptions()
    {
        return [
            'sexOptions' => Sex::options(),
            'civilStatusOptions' => CivilStatus::options(),
        ];
    }

    // Children Entry
    public function addChild()
    {
        $this->addEntry('children', ['full_name' => null, 'birth_date' => null]);
    }

    public function removeChild($index)
    {
        $this->removeEntry('children', $index);
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

    public function removeEligibility($index)
    {
        $this->removeEntry('eligibilities', $index);
    }

    public function removeAllEligibilities()
    {
        $this->removeAllEntry('eligibilities');
        $this->initializeEligibilities();
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
