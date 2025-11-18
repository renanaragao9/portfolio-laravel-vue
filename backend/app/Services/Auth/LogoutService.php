<?php

namespace App\Services\Auth;

use App\Models\User;

class LogoutService
{
    public function run(User $user): bool
    {
        $user->currentAccessToken()->delete();

        return true;
    }
}
