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

        // Fetches the work experiences from latest to oldest
        $this->workExperiences = $pdsEntry->workExperiences->sortBy(function ($item){
            return $item->date_to ?? now()->addCentury();
        })
        ->reverse()
        ->values();

        // dd($eligibilities, $workExperiences);
        $this->dateAccomplished = Carbon::parse($pdsEntry->updated_at)->format('m/d/Y');
    }

    public function render()
    {
        return view('livewire.print.sections.c2');
    }
}
