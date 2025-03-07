<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionLog extends Model
{
    public function submissionEntry(){
        return $this->belongsTo(Submission::class, 'submission_id');
    }
}
