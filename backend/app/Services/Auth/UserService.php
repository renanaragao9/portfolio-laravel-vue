<?php

namespace App\Services\Auth;

use App\Models\User;

class UserService
{
    public function run(User $user): User
    {
        return $user;
    }
}
