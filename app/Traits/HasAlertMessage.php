<?php

namespace App\Traits;

trait HasAlertMessage
{
    public function dispatchAlertMessage(
        $title = null, $message = null, $icon = null
    ){
        $this->dispatch('show-alert', [
            'title' => $title ?? 'Good Job',
            'text' => $message ?? 'You clicked the button!',
            'icon' => $icon ?? 'success',
        ]);
    }
}
