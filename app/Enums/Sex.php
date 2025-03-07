<?php

namespace App\Enums;

enum Sex: string
{
    case MALE = 'male';
    case FEMALE = 'female';

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
        return [
            self::MALE->value => 'Male',
            self::FEMALE->value => 'Female',
        ];
    }

    /**
     * Convert a value to its corresponding enum case.
     *
     * @param string $value
     * @return self|null
     */
    public static function fromValue(string $value): ?self
    {
        return self::tryFrom($value);
    }
}
