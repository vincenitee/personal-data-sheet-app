<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barangay extends Model
{
    public function municipality(): BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }
}
