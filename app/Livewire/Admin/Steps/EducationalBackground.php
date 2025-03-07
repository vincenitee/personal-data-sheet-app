<?php

namespace App\Livewire\Admin\Steps;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class EducationalBackground extends Component
{
    public int $submissionId;
    public Collection $educationalBackgrounds;

    public function mount(int $submissionId, Collection $educationalBackgrounds){
        $this->submissionId = $submissionId;
        $this->educationalBackgrounds = $educationalBackgrounds;
    }

    public function render()
    {
        return view('livewire.admin.steps.educational-background');
    }
}
