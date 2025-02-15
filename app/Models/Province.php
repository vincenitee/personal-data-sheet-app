<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    // A province belongs to a region
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    // A province has many municipalities
    public function municipalities(): HasMany
    {
        return $this->hasMany(Municipality::class);
    }
}
