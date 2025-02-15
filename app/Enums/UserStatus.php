<?php

namespace App\Enums;

enum UserStatus: string
{
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case PENDING = 'pending';
}
