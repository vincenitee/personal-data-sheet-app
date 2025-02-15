<?php

namespace App\Enums;

enum SubmissionStatus: string
{
    case DRAFT = 'draft';
    case APPROVED = 'approved';
    case UNDER_REVIEW = 'under_review';
    case NEEDS_REVISION = 'needs_revision';
}
