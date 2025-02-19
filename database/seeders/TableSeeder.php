<?php

namespace Database\Seeders;

use App\Models\RestaurantTable;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            RestaurantTable::create([
                'floor' => 1,
                'is_active' => $faker->boolean,
                'restaurant_id' => 1,
                'number' => $i,
                'seats' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
