<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    protected $cast = [
        'birth_date' => 'date',
    ];

    public function entry()
    {
        return $this->belongsTo(PdsEntry::class);
    }
}
