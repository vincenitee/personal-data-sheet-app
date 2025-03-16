<?php

namespace App\Livewire\Admin\Steps;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class OtherInformation extends Component
{
    public int $submissionId;
    public ?Collection $skills;
    public ?Collection $recognitions;
    public ?Collection $organizations;
    public $openCard;
    public $entryStatus;

    public function mount(
        int $submissionId,
        ?Collection $skills,
        ?Collection $recognitions,
        ?Collection $organizations,
        string $entryStatus,
    ){
        $this->entryStatus = $entryStatus;
        $this->submissionId = $submissionId;
        $this->skills = $skills->sortByDesc('skill');
        $this->recognitions = $recognitions;
        $this->organizations = $organizations;
    }

    public function render()
    {
        return view('livewire.admin.steps.other-information');
    }
}
