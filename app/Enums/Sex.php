<?php

namespace App\Enums;

enum Sex: string
{
    case MALE = 'male';
    case FEMALE = 'female';

    public static function options(): array
    {
        return [
            self::MALE->value => 'Male',
            self::FEMALE->value => 'Female',
        ];
    }
}

