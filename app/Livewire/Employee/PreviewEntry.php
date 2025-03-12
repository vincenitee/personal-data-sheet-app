<?php

namespace App\Livewire\Employee;

use App\Enums\SubmissionStatus;
use App\Models\PdsEntry;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PreviewEntry extends Component
{
    public ?PdsEntry $pdsEntry;

    public $currentStep = 1;

    public function mount(?PdsEntry $pdsEntry)
    {
        $this->currentStep = session('current_print_step', 1);
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

        // dd($this->pdsEntry->workExperiences);
    }

    public function jumpToSection(int $step){
        // dd($step);
        $this->currentStep = $step;
        session(['current_print_step' => $step]);
    }

    public function render()
    {
        return view('livewire.employee.preview-entry')
            ->extends('layouts.app')
            ->title('Preview Entry')
            ->section('content');
    }
}
