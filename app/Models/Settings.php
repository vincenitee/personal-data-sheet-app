<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::saved(function ($setting) {
            Cache::forget("setting_{$setting->key}");
        });
    }
}
