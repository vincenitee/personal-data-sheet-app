<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function entry(){
        return $this->belongsTo(PdsEntry::class, 'pds_entry_id');
    }
}
