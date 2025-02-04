<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    // Creates new user
    public function store(array $userData): User
    {
        if (isset($userData['password']))
        {
            $userData['password'] = Hash::make($userData['password']);
        }

        return User::create($userData);
    }
}
