<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $data);
    public function createRestaurant(User $data);
    public function findByEmail(string $email);
}
