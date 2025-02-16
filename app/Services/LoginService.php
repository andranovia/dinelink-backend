<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($credentials): array
    {
        if (Auth::attempt($credentials)) {
            $user = $this->userRepository->findByEmail($credentials['email']);
            $accessToken = $user->createToken('auth_token')->plainTextToken;
            // $refreshToken = $user->createToken('refresh_token', ['refresh'])->plainTextToken;

            return [
                'user' => $user,
                'token' => $accessToken,
            ];
        }

        return null;
    }
}
