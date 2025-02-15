<?php

namespace App\Enums;

enum Citizenship: string
{
    case FILIPINO = 'filipino';
    case DUAL = 'dual';

    public static function options(): array
    {
        return [
            self::FILIPINO->value => 'Filipino',
            self::DUAL->value => 'Dual',
        ];
    }
}
