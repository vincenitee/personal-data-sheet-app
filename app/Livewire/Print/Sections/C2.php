<?php

namespace App\Livewire\Print\Sections;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\PdsEntry;
use Illuminate\Database\Eloquent\Collection;

class C2 extends Component
{
    public ?Collection $eligibilities;
    public ?Collection $workExperiences;
    public $dateAccomplished;

    public function mount(
        ?PdsEntry $pdsEntry
    ) {
        $this->eligibilities = $pdsEntry->eligibilities;
        $this->workExperiences = $pdsEntry->workExperiences;

        // dd($eligibilities, $workExperiences);
        $this->dateAccomplished = Carbon::parse($pdsEntry->created_at)->format('m/d/Y');
    }

    public function render()
    {
        return view('livewire.print.sections.c2');
    }
}
