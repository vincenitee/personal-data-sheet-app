<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\PdsEntry;
use App\Models\Submission;
use Livewire\Attributes\On;
use App\Services\PdsService;
use App\Enums\SubmissionStatus;
use App\Mail\PdsEntryStatusMail;
use App\Services\SubmissionService;
use Illuminate\Support\Facades\Mail;
use App\Notifications\PdsStatusNotification;


class PdsReviewForm extends Component
{
    public PdsEntry $pdsEntry;
    public Submission $submission;
    public string $remarks = 'Please review and provide necessary corrections';

    protected SubmissionService $submissionService;
    protected PdsService $pdsService;

    public function boot(
        SubmissionService $submissionService,
        PdsService $pdsService
    ) {
        $this->submissionService = $submissionService;
        $this->pdsService = $pdsService;
    }

    public function mount(PdsEntry $pdsEntry)
    {
        // dd($pdsEntry);
        $this->pdsEntry = $pdsEntry->load([
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
        ]);

        $this->submission = $pdsEntry->submissions()->latest()->first();

        // dd($this->submission->comments);
        // dd($this->entry->workExperiences);
    }

    public function submitForRevisions()
    {
        // Ensure the PDS entry exists before proceeding
        if (!$this->pdsEntry) {
            $this->dispatch('show-alert', [
                'title' => 'Error',
                'text' => 'PDS entry not found.',
                'icon' => 'error'
            ]);
            return;
        }

        // Attempt to update the status
        $statusUpdated = $this->pdsService->updateStatus($this->pdsEntry->id, SubmissionStatus::NEEDS_REVISION);

        if (!$statusUpdated) {
            $this->dispatch('show-alert', [
                'title' => 'Error',
                'text' => 'Failed to update status. Please try again.',
                'icon' => 'error'
            ]);
            return;
        }

        // Prepare submission data
        $data = [
            'pds_entry_id' => $this->pdsEntry->id,
            'status' => SubmissionStatus::NEEDS_REVISION->value,
            'remarks' => $this->remarks,
        ];

        // dd($data);

        // Create a submission record
        $this->submissionService->create($data);

        // Get the associated user
        $user = $this->pdsEntry->user;

        // Fetch previous comments related to the submission
        $comments = $this->pdsEntry->submission?->comments()->pluck('comment')->toArray() ?? [];

        // Send notifications if user exists and has an email
        if ($user && !empty($user->email)) {
            // Queue email notification
            Mail::to($user->email)->queue(
                new PdsEntryStatusMail(
                    $user,
                    SubmissionStatus::NEEDS_REVISION->value,
                    $this->remarks,
                    $this->pdsEntry,
                    $comments
                )
            );

            // Send system notification
            $user->notify(new PdsStatusNotification(
                SubmissionStatus::NEEDS_REVISION->value,
                'Your PDS entry has been returned for revisions. Remarks: ' . $this->remarks
            ));
        }

        // Success alert
        $this->dispatch('show-alert', [
            'title' => 'Revision Returned',
            'text' => 'The entry has been successfully sent back for revisions.',
            'icon' => 'success',
        ]);

        // Redirect to the submissions page
        return $this->redirect(url: route('admin.submissions'), navigate: true);
    }



    #[On('entry-approved')]
    public function approveEntry($entryId)
    {
        // Update entry status
        $this->pdsService->updateStatus($entryId, SubmissionStatus::APPROVED);

        $this->pdsService->update($entryId, ['is_current' => true]);

        // Create a submission entry
        $data = [
            'pds_entry_id' => $entryId,
            'status' => SubmissionStatus::APPROVED->value,
            'remarks' => 'Your entry has been approved',
        ];

        $this->submissionService->create($data);

        // Get the user
        $user = $this->pdsEntry->user;

        if ($user) {
            // Sends an email notification to the user
            Mail::to($user->email)->queue(
                new PdsEntryStatusMail(
                    $user,
                    SubmissionStatus::APPROVED->value,
                    $this->remarks,
                    $this->pdsEntry
                )
            );

            // Sends a system notification
            $user->notify(new PdsStatusNotification(
                SubmissionStatus::APPROVED->value,
                'Your Entry has been approved'
            ));
        }

        // Dispatch a alert indicating success
        $this->dispatch('show-alert', [
            'title' => 'Approved Entry',
            'text' => 'The entry has been successfully approved',
            'icon' => 'success'
        ]);

        // Redirect to the submissions page
        return $this->redirect(url: url(route('admin.submissions')), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.pds-review-form')
            ->extends('layouts.app')
            ->title('Review PDS Entry')
            ->section('content');
    }
}
