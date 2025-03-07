<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PersonalInformation extends Model
{
    protected $casts = [
        'birth_date' => 'date',
    ];

    public function entry(): BelongsTo
    {
        return $this->belongsTo(PdsEntry::class, 'pds_entry_id');
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
