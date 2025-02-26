<?php

namespace App\Enums;

enum GovernmentId: string
{
    case SSS = 'sss';
    case GSIS = 'gsis';
    case PHILHEALTH = 'philhealth';
    case POSTAL = 'postal';
    case DRIVER_LICENSE = 'driver_license';
    case PASSPORT = 'passport';
    case VOTERS = 'voters';
    case PRC = 'prc';
    case TAXPAYER = 'taxpayer';

    public function label(): string
    {
        return match ($this) {
            self::SSS => 'SSS (Social Security System)',
            self::GSIS => 'GSIS (Government Service Insurance System)',
            self::PHILHEALTH => 'PhilHealth',
            self::POSTAL => 'Postal ID',
            self::DRIVER_LICENSE => "Driver's License",
            self::PASSPORT => 'Passport',
            self::VOTERS => "Voter's ID",
            self::PRC => 'PRC (Professional Regulation Commission)',
            self::TAXPAYER => "Taxpayer's ID (TIN)",
        };
    }

    public static function options(): array
    {
        return array_combine(
            array_column(self::cases(), 'value'),
            array_map(fn($case) => strtoupper(str_replace('_', ' ', $case->value)), self::cases())
        );
    }}
