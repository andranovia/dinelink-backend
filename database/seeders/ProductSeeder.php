<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'image' => $faker->imageUrl(640, 480, 'restaurant'),
                'price' => $faker->randomFloat(2, 1, 100),
                'available' => $faker->boolean,
                'restaurant_id' => 1,
            ]);
        }
    }
}
