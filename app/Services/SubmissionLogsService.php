<?php

namespace App\Services;

use Exception;
use App\Models\SubmissionLog;
use Illuminate\Support\Facades\DB;

class SubmissionLogsService
{
    /**
     * Creates a submission log entry
     * @param array $data
     * @return SubmissionLog|null
     */
    public function create(array $data): ?SubmissionLog
    {
        DB::beginTransaction();
        try {
            $submissionLog = SubmissionLog::create($data);

            DB::commit();

            return $submissionLog;
        } catch (\Throwable $e) {
            DB::rollBack();

            \Log::error('Failed to create submission log', ['error' => $e->getMessage()]);

            return null;
        }
    }
}
