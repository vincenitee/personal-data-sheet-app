<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoluntaryWorkExperience extends Model
{
    protected $casts = [
        'date_from' => 'date:Y-m-d',
        'date_to' => 'date:Y-m-d',
    ];

    public function entry()
    {
        return $this->belongsTo(PdsEntry::class, 'pds_entry_id');
    }

    public function getOrgAddressAndNameAttribute()
    {
        return "{$this->organization_name}, {$this->organization_address}";
    }
}
