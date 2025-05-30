<?php

namespace App\Livewire\Admin\Steps;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class Trainings extends Component
{
    public int $submissionId;
    public ?Collection $trainings;
    public $openCard;
    public $entryStatus;

    public function mount(
        int $submissionId,
        ?Collection $trainings,
        string $entryStatus
    ){
        $this->entryStatus = $entryStatus;
        
        // dd($trainings);
        $this->submissionId = $submissionId;
        $this->trainings = $trainings->sortByDesc('date_from');
    }

    public function render()
    {
        return view('livewire.admin.steps.trainings');
    }
}
