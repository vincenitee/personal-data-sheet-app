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
    public $openCard;
    public $entryStatus;

    public function mount(
        int $submissionId,
        Spouse $spouse,
        Collection $parents,
        ?Collection $children,
        string $entryStatus,
    ){
        $this->entryStatus = $entryStatus;

        $this->mother = $parents->where('relationship', 'mother')->first();
        $this->father = $parents->where('relationship', 'father')->first();

        $this->submissionId = $submissionId;
        $this->spouse = $spouse;
        $this->children = $children;
    }

    public function render()
    {
        return view('livewire.admin.steps.family-background');
    }
}
