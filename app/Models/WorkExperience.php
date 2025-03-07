<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $casts = [
        'date_from' => 'date:m/d/Y',
        'date_to' => 'date:m/d/Y',
    ];
    public function entry(){
        return $this->belongsTo(PdsEntry::class);
    }
}
