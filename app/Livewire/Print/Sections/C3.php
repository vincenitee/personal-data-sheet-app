<?php

namespace App\Livewire\Print\Sections;

use App\Models\PdsEntry;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class C3 extends Component
{
    public ?Collection $volWorkExperiences;
    public ?Collection $trainings;
    public ?Collection $skills;
    public ?Collection $recognitions;
    public ?Collection $organizations;
    public $dateAccomplished;

    public function mount(?PdsEntry $pdsEntry
    ){
        $this->volWorkExperiences = $pdsEntry?->volWorkExperiences->sortBy('date_to') ?? collect();
        $this->trainings = $pdsEntry?->trainings->sortByDesc('date_to') ?? collect();
        $this->skills = $pdsEntry?->skills ?? collect();
        $this->recognitions = $pdsEntry?->recognitions ?? collect();
        $this->organizations = $pdsEntry?->organizations ?? collect();

        $this->dateAccomplished = Carbon::parse($pdsEntry->created_at)->format('m/d/Y');
        // dd($this->recognitions);
    }

    public function render()
    {
        return view('livewire.print.sections.c3');
    }
}
