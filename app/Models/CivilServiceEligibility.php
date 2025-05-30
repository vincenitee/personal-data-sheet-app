<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CivilServiceEligibility extends Model
{
    protected $casts = [
        'exam_date' => 'date:Y-m-d',
        'license_validity' => 'date:Y-m-d',
    ];

    public function setLicenseValidityAttribute($value)
    {
        $this->attributes['license_validity'] = $value ?: null; // Convert empty string to NULL
    }

    public function entry()
    {
        return $this->belongsTo(PdsEntry::class, 'pds_entry_id');
    }
}
