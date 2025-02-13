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

        for ($i = 0; $i < 10; $i++) {
            Restaurant::create([
                'name' => $faker->company,
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
}
