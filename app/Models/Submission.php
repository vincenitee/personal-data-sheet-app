<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public function entry()
    {
        return $this->belongsTo(PdsEntry::class, 'pds_entry_id');
    }

    public function comments()
    {
        return $this->hasMany(SubmissionComment::class, 'submission_id');
    }
}
