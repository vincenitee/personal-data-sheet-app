<?php

namespace App\Enums;

enum EducationalLevel: string
{
    case ELEMENTARY = 'elementary';
    case SECONDARY_LEVEL = 'secondary_level';
    case VOCATIONAL = 'vocational';
    case COLLEGE = 'college';
    case GRADUATE_STUDIES = 'graduate_studies';
}
