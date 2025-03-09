<?php

namespace App\Livewire\Print\Sections;

use App\Models\PersonalInformation;
use Livewire\Component;

class C1 extends Component
{
    public ?PersonalInformation $personalInformation;

    public function mount(?PersonalInformation $personalInformation)
    {
        $this->personalInformation = $personalInformation;
    }

    public function render()
    {
        return view('livewire.print.sections.c1');
    }
}
