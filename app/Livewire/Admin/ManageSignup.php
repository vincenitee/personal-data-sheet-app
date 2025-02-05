<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class ManageSignup extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-signup')
            ->extends('layouts.app')
            ->title('Manage Signups')
            ->section('content');
    }
}
