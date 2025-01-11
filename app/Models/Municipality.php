<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Municipality extends Model
{
    public function province(): BelongsTo{
        return $this->belongsTo(Province::class);
    }

    public function barangays(): HasMany{
        return $this->hasMany(Barangay::class);
    }
}
