<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CivilServiceEligibility extends Model
{
    public function entry(){
        return $this->belongsTo(PdsEntry::class);
    }
}
