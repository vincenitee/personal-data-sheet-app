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
        return $this->hasMany(EmployeeParent::class);
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
        return $this->hasMany(EducationalBackground::class, 'pds_entry_id');
    }

    public function eligibilities()
    {
        return $this->hasMany(CivilServiceEligibility::class);
    }

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function volWorkExperiences()
    {
        return $this->hasMany(VoluntaryWorkExperience::class);
    }

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function recognitions()
    {
        return $this->hasMany(Recognition::class);
    }

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }

    public function question()
    {
        return $this->hasOne(AdditionalQuestion::class);
    }

    public function attachment()
    {
        return $this->hasOne(PdsAttachment::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
