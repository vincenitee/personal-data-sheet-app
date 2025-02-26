<?php

namespace App\Enums;

enum TrainingTypes: string
{
    case MANAGERIAL = 'managerial';
    case SUPERVISORY = 'supervisory';
    case TECHNICAL = 'technical';
    case FOUNDATIONAL = 'foundational';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        return array_combine(
            array_column(self::cases(), 'value'),
            array_map(fn($case) => ucwords(str_replace('_', ' ', $case->value)), self::cases())
        );
    }
}
