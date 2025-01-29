<?php

namespace App\Enums;

enum UserStatus: string
{
    case ACTIVE = 'approved';
    case REJECTED = 'rejected';
    case PENDING = 'pending';
}
