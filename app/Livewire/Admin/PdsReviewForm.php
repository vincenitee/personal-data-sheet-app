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
    public string $remarks;

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
        $this->remarks = '';
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

        // Mark the entry as current
        $this->pdsService->update($entryId, ['is_current' => true]);

        // Create a submission entry
        $data = [
            'pds_entry_id' => $entryId,
            'status' => SubmissionStatus::APPROVED->value,
            'remarks' => 'Your entry has been approved',
        ];

        $this->submissionService->create($data);

        // Fetch the PDS entry
        $pdsEntry = $this->pdsService->findById($entryId);

        if ($pdsEntry && $pdsEntry->user) {
            $user = $pdsEntry->user;

            // Send an email notification
            Mail::to($user->email)->queue(
                new PdsEntryStatusMail(
                    $user,
                    SubmissionStatus::APPROVED->value,
                    'Your entry has been approved',
                    $pdsEntry
                )
            );

            // Send a system notification
            $user->notify(new PdsStatusNotification(
                SubmissionStatus::APPROVED->value,
                'Your Entry has been approved'
            ));
        }

        // Dispatch a success alert
        $this->dispatch('show-alert', [
            'title' => 'Approved Entry',
            'text' => 'The entry has been successfully approved',
            'icon' => 'success'
        ]);

        // Redirect to the submissions page
        return $this->redirect(url: url(route('admin.submissions')), navigate: true);
    }


    #[On('entry-reverted')]
    public function entryReverted(int $entryId)
    {
        // Fetch the PDS Entry
        $pdsEntry = $this->pdsService->findById($entryId); // Ensure this method exists in your service

        if (!$pdsEntry) {
            return;
        }

        // Update entry status to "Under Review"
        $this->pdsService->updateStatus($entryId, SubmissionStatus::UNDER_REVIEW);

        // Create a submission entry
        $this->submissionService->create([
            'pds_entry_id' => $entryId,
            'status' => SubmissionStatus::UNDER_REVIEW->value,
            'remarks' => 'Your entry has been reverted for review',
        ]);

        // Get the user from the entry
        $user = $pdsEntry->user;

        if ($user) {
            // Send email notification
            Mail::to($user->email)->queue(new PdsEntryStatusMail(
                $user,
                SubmissionStatus::UNDER_REVIEW->value,
                'Your entry has been reverted for review',
                $pdsEntry
            ));

            // Send system notification
            $user->notify(new PdsStatusNotification(
                SubmissionStatus::UNDER_REVIEW->value,
                'Your Entry has been reverted for review'
            ));
        }

        // Dispatch an alert indicating success
        $this->dispatch('show-alert', [
            'title' => 'Reverted Entry',
            'text' => 'The entry has been successfully reverted for review',
            'icon' => 'warning'
        ]);

        // Redirect to the submissions page
        return $this->redirect(route('submissions.review', ['pdsEntry' => $pdsEntry->id]), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.pds-review-form')
            ->extends('layouts.app')
            ->title('Review PDS Entry')
            ->section('content');
    }
}
