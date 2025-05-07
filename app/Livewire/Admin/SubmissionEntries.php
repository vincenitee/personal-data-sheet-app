<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\PdsEntry;
use Livewire\Attributes\On;
use App\Services\PdsService;
use Livewire\WithPagination;
use App\Enums\MunicipalOffice;
use App\Enums\SubmissionStatus;
use App\Mail\PdsEntryStatusMail;
use Livewire\Attributes\Computed;
use App\Traits\SortableSearchable;
use App\Services\SubmissionService;
use Illuminate\Support\Facades\Mail;
use App\Notifications\PdsStatusNotification;

class SubmissionEntries extends Component
{
    use SortableSearchable, WithPagination;

    // Filter properties
    public $statusFilter = '';
    public $dateFrom = '';
    public $dateTo = '';
    public $departmentFilter = '';

    protected PdsService $pdsService;
    protected SubmissionService $submissionService;

    public function boot(PdsService $pdsService, SubmissionService $submissionService)
    {
        $this->pdsService = $pdsService;
        $this->submissionService = $submissionService;
    }

    // Reset filters when component initializes
    public function mount()
    {
        $this->sortField = 'created_at';
        $this->sortDirection = 'desc';
    }

    // Reset date range filter
    public function resetDateFilter()
    {
        $this->dateFrom = '';
        $this->dateTo = '';
    }

    // Apply date filter (method exists for UX purposes)
    public function applyDateFilter()
    {
        // The actual filtering happens via the wire:model bindings
    }

    // Reset all filters
    public function resetAllFilters()
    {
        $this->statusFilter = '';
        $this->dateFrom = '';
        $this->dateTo = '';
        $this->departmentFilter = '';
        $this->search = '';
        $this->resetPage();
    }

    #[Computed]
    public function pdsEntries()
    {
        return PdsEntry::where('pds_entries.status', '!=', 'draft') // Explicitly reference status
            ->with(['user', 'attachment'])
            ->leftJoin('users', 'pds_entries.user_id', '=', 'users.id')
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('users.first_name', 'like', "%{$this->search}%")
                        ->orWhere('users.middle_name', 'like', "%{$this->search}%")
                        ->orWhere('users.last_name', 'like', "%{$this->search}%");
                });
            })
            ->when($this->statusFilter, function ($query) {
                $query->where('pds_entries.status', $this->statusFilter); // Explicit reference
            })
            ->when($this->dateFrom, function ($query) {
                $query->whereDate('pds_entries.created_at', '>=', $this->dateFrom);
            })
            ->when($this->dateTo, function ($query) {
                $query->whereDate('pds_entries.created_at', '<=', $this->dateTo);
            })
            ->when(!$this->statusFilter, function ($query) {
                $query->orderByRaw("
                CASE
                    WHEN pds_entries.status = 'under_review' THEN 1
                    ELSE 2
                END
            ");
            })
            ->orderBy("users.{$this->sortField}", $this->sortDirection) // Sorting by user field
            ->select('pds_entries.*') // Ensure only PdsEntry fields are selected
            ->paginate(10);
    }

    public function getValue($value)
    {
        return MunicipalOffice::getValue($value);
    }

    public function getUserFullName($user)
    {
        return "{$user->first_name} {$user->middle_name} {$user->last_name}";
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
        return $this->resetPage();
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
        return $this->resetPage();
    }
    // #[Computed]
    // public function departments()
    // {
    //     return Department::orderBy('name')->get();
    // }

    public function render()
    {
        return view('livewire.admin.submission-entries')
            ->extends('layouts.app')
            ->title('Submission Entries')
            ->section('content');
    }
}
