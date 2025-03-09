<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;

class PdsStatusNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $status;
    protected $message;

    /**
     * Create a new notification instance.
     */
    public function __construct($status, $message)
    {
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['database']; // Send notification via email and store in the database
    }

    /**
     * Store the notification in the database.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
            'created_at' => now(),
        ];
    }
}
