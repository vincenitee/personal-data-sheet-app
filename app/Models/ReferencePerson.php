<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferencePerson extends Model
{
    public function question()
    {
        return $this->belongsTo(AdditionalQuestion::class);
    }
}
