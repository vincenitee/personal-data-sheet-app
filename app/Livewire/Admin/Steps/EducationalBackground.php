<?php

namespace App\Livewire\Admin\Steps;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class EducationalBackground extends Component
{
    public int $submissionId;
    public Collection $educationalBackgrounds;

    public function mount(int $submissionId, Collection $educationalBackgrounds)
    {
        $this->submissionId = $submissionId;

        // Define the order of education levels
        $order = [
            'elementary' => 1,
            'secondary' => 2,
            'vocational' => 3,
            'college' => 4,
            'graduate_studies' => 5
        ];

        // Sort the collection based on the predefined order
        $this->educationalBackgrounds = $educationalBackgrounds->sortBy(function ($item) use ($order) {
            return $order[$item->level] ?? 999; // Default to high number if not found
        });
    }


    public function render()
    {
        return view('livewire.admin.steps.educational-background');
    }
}
