<?php

namespace App\Livewire\Admin\Steps;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class VoluntaryWork extends Component
{
    public int $submissionId;
    public ?Collection $volWorkExperiences;

    public function mount(
        int $submissionId,
        ?Collection $volWorkExperiences
    ){
        $this->submissionId = $submissionId;
        $this->volWorkExperiences = $volWorkExperiences->sortByDesc('date_from');
    }

    public function render()
    {
        return view('livewire.admin.steps.voluntary-work');
    }
}
