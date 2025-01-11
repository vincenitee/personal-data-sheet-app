<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    public function provinces(): HasMany{
        return $this->hasMany(Province::class);
    }
}
