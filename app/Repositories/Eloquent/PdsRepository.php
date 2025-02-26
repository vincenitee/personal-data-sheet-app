<?php

namespace App\Repositories\Eloquent;

use App\Models\PdsEntry;
use App\Repositories\Contracts\PdsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PdsRepository implements PdsRepositoryInterface
{
    public function all(): Collection
    {
        return PdsEntry::all();
    }

    public function create(array $data): PdsEntry
    {
        return PdsEntry::create($data);
    }

    public function update(array $data, int $id): bool
    {
        $entry = $this->find($id);

        if(!$entry) return false;

        return $entry->update($data);
    }

    public function delete(int $id): bool
    {
        $pdsEntry = PdsEntry::find($id);

        if ($pdsEntry) return $pdsEntry->delete();
        
        return false;
    }

    public function find(int $id): ?PdsEntry
    {
        return PdsEntry::find($id);
    }
}
