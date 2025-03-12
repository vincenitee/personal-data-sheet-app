<?php

namespace App\Livewire\Print\Sections;

use App\Models\PersonalInformation;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;

class C1 extends Component
{
    public ?PersonalInformation $personalInformation;
    public ?Collection $employeeIdentifiers;

    public $permanentAddress;
    public $residentialAddress;
    public $spouse;
    public $father;
    public $mother;
    public $children;
    public $educationalBackgrounds;
    public $dateAccomplished;

    public function mount(?PersonalInformation $personalInformation)
    {
        if ($personalInformation) {
            $this->personalInformation = $personalInformation->load([
                'entry',
                'identifiers',
                'addresses.region',
                'addresses.province',
                'addresses.municipality',
                'addresses.barangay',
            ]);
        }

        $this->employeeIdentifiers = $this->personalInformation->identifiers->pluck('number', 'type');
        $this->permanentAddress = $this->personalInformation->addresses->where('address_type', 'permanent')->first();
        $this->residentialAddress = $this->personalInformation->addresses->where('address_type', 'residential')->first();
        $this->spouse = $this->personalInformation->entry->spouse;

        $this->father = $this->personalInformation->entry->parents->get(0);
        $this->mother = $this->personalInformation->entry->parents->get(1);
        $this->children = $this->personalInformation->entry->children;

        $this->educationalBackgrounds = $this->personalInformation->entry->educationalBackgrounds
            ->sortBy('year_graduated')
            ->groupBy('level')
            ->map(fn($group) => $group->first());

        $this->dateAccomplished = Carbon::parse($this->personalInformation->entry->created_at)->format('m/d/Y');
    }


    public function render()
    {
        return view('livewire.print.sections.c1');
    }
}
