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
    public PdsEntry $entry;
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

    public function mount(PdsEntry $entry)
    {
        $this->submission = $entry->submissions()->latest()->first();
        $this->entry = $entry->load([
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

        // dd($this->submission->comments);
        // dd($this->entry->workExperiences);
    }

    public function submitForRevisions()
    {
        // Prepares the data
        if (!$this->pdsService->updateStatus($this->entry->id, SubmissionStatus::NEEDS_REVISION)) {
            $this->dispatch('show-alert', [
                'title' => 'Success',
                'text' => 'The entry has been sent back for revisions',
                'icon' => 'info'
            ]);
        }

        $data = [
            'pds_entry_id' => $this->entry->id,
            'status' => SubmissionStatus::NEEDS_REVISION->value,
            'remarks' => $this->remarks,
        ];

        $this->submissionService->create($data);

        // Get the user
        $user = $this->entry->user;

        $comments = $this->submission->comments()->pluck('comment')->toArray();

        if ($user) {
            // Sends an email notification to the user
            Mail::to($user->email)->queue(
                new PdsEntryStatusMail(
                    $user,
                    SubmissionStatus::NEEDS_REVISION->value,
                    $this->remarks,
                    $this->entry,
                    $comments,
                )
            );

            // Sends a system notification
            $user->notify(new PdsStatusNotification(
                SubmissionStatus::NEEDS_REVISION->value,
                'Your PDS entry has been returned for revisions. Remarks: ' . $this->remarks
            ));
        }

        $this->dispatch('show-alert', [
            'title' => 'Revision Returned',
            'text' => 'The entry has been successfully sent back for revisions.',
            'icon' => 'success',
        ]);


        // Redirect to the submissions page
        return $this->redirect(url: url(route('admin.submissions')), navigate: true);
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
        $user = $this->entry->user;

        if ($user) {
            // Sends an email notification to the user
            Mail::to($user->email)->queue(
                new PdsEntryStatusMail(
                    $user,
                    SubmissionStatus::APPROVED->value,
                    $this->remarks,
                    $this->entry
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
