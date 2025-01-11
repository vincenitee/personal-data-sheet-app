<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
    
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function identifiers(): HasMany
    {
        return $this->hasMany(EmployeeIdentifier::class);
    }

    public function familyMembers(): HasMany
    {
        return $this->hasMany(FamilyMember::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function educationalBackgrounds(): HasMany
    {
        return $this->hasMany(EducationalBackground::class);
    }

    public function eligibilities(): HasMany
    {
        return $this->hasMany(CivilServiceEligibility::class);
    }

    public function workExperiences(): HasMany
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function voluntaryWorkExperiences(): HasMany
    {
        return $this->hasMany(VoluntaryWorkExperience::class);
    }

    public function trainings(): HasMany
    {
        return $this->hasMany(Training::class);
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function nonAcademicRecognitions(): HasMany
    {
        return $this->hasMany(NonAcademicRecognition::class);
    }

    public function memberships(): HasMany
    {
        return $this->hasMany(Membership::class);
    }

    public function questionnaire(): HasOne
    {
        return $this->hasOne(Questionnaire::class);
    }
}
