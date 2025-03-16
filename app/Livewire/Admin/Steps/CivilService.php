<?php

namespace App\Livewire\Admin\Steps;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CivilService extends Component
{
    public int $submissionId;
    public ?Collection $eligibilities;
    public $openCard;

    public function mount(
        int $submissionId,
        Collection $eligibilities
    ) {
        $withExam = $eligibilities->whereNotNull('exam_date')->sortBy('exam_date');
        $withoutExam = $eligibilities->whereNull('exam_date');

        $this->eligibilities = $withExam->merge($withoutExam);
        $this->submissionId = $submissionId;
    }

    public function render()
    {
        return view('livewire.admin.steps.civil-service');
    }
}
