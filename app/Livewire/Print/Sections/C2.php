<?php

namespace App\Livewire\Print\Sections;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class C2 extends Component
{
    public ?Collection $eligibilities;
    public ?Collection $workExperiences;
    public $dateAccomplished;

    public function mount(
        ?Collection $eligibilities,
        ?Collection $workExperiences
    ) {
        $this->eligibilities = $eligibilities;
        $this->workExperiences = $workExperiences;

        // dd($eligibilities, $workExperiences);
        $this->dateAccomplished = Carbon::parse($this->eligibilities->first()->entry->created_at)->format('m/d/Y');
    }

    public function render()
    {
        return view('livewire.print.sections.c2');
    }
}
