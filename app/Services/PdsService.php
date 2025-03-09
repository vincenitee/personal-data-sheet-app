<?php

namespace App\Services;

use Exception;
use App\Models\PdsEntry;
use App\Enums\SubmissionStatus;
use Illuminate\Support\Facades\Log;
use App\Repositories\Eloquent\PdsRepository;
use App\Repositories\Contracts\PdsRepositoryInterface;

class PdsService
{
    protected $pdsRepository;

    public function __construct(
        PdsRepository $pdsRepository
    ) {
        $this->pdsRepository = $pdsRepository;
    }

    public function updateStatus(int $id, SubmissionStatus $status)
    {
        return $this->pdsRepository->update(['status' => $status->value], $id);
    }

    /**
     * Update the PDS entry by ID.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        try {
            $pdsEntry = PdsEntry::findOrFail($id); // Find the entry or throw an exception
            return $pdsEntry->update($data); // Update the entry with new data
        } catch (Exception $e) {
            Log::error("PDS Entry update failed: " . $e->getMessage()); // Log error for debugging
            return false;
        }
    }
}
