<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Enums\UserStatus;
use Livewire\Attributes\On;
use App\Traits\SortableSearchable;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class ManageUsers extends Component
{
    use SortableSearchable, WithPagination;

    protected UserService $userService;

    public function boot(UserService $userService)
    {
        $this->userService = $userService;
    }

    #[Computed]
    public function users()
    {
        return User::where('status', UserStatus::APPROVED)
            ->where('id', '!=', Auth::id())
            ->whereHas('roles') // Ensures the user has at least one role
            ->where(function ($query) {
                $query->where('first_name', 'like', "%{$this->search}%")
                    ->orWhere('middle_name', 'like', "%{$this->search}%")
                    ->orWhere('last_name', 'like', "%{$this->search}%")
                    ->orWhere('sex', 'like', "%{$this->search}%")
                    ->orWhere('birth_date', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%")
                    ->orWhere('status', 'like', "%{$this->search}%");
            })
            ->orderBy('deactivated', 'asc')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);
    }

    #[On('toggle-user-status')]
    public function deactivateUser(int $userId, bool $currentStatus)
    {
        $updated = $this->userService->update($userId, ['deactivated' => !$currentStatus]);

        if ($updated) {
            $this->dispatch('show-toast', [
                'type' => 'success',
                'title' => "User #$userId status updated"
            ]);
        } else {
            $this->dispatch('show-toast', [
                'type' => 'error',
                'title' => "Failed to update User #$userId"
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.manage-users')
            ->extends('layouts.app')
            ->title('Manage Signups')
            ->section('content');
    }
}
