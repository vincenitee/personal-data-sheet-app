<?php

namespace App\Enums;

enum CivilStatus: string
{
    case SINGLE = 'single';
    case MARRIED = 'married';
    case WIDOWED = 'widowed';
    case SEPARATED = 'separated';

    public static function options(): array
    {
        return [
            self::SINGLE->value => 'Single',
            self::MARRIED->value => 'Married',
            self::WIDOWED->value => 'Widowed',
            self::SEPARATED->value => 'Separated',
        ];
    }
}
