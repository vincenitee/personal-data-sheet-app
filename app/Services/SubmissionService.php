<?php

namespace App\Services;

use App\Models\Submission;
use Illuminate\Support\Facades\Log;

class SubmissionService
{
    /**
     * Update the submission record.
     *
     * @param Submission $submission
     * @param array $data
     * @return bool
     */
    public function update(Submission $submission, array $data): bool
    {
        try {
            return $submission->update($data);
        } catch (\Exception $e) {
            Log::error('Failed to update submission: ' . $e->getMessage());
            return false;
        }
    }
}

