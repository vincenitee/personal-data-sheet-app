<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PersonalInformation extends Model
{
    public function entry(): BelongsTo
    {
        return $this->belongsTo(PdsEntry::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function identifiers(): HasMany{
        return $this->hasMany(EmployeeIdentifier::class);
    }

    public function setAttribute($key, $value)
    {
        parent::setAttribute($key, $value === '' ? null : $value);
    }
}
