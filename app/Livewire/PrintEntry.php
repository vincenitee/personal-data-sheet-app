<?php

namespace App\Livewire;

use App\Enums\SubmissionStatus;
use App\Models\PdsEntry;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PrintEntry extends Component
{
    public ?PdsEntry $pdsEntry;

    public $currentStep = 1;

    public function mount()
    {
        $this->pdsEntry = PdsEntry::with([
            'user',
            'personalInformation',
            'parents',
            'spouse',
            'children',
            'educationalBackgrounds',
            'eligibilities',
            'workExperiences',
            'volWorkExperiences',
            'trainings',
            'skills',
            'recognitions',
            'organizations',
            'question',
            'attachment',
            'submissions'
        ])
            ->where('user_id', Auth::id())
            ->where('status', SubmissionStatus::APPROVED->value)
            ->latest()
            ->first();
    }

    public function jumpToSection(int $step){
        // dd($step);
        $this->currentStep = $step;
    }

    public function render()
    {
        return view('livewire.print-entry')
            ->extends('layouts.app')
            ->title('Print Entry')
            ->section('content');
    }
}
