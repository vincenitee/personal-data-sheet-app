<?php

namespace App\Traits;

trait ManagesAlerts
{
    public function sendAlert(string $title, string $message, string $type = 'success'): void
    {
        $this->dispatch('alert', [
            'title' => $title,
            'message' => $message,
            'type' => $type
        ]);
    }

    public function notifySuccess(string $message): void
    {
        $this->dispatch('notify', [
            'message' => $message,
            'type' => 'success'
        ]);
    }

    public function notifyError(string $message): void
    {
        $this->dispatch('notify', [
            'message' => $message,
            'type' => 'error'
        ]);
    }
}
