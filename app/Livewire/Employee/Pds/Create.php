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
use App\Traits\HasDynamicEntries;
use App\Traits\LoadsEmployeeData;
use Illuminate\Support\Facades\Auth;
use App\Services\EmployeeIdentifierService;
use App\Services\PersonalInformationService;
use App\Services\SpouseService;
use App\Traits\HandlesPdsData;
use App\Traits\HasFlashMessage;
use Exception;

class Create extends Component
{
    use HasFormSteps, LoadsEmployeeData, HasDynamicEntries, HasFlashMessage, HandlesPdsData;

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
    public $gsis_id = null;
    public $pagibig_id = null;
    public $philhealth_id = null;
    public $sss_id = null;
    public $tin_id = null;
    public $agency_id = null;

    public $identifiers =[
        'gsis' => null,
        'pag_ibig' => null,
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

    public $educationalLevels = [
        'elementary' => [],
        'secondary' => [],
        'vocational' => [],
        'college' => [],
        'graduate_studies' => [],
    ];

    // Services
    protected PersonalInformationService $personalInformationService;
    protected AddressService $addressService;
    protected EmployeeIdentifierService $employeeIdentifierService;
    protected SpouseService $spouseService;
    protected EmployeeParentService $employeeParentService;
    protected ChildrenService $childrenService;

    public function boot(
        PersonalInformationService $personalInformationService,
        AddressService $addressService,
        EmployeeIdentifierService $employeeIdentifierService,
        SpouseService $spouseService,
        EmployeeParentService $employeeParentService,
        ChildrenService $childrenService,
    ) {
        $this->personalInformationService = $personalInformationService;
        $this->addressService = $addressService;
        $this->employeeIdentifierService = $employeeIdentifierService;
        $this->spouseService = $spouseService;
        $this->employeeParentService = $employeeParentService;
        $this->childrenService = $childrenService;
    }

    public function mount()
    {
        $this->user = Auth::user();

        if (!$this->user) {
            return;
        }

        $entry = $this->user->entries()->firstOrCreate(
            ['status' => SubmissionStatus::DRAFT],
            ['is_current' => false]
        );

        $this->addEntry('children', ['full_name' => null, 'birth_date' => null]);

        if (!$entry) {
            return;
        }

        $this->loadPersonalInformation($entry?->personalInformation);
        $this->loadUserAddresses($entry?->personalInformation?->addresses ?? collect());
        $this->loadIdentifiers($entry?->personalInformation?->identifiers ?? collect());
        $this->loadSpouseInformation($entry?->spouse()?->first());
        $this->loadEmployeeParentsInformation($entry?->parents->get());
        $this->loadChildrenData($entry?->children);


        // dump(count($this->children));
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


    public function saveDraft()
    {
        // dd($this->educationalLevels);
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
                default:
                    throw new Exception('Invalid step');
                    break;
            }

            $this->flashMessage(
                "Draft saved at $this->currentStep" . now()->format('H:i '),
                'success'
            );
        } catch (Exception $e) {
            $this->flashMessage('Failed to save draft: ' . $e->getMessage(), 'error');
        }
    }

    protected function saveStepOne($entry)
    {
        $personal_info =  $this->personalInformationService
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

    // protected function getPersonalInformationData(int $entryId): array
    // {
    //     return ['pds_entry_id' => $entryId] + $this->only([
    //         'first_name',
    //         'middle_name',
    //         'last_name',
    //         'suffix',
    //         'birth_date',
    //         'birth_place',
    //         'sex',
    //         'civil_status',
    //         'height',
    //         'weight',
    //         'blood_type',
    //         'citizenship',
    //         'citizenship_by',
    //         'country',
    //         'telephone_no',
    //         'mobile_no',
    //         'email'
    //     ]);
    // }

    // // Prepares identifier data
    // protected function getIdentifierData(int $personalInformationId)
    // {
    //     return [
    //         'personal_information_id' => $personalInformationId,
    //         'identifiers' => [
    //             IdentifierType::GSIS->value => $this->gsis_id,
    //             IdentifierType::PAGIBIG->value => $this->pagibig_id,
    //             IdentifierType::PHILHEALTH->value => $this->philhealth_id,
    //             IdentifierType::SSS->value => $this->sss_id,
    //             IdentifierType::TIN->value => $this->tin_id,
    //             IdentifierType::AGENCY->value => $this->agency_id,
    //         ],
    //     ];
    // }

    // // Prepares address data
    // protected function getAddressData(int $personalInformationId)
    // {
    //     return [
    //         'personal_information_id' => $personalInformationId,
    //         'residential' => collect($this->residential)->except(
    //             ['provinces', 'municipalities', 'barangays']
    //         )->toArray(),
    //         'permanent' => collect($this->permanent)->except(
    //             ['provinces', 'municipalities', 'barangays']
    //         )->toArray(),
    //     ];
    // }

    // protected function getSpouseData(int $entryId)
    // {
    //     return array_merge(['pds_entry_id' => $entryId], $this->spouse);
    // }

    // protected function getParentsData(int $entryId)
    // {
    //     return [
    //         'pds_entry_id' => $entryId,
    //         'father' => $this->father,
    //         'mother' => $this->mother,
    //     ];
    // }

    // protected function getChildrenData(int $entryId)
    // {
    //     return [
    //         'pds_entry_id' => $entryId,
    //         'children' => $this->children,
    //     ];
    // }

    // protected function getEducationalBackgroundData(int $entryId)
    // {
    //     return [
    //         'pds_entry_id' => $entryId,
    //     ];
    // }

    // Initializes enums options
    protected function getOptions()
    {
        return [
            'sexOptions' => Sex::options(),
            'civilStatusOptions' => CivilStatus::options(),
        ];
    }

    public function addChild()
    {
        $this->addEntry('children', ['full_name' => null, 'birth_date' => null]);
    }

    public function removeChild($index)
    {
        $this->removeEntry('children', $index);
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
            ->title('Dashboard')
            ->section('content');
    }
}
