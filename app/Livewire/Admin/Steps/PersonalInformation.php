<?php

namespace App\Livewire\Admin\Steps;

use App\Models\PersonalInformation as ModelsPersonalInformation;
use Livewire\Component;

class PersonalInformation extends Component
{
    public ModelsPersonalInformation $personalInfo;
    public $permanentAddress;
    public $residentialAddress;
    public int $submissionId;

    public function mount(
        int $submissionId,
        ModelsPersonalInformation $personalInfo
    )
    {
        $this->submissionId = $submissionId;
        // Eager load related models
        $this->personalInfo = $personalInfo->load([
            'identifiers',
            'addresses.region',
            'addresses.province',
            'addresses.municipality',
            'addresses.barangay'
        ]);

        // Extract permanent and current addresses
        $this->permanentAddress = $this->personalInfo->addresses->where('address_type', 'permanent')->first();
        $this->residentialAddress = $this->personalInfo->addresses->where('address_type', 'residential')->first();

        
    }

    public function render()
    {
        return view('livewire.admin.steps.personal-information');
    }
}
