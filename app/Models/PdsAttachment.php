<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PdsAttachment extends Model
{
    protected $casts = [
        'date_of_issuance' => 'date: Y-m-d'
    ];

    public function entry()
    {
        return $this->belongsTo(PdsEntry::class, 'pds_entry_id');
    }
}
