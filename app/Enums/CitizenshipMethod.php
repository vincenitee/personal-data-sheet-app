<?php

namespace App\Enums;

enum CitizenshipMethod: string
{
    case BIRTH = 'birth';
    case NATURALIZATION = 'naturalization';

    public static function options(): array
    {
        return [
            self::BIRTH->value => 'Birth',
            self::NATURALIZATION->value => 'Naturalization',
        ];
    }
}
