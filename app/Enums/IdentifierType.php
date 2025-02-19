<?php

namespace App\Enums;

enum IdentifierType: string
{
    case GSIS = 'gsis';
    case SSS = 'sss';
    case TIN = 'tin';
    case PAGIBIG = 'pagibig';
    case PHILHEALTH = 'philhealth';
    case AGENCY = 'agency';
}
