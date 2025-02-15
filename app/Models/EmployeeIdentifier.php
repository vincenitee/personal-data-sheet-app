<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeIdentifier extends Model
{
    public function personalInformation(): BelongsTo
    {
        return $this->belongsTo(PersonalInformation::class);
    }

    public function setAttribute($key, $value)
    {
        parent::setAttribute($key, $value === '' ? null : $value);
    }
}
