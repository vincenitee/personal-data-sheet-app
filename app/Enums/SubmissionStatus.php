<?php

namespace App\Enums;

enum SubmissionStatus: string
{
    case DRAFT = 'draft';
    case APPROVED = 'approved';
    case UNDER_REVIEW = 'under_review';
    case NEEDS_REVISION = 'needs_revision';

    /**
     * Get an associative array for select components
     */
    public static function options(): array
    {
        return array_map(fn($case) => ['value' => $case->name, 'label' => $case->value], self::cases());
    }
}
