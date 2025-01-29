<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class DatePicker extends Component
{
    #[Modelable]
    public $selectedDate;
    
    public $name;
    public $label;


    public function render()
    {
        return view('livewire.forms.date-picker');
    }
}
