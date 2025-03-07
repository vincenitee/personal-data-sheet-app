<?php

namespace App\Enums;

enum PdsSections: string
{
    case PERSONAL_INFORMATION = 'personal_information';
    case FAMILY_BACKGROUND = 'family_background';
    case EDUCATIONAL_BACKGROUND = 'educational_background';
    case CIVIL_SERVICE_ELIGIBILITY = 'civil_service_eligibility';
    case WORK_EXPERIENCE = 'work_experience';
    case VOLUNTARY_WORK = 'voluntary_work';
    case LEARNING_AND_DEVELOPMENT = 'learning_and_development';
    case OTHER_INFORMATION = 'other_information';
    case ADDITIONAL_QUESTIONS = 'additional_questions';
    case ATTACHMENTS = 'attachments';

    // Get all available sections as an array
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
