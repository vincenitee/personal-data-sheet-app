<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    protected $cast = [
        'attendance_from' => 'date:m/d/Y',
        'attendance_to' => 'date:m/d/Y',
    ];

    public function entry()
    {
        return $this->belongsTo(PdsEntry::class, 'pds_entry_id');
    }

    public function setLevelUnitEarnedAttribute($value)
    {
        $this->attributes['level_unit_earned'] = $value === '' ? null : $value;
    }
}
