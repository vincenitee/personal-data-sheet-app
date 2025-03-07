<?php

namespace App\Traits;

trait HandlesStepNavigation
{
    protected function completeStep(int $step){
        $this->dispatch('step-completed', $step);
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Information saved successfully'
        ]);
    }

    protected function handleError(\Exception $e){
        $this->dispatch('notify', [
            'type' => 'error',
            'message' => 'Failed to save information: ' . $e->getMessage()
        ]);
    }
}
