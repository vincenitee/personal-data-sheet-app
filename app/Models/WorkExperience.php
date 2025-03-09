<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $casts = [
        'date_from' => 'date',
        'date_to' => 'date',
    ];
    public function entry(){
        return $this->belongsTo(PdsEntry::class);
    }
}
