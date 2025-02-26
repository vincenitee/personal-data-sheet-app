<?php

namespace App\Repositories\Contracts;

use App\Models\PdsEntry;
use Illuminate\Database\Eloquent\Collection;

interface PdsRepositoryInterface
{
    public function all(): Collection;

    public function create(array $data): PdsEntry;

    public function update(array $data, int $id): bool;

    public function delete(int $id): bool;

    public function find(int $id): ?PdsEntry;
}
