<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginService
{
    public function run(array $data): array
    {
        if (! Auth::attempt($data)) {
            throw ValidationException::withMessages([
                'email' => ['As credenciais fornecidas estão incorretas.'],
            ]);
        }

        $user = Auth::user();
        $token = $user->createToken('API Token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
