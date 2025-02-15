<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    public function entry()
    {
        return $this->belongsTo(PdsEntry::class);
    }
}
