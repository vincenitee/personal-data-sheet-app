<?php

namespace App\Livewire\Employee;

use Livewire\Component;

class Notification extends Component
{
    public function render()
    {
        return view('livewire.employee.notification')
            ->extends('layouts.app')
            ->title('Notifications')
            ->section('content');
    }
}
