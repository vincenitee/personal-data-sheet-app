<?php

namespace App\Services;

use App\Models\Submission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubmissionService
{

    /**
     * Create the submission record.
     *
     * @param Submission $submission
     * @param array $data
     * @return Submission|null
     */
    public function create(array $data): ?Submission
    {
        DB::beginTransaction();
        try {
            $submission = Submission::create($data);

            DB::commit();

            return $submission;
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Failed to update submission: ' . $e->getMessage());

            return null;
        }
    }
    
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

