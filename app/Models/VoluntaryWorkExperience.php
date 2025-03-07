<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoluntaryWorkExperience extends Model
{
    protected $casts = [
        'date_from' => 'date',
        'date_to' => 'date',
    ];

    public function entry()
    {
        return $this->belongsTo(PdsEntry::class);
    }

    public function getOrgAddressAndNameAttribute()
    {
        return "{$this->organization_name}, {$this->organization_address}";
    }
}
