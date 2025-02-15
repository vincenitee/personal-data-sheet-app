<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    public function entry()
    {
        return $this->belongsTo(PdsEntry::class);
    }
}
