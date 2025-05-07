<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\On;

class GenerateReport extends Component
{
    public $employees = null;

    public function mount(){
        $this->employees = User::with([
            'entries',
            'entries.personalInformation',
            'entries.workExperiences',
            'entries.educationalBackgrounds',
            'entries.eligibilities',
        ])->role('employee')->get();
    }

    #[On('filtersApplied')]
    public function filtersUpdated($filters){
        
    }

    public function render()
    {
        return view('livewire.admin.generate-report')
            ->extends('layouts.app')
            ->section('content')
            ->title('Generate Reports');
    }
}