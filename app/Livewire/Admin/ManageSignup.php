<?php

namespace App\Livewire\Admin;

use App\Enums\MunicipalOffice;
use App\Models\User;
use App\Enums\UserRole;
use Livewire\Component;
use App\Enums\UserStatus;
use App\Mail\SignupStatus;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Services\UserService;
use App\Traits\HasFlashMessage;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Mail;

class ManageSignup extends Component
{
    use HasFlashMessage, WithPagination;

    protected UserService $userService;

    public string $search = '';
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';
    protected $paginationTheme = 'bootstrap';

    public function boot(UserService $userService)
    {
        $this->userService = $userService;
    }

    #[Computed]
    public function users()
    {
        return User::where('status', UserStatus::PENDING)
            ->where(function ($query) {
                $query->where('first_name', 'like', "%{$this->search}%")
                    ->orWhere('last_name', 'like', "%{$this->search}%")
                    ->orWhere('sex', 'like', "%{$this->search}%")
                    ->orWhere('department', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%");
            })
            ->orderBy($this->sortField, $this->sortDirection) // Apply sorting
            ->paginate(10);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[On('signup-accepted')]
    public function approveUser($userId)
    {
        $approvedUser = $this->userService->updateStatus($userId, UserStatus::APPROVED);

        $this->userService->assignRole($approvedUser, UserRole::EMPLOYEE);

        Mail::to($approvedUser->email)->queue(new SignupStatus($approvedUser, UserStatus::APPROVED->value));

        $this->dispatch('show-toast', ['type' => 'success', 'title' => 'Signup request accepted']);
    }

    #[On('signup-rejected')]
    public function rejectUser($userId)
    {
        $this->userService->updateStatus($userId, UserStatus::REJECTED);

        $user = User::find($userId);

        Mail::to($user->email)->queue(new SignupStatus($user, UserStatus::REJECTED->value));

        $this->dispatch(
            'show-toast',
            [
                'type' => 'error',
                'title' => 'Signup request rejected'
            ]
        );
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

    public function getValue($value){
        return MunicipalOffice::getValue($value);
    }

    public function render()
    {
        return view('livewire.admin.manage-signup')
            ->extends('layouts.app')
            ->title('Manage Signups')
            ->section('content');
    }
}
