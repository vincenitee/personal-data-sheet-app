<?php

namespace App\Livewire\Admin\Steps;

use Livewire\Component;
use Illuminate\Support\Collection;

class WorkExperience extends Component
{

    public int $submissionId;
    public ?Collection $workExperiences;
    public $openCard;
    public $entryStatus;

    public function mount(
        int $submissionId,
        ?Collection $workExperiences,
        string $entryStatus
    ){
        $this->entryStatus = $entryStatus;
        $this->submissionId = $submissionId;
        $this->workExperiences = collect($workExperiences)->sortByDesc('date_from');
    }

    public function render()
    {
        return view('livewire.admin.steps.work-experience');
    }
}
