<?php

namespace App\Services;

use App\Enums\SubmissionStatus;
use App\Repositories\Contracts\PdsRepositoryInterface;
use App\Repositories\Eloquent\PdsRepository;

class PdsService
{
    protected $pdsRepository;

    public function __construct(
        PdsRepository $pdsRepository
    ) {
        $this->pdsRepository = $pdsRepository;
    }

    public function updateStatus(int $id, SubmissionStatus $status){
        return $this->pdsRepository->update(['status' => $status->value], $id);
    }
}
