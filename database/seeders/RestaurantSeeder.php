<?php

namespace Database\Seeders;

use App\Models\restaurant;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        Restaurant::create([
            'name' => $faker->company,
            'code' => $faker->bothify('??##??'),
            'user_id' => 1,
            'email' => $faker->unique()->safeEmail,
            'img' => $faker->imageUrl(640, 480, 'restaurant'),
            'password' => bcrypt('password'),
            'phone_number' => $faker->phoneNumber,
            'rating' => $faker->numberBetween(1, 5),
            'address' => $faker->address,
            'logo' => $faker->imageUrl(100, 100, 'logo'),
            'open' => $faker->boolean,
        ]);
    }
}
