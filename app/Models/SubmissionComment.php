<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionComment extends Model
{
    public function submission()
    {
        return $this->belongsTo(Submission::class, 'submission_id');
    }

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }
}
