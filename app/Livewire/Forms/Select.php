<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\Modelable;

class Select extends Component
{
    #[Modelable]
    public $selectedItem;

    public $label;
    public $name;
    public $options = [];

    public function render()
    {
        return view('livewire.forms.select');
    }
}
