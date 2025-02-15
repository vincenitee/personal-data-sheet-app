<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PdsEntry extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function personalInformation()
    {
        return $this->hasOne(PersonalInformation::class);
    }

    public function parents()
    {
        return $this->hasOne(EmployeeParent::class);
    }

    public function spouse()
    {
        return $this->hasOne(Spouse::class);
    }

    public function children()
    {
        return $this->hasMany(Children::class);
    }

    public function educationalBackgrounds()
    {
        return $this->hasMany(EducationalBackground::class);
    }
}
