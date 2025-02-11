<?php

namespace App\Services;

use Laravel\Sanctum\PersonalAccessToken;
use App\Repositories\Interfaces\UserRepositoryInterface;

class RefreshTokenService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function refreshToken(string $refreshToken): ?array
    {
        $token = PersonalAccessToken::findToken($refreshToken);

        if (!$token || !$token->can('refresh')) {
            return null;
        }

        $user = $token->tokenable;

        $token->delete();

        $newAccessToken = $user->createToken('auth_token')->plainTextToken;
        $newRefreshToken = $user->createToken('refresh_token', ['refresh'])->plainTextToken;

        return [
            'access_token' => $newAccessToken,
            'refresh_token' => $newRefreshToken,
        ];
    }
}
