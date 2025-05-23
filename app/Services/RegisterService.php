<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class RegisterService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(array $data): ?User
    {

        $existingUser = $this->userRepository->findByEmail($data['email']);

        if ($existingUser) {
            return null;
        }

        $data['password'] = bcrypt($data['password']);

        return $this->userRepository->create($data);
    }

    public function registerOwner(User $data)
    {
        return $this->userRepository->createRestaurant($data);
    }
}
