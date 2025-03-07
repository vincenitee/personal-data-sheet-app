<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalQuestion extends Model
{
    protected $casts = [
        'criminal_charge_date' => 'date',
    ];
    public function entry()
    {
        return $this->belongsTo(PdsEntry::class);
    }

    public function referencePersons()
    {
        return $this->hasMany(ReferencePerson::class);
    }
}
