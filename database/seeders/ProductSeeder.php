<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
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
            $randomCategoryId = $faker->numberBetween(1, 15);

            $product = Product::create([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'image' => 'https://plus.unsplash.com/premium_photo-1664472724753-0a4700e4137b?q=80&w=1780&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'price' => $faker->randomFloat(2, 1, 100),
                'available' => $faker->boolean,
                'restaurant_id' => 1,
                'category_id' => $randomCategoryId,
            ]);

            ProductCategory::create([
                'product_id' => $product->id,
                'category_id' => $randomCategoryId
            ]);
        }
    }
}
