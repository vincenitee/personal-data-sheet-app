<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CivilServiceEligibility extends Model
{
    protected $casts = [
        'exam_date' => 'date',
        'license_validity' => 'date',
    ];
    
    public function entry()
    {
        return $this->belongsTo(PdsEntry::class);
    }
}
