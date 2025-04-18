<?php

namespace App\Http\Controllers;

use App\Services\LoginService;
use App\Services\RefreshTokenService;
use App\Services\RegisterService;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class AuthController extends Controller
{
    protected $registerService;
    protected $loginService;
    protected $refreshTokenService;

    public function __construct(RefreshTokenService $refreshTokenService, RegisterService $registerService, LoginService $loginService)
    {
        $this->registerService = $registerService;
        $this->loginService = $loginService;
        $this->refreshTokenService = $refreshTokenService;
    }


    public function register(Request $request)
    {
        $user = $this->registerService->register($request->all());

        if ($user->type === "owner") {
            $this->registerService->registerOwner($user);
        }

        if (empty($user)) {
            return response()->json(['message' => 'User already exists'], 409);
        }

        return response()->json([
            'user' => $user,
            'message' => 'User registered successfully'
        ], 201);
    }

    public function login(Request $request)
    {
        $authData = $this->loginService->login($request->only('email', 'password'));

        if (empty($authData)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json(['user' => $authData['user'], 'token' => $authData['token']]);
    }

    public function refresh(Request $request)
    {
        $refreshToken = $request->input('refresh_token');

        $tokens = $this->refreshTokenService->refreshToken($refreshToken);

        if (!$tokens) {
            return response()->json(['message' => 'Invalid refresh token'], 401);
        }

        return response()->json([
            'access_token' => $tokens['access_token'],
            'refresh_token' => $tokens['refresh_token'],
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
