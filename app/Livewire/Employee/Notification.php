<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Notification extends Component
{
    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
        }
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
    }

    public function render()
    {
    return view('livewire.employee.notification', [
            'unreadNotifications' => Auth::user()->unreadNotifications,
            'readNotifications' => Auth::user()->readNotifications,
        ])
            ->extends('layouts.app')
            ->title('Notifications')
            ->section('content');
    }
}
