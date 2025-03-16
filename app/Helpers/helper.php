<?php
use Illuminate\Support\Facades\Cache;
use App\Models\Settings;

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        return Cache::rememberForever("setting_{$key}", function () use ($key, $default) {
            return Settings::where('key', $key)->value('value') ?? $default;
        });
    }
}
