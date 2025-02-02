<?php

namespace App\Traits;

use Carbon\Carbon;

trait DateFormatter
{
    // For Database Insertion
    public function formatToYMD(string $date): string
    {
        return Carbon::createFromFormat('m-d-Y', $date)->format('Y-m-d');
    }

    // For Display
    public function formatToDMY(string $date): string
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('d-m-y');
    }
}
