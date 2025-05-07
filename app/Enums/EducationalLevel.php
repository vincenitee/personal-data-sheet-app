<?php

namespace App\Enums;

enum EducationalLevel: string
{
    case ELEMENTARY = 'elementary';
    case SECONDARY_LEVEL = 'secondary_level';
    case VOCATIONAL = 'vocational';
    case COLLEGE = 'college';
    case GRADUATE_STUDIES = 'graduate_studies';

    /**
     * Get an associative array for select components
     */
    public static function options(): array
    {
        return array_map(fn($case) => ['value' => $case->name, 'label' => $case->value], self::cases());
    }
}
