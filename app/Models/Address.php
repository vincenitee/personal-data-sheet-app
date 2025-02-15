<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    public function personalInformation(): BelongsTo
    {
        return $this->belongsTo(PersonalInformation::class);
    }
}
