<?php

namespace App\Repositories;

use App\Models\Restaurant;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Faker\Factory as Faker;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function create(array $data): User
    {
        return User::create($data);
    }

    public function createRestaurant(User $data)
    {
        $faker = Faker::create();

        return Restaurant::create([
            'name' => $data['name'] . "'s Restaurant",
            'user_id' => $data['id'],
            'email' => $data['email'],
            'code' => $faker->bothify('??##??'),
            'open' => false,
        ]);
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}
