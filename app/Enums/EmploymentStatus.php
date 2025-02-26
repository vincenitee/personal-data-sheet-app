<?php

namespace App\Enums;

enum EmploymentStatus: string
{
    case PERMANENT = 'permanent';
    case CONTRACTUAL = 'contractual';
    case CASUAL = 'casual';
    case CONTRACT_OF_SERVICE = 'contract_of_service';
    case TEMPORARY = 'temporary';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        return array_combine(
            array_column(self::cases(), 'value'),
            array_map(fn($case) => ucfirst(str_replace('_', ' ', $case->value)), self::cases())
        );
    }
}
