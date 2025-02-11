<?php

namespace App\Http\Controllers;

use App\Services\LoginService;
use App\Services\RefreshTokenService;
use App\Services\RegisterService;
use Illuminate\Http\Request;

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

        return response()->json([
            'user' => $user,
            'message' => 'User registered successfully'
        ], 201);
    }

    public function login(Request $request)
    {
        $token = $this->loginService->login($request->only('email', 'password'));

        if (!$token) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json(['token' => $token]);
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
}
