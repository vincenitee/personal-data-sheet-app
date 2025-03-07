<?php

namespace App\Livewire\Admin\Steps;

use App\Models\EmployeeParent;
use App\Models\Spouse;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class FamilyBackground extends Component
{
    public int $submissionId;

    public ?Spouse $spouse;
    public EmployeeParent $father;
    public EmployeeParent $mother;
    public ?Collection $children;

    public function mount(
        int $submissionId,
        Spouse $spouse,
        Collection $parents,
        ?Collection $children,
    ){

        $this->father = $parents->get(0);
        $this->mother = $parents->get(1);

        $this->submissionId = $submissionId;
        $this->spouse = $spouse;
        $this->children = $children;
    }

    public function render()
    {
        return view('livewire.admin.steps.family-background');
    }
}
