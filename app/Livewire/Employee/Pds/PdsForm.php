<?php

namespace App\Livewire\Employee\Pds;

use Livewire\Component;
use App\Models\PdsEntry;

class PdsForm extends Component
{
    public ?PdsEntry $entry = null;
    public int $currentStep = 1;
    public int $highestStepReached = 1;
    public bool $isLocked = false;

    public function render()
    {
        return view('livewire.employee.pds.pds-form');
    }
}
