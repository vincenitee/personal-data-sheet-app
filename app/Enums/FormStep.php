<?php

namespace App\Enums;

enum FormStep: int
{
    case PERSONAL_INFORMATION = 1;
    case FAMILY_BACKGROUND = 2;
    case EDUCATIONAL_BACKGROUND = 3;
    case CIVIL_SERVICE_ELIGIBILITY = 4;
    case WORK_EXPERIENCE = 5;
    case VOLUNTARY_WORK = 6;
    case TRAINING = 7;
    case OTHER_INFORMATION = 8;
    case ADDITIONAL_QUESTION = 9;
    case ATTACHMENTS = 10;

    public function getTitle(): string
    {
        return match ($this) {
            self::PERSONAL_INFORMATION => 'Personal Information',
            self::FAMILY_BACKGROUND => 'Family Background',
            self::EDUCATIONAL_BACKGROUND => 'Educational Background',
            self::CIVIL_SERVICE_ELIGIBILITY => 'Civil Service Eligibility',
            self::WORK_EXPERIENCE => 'Work Experience',
            self::VOLUNTARY_WORK => 'Voluntary Work',
            self::TRAINING => 'Learning and Development',
            self::OTHER_INFORMATION => 'Other Information',
            self::ADDITIONAL_QUESTION => 'References',
            self::ATTACHMENTS => 'Attachments',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::PERSONAL_INFORMATION => 'bi-person',
            self::FAMILY_BACKGROUND => 'bi-people',
            self::EDUCATIONAL_BACKGROUND => 'bi-book',
            self::CIVIL_SERVICE_ELIGIBILITY => 'bi-award',
            self::WORK_EXPERIENCE => 'bi-briefcase',
            self::VOLUNTARY_WORK => 'bi-heart',
            self::TRAINING => 'bi-mortarboard',
            self::OTHER_INFORMATION => 'bi-info-circle',
            self::ADDITIONAL_QUESTION => 'bi-question-circle',
            self::ATTACHMENTS => 'bi-paperclip',
        };
    }

    public function getDescription(): string
    {
        return match ($this) {
            self::PERSONAL_INFORMATION => 'Provide your basic details, including full name, birthdate, address, and contact information.',
            self::FAMILY_BACKGROUND => 'Record essential details about your family members, including spouse, parents, and children.',
            self::EDUCATIONAL_BACKGROUND => 'Document your academic journey by providing details about your schools, degrees, and achievements across all education levels.',
            self::CIVIL_SERVICE_ELIGIBILITY => 'Record your civil service examinations and eligibility details, including ratings, examination dates, and relevant certifications.',
            self::WORK_EXPERIENCE => 'Detail your professional work history, including roles, responsibilities, and employment dates.',
            self::VOLUNTARY_WORK => 'List your voluntary service experiences, including the nature of work and the organizations you contributed to',
            self::TRAINING => 'Document training programs and development interventions you\'ve attended, including titles, dates, and sponsors.',
            self::OTHER_INFORMATION => 'Highlight your special skills, hobbies, non-academic achievements, and memberships in organizations.',
            self::ADDITIONAL_QUESTION => 'Provide responses to important questions, including legal disclosures and family-related information.',
            self::ATTACHMENTS => 'I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and complete statement...',
        };
    }
}
