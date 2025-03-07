<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\PdsEntry;
use App\Models\Submission;
use App\Services\PdsService;
use App\Enums\SubmissionStatus;
use Illuminate\Support\Facades\DB;
use App\Services\SubmissionService;
use App\Services\SubmissionLogsService;

class PdsReviewForm extends Component
{
    public PdsEntry $entry;
    public Submission $submission;
    public string $remarks;

    protected SubmissionService $submissionService;
    protected SubmissionLogsService $logService;
    protected PdsService $entryService;

    public function boot(
        SubmissionService $submissionService,
        SubmissionLogsService $logService,
        PdsService $entryService
    ) {
        $this->submissionService = $submissionService;
        $this->logService = $logService;
        $this->entryService = $entryService;
    }

    public function mount(Submission $submission)
    {
        $this->submission = $submission;

        $this->entry = $submission->entry->load([
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
        ]);

        // dd($this->entry->workExperiences);
    }

    public function submitForRevisions()
    {
        
    }


    public function render()
    {
        return view('livewire.admin.pds-review-form')
            ->extends('layouts.app')
            ->title('Review PDS Entry')
            ->section('content');
    }
}
