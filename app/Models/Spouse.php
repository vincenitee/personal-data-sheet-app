<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Spouse extends Model
{
    public function familyMember(): BelongsTo
    {
        return $this->belongsTo(FamilyMember::class);
    }
}
