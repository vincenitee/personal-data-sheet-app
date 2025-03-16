<?php

namespace App\Livewire\Print\Sections;

use App\Models\PdsEntry;
use App\Models\PersonalInformation;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;

class C1 extends Component
{
    public ?PersonalInformation $personalInformation = null;
    public ?Collection $employeeIdentifiers = null;

    public $permanentAddress = null;
    public $residentialAddress = null;
    public $spouse;
    public $father;
    public $mother;
    public $children;
    public $educationalBackgrounds;
    public $dateAccomplished;

    public function mount(?PdsEntry $pdsEntry)
    {
        if ($pdsEntry) {
            // Load relationships at once for efficiency
            $pdsEntry->load([
                'personalInformation.entry',
                'personalInformation.identifiers',
                'personalInformation.addresses.region',
                'personalInformation.addresses.province',
                'personalInformation.addresses.municipality',
                'personalInformation.addresses.barangay',
                'spouse',
                'parents',
                'children',
                'educationalBackgrounds',
            ]);

            $this->personalInformation = $pdsEntry->personalInformation;
        }

        // Ensure `personalInformation` is not null before accessing relationships
        $this->employeeIdentifiers = optional($this->personalInformation?->identifiers)->pluck('number', 'type') ?? collect();
        $this->permanentAddress = optional($this->personalInformation?->addresses)->where('address_type', 'permanent')->first();
        $this->residentialAddress = optional($this->personalInformation?->addresses)->where('address_type', 'residential')->first();

        // Use `?? collect()` to prevent issues when `null`
        $this->spouse = $pdsEntry?->spouse ?? collect();
        $this->father = $pdsEntry?->parents->get(0) ?? collect();
        $this->mother = $pdsEntry?->parents->get(1) ?? collect();
        $this->children = $pdsEntry?->children ?? collect();

        // Ensure educational backgrounds are grouped correctly and null-safe
        $this->educationalBackgrounds = $pdsEntry?->educationalBackgrounds
            ?->sortBy('year_graduated')
            ->groupBy('level')
            ?->map(fn($group) => $group->first()) ?? collect();

        // Use `optional()` to prevent errors if `$pdsEntry` is null
        $this->dateAccomplished = optional($pdsEntry?->updated_at)->format('m/d/Y') ?? 'N/A';
    }

    public function render()
    {
        return view('livewire.print.sections.c1');
    }
}
