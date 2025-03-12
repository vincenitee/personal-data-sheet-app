<?php

namespace App\Livewire\Print\Sections;

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

    public function mount(
        ?Collection $volWorkExperiences,
        ?Collection $trainings,
        ?Collection $skills,
        ?Collection $recognitions,
        ?Collection $organizations,
    ){
        $this->volWorkExperiences = $volWorkExperiences?->sortBy('date_to') ?? collect();
        $this->trainings = $trainings?->sortByDesc('date_to') ?? collect();
        $this->skills = $skills;
        $this->recognitions = $recognitions;
        $this->organizations = $organizations;

        $this->dateAccomplished = Carbon::parse($this->volWorkExperiences->first()->created_at)->format('m/d/Y');
        // dd($this->recognitions);
    }

    public function render()
    {
        return view('livewire.print.sections.c3');
    }
}
