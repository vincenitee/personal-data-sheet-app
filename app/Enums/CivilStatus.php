<?php

namespace App\Enums;

enum CivilStatus: string
{
    case SINGLE = 'single';
    case MARRIED = 'married';
    case WIDOWED = 'widowed';
    case SEPARATED = 'separated';


    /**
     * Get an array of enum values.
     *
     * @return array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get an associative array of enum values with labels.
     *
     * @return array
     */
    public static function labels(): array
    {
        return array_combine(
            array_map(fn(self $case) => $case->value, self::cases()), // Extract values
            array_map(fn(self $case) => ucfirst($case->value), self::cases()) // Format labels
        );
    }
}
