<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\UserResource;
use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use App\Services\Auth\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    public function login(
        LoginRequest $loginRequest,
        LoginService $loginService
    ): JsonResponse {
        $data = $loginRequest->validated();
        $result = $loginService->run($data);

        return $this->successResponse([
            'user' => new UserResource($result['user']),
            'token' => $result['token'],
        ], 'Login realizado com sucesso');
    }

    public function logout(
        Request $request,
        LogoutService $logoutService
    ): JsonResponse {
        $data = $request->user();
        $logoutService->run($data);

        return $this->successResponse(null, 'Logout realizado com sucesso');
    }

    public function user(
        Request $request,
        UserService $userService
    ): UserResource {
        $data = $request->user();
        $user = $userService->run($data);

        return new UserResource($user);
    }
}
