<?php

namespace App\Livewire\Admin;

use App\Enums\UserStatus;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\HasFlashMessage;
use Livewire\Attributes\Computed;

class ManageSignup extends Component
{
    use HasFlashMessage, WithPagination;

    public string $search = ''; // Store the search input
    public string $sortField = 'created_at'; // Default sorting field
    public string $sortDirection = 'desc'; // Default sorting direction
    protected $paginationTheme = 'bootstrap'; // Use Bootstrap pagination

    #[Computed]
    public function users()
    {
        return User::where('status', 'pending')
            ->where(function ($query) {
                $query->where('first_name', 'like', "%{$this->search}%")
                    ->orWhere('last_name', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%");
            })
            ->orderBy($this->sortField, $this->sortDirection) // Apply sorting
            ->paginate(10);
    }

    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination when searching
    }

    public function approveUser($userId)
    {
        $this->updateStatus($userId, UserStatus::APPROVED->value);
    }

    public function rejectUser($userId)
    {
        $this->updateStatus($userId, UserStatus::REJECTED->value);
    }

    public function updateStatus(int $userId, string $status)
    {
        $user = User::findOrFail($userId);
        $user->update(['status' => $status]);

        $user->assignRole('employee');

        $this->dispatch('signup-processed', $status);

        if ($status === 'approved') {
            $this->flashMessage('Signup request has been approved!');
            return;
        }

        $this->flashMessage('Signup request has been rejected!');
    }

    public function sortBy($field)
    {
        // Toggle sort direction if the same field is clicked
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc'; // Default to ascending when switching fields
        }
    }

    public function render()
    {
        return view('livewire.admin.manage-signup')
            ->extends('layouts.app')
            ->title('Manage Signups')
            ->section('content');
    }
}
