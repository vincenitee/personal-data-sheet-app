<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case EMPLOYEE = 'employee';

    /**
     * Get an associative array of enum values with labels.
     *
     * @return array
     */
    public static function labels()
    {
        return [
            self::ADMIN->value => 'Admin',
            self::EMPLOYEE->value => 'Employee',
        ];
    }

    /**
     * Convert a string value to the corresponding UserRole enum case.
     *
     * @param string $value
     * @return UserRole|null
     */
    public static function fromValue(string $value): ?self
    {
        return self::tryFrom($value);
    }
}
