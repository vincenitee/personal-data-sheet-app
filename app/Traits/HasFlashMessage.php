<?php

namespace App\Traits;

trait HasFlashMessage
{
    protected function flashMessage($message, $type = 'success'){
        session()->flash('flash', [
            'status' => $type,
            'message' => $message
        ]);
    }
}
