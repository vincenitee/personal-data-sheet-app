<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard')
            ->extends('layouts.app')
            ->title('Dashboard')
            ->section('content');
    }
}
