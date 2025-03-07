<?php

namespace App\Livewire\Admin\Steps;

use Livewire\Component;
use Illuminate\Support\Collection;

class WorkExperience extends Component
{

    public int $submissionId;
    public ?Collection $workExperiences;

    public function mount(
        int $submissionId,
        ?Collection $workExperiences
    ){
        $this->submissionId = $submissionId;
        $this->workExperiences = collect($workExperiences)->sortBy('date_from');
    }

    public function render()
    {
        return view('livewire.admin.steps.work-experience');
    }
}
