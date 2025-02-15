<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipality extends Model
{
    // A municipality has belongs to one province
    public function province(): BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }

    // A municipality has many barangays
    public function barangays(): HasMany
    {
        return $this->hasMany(Barangay::class);
    }
}
