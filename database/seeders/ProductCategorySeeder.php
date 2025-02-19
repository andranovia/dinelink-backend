<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productCategories = [];


        for ($productId = 1; $productId <= 10; $productId++) {

            $randomCategoryIds = range(1, 15);
            shuffle($randomCategoryIds);

            $numCategories = rand(1, 5);
            $selectedCategoryIds = array_slice($randomCategoryIds, 0, $numCategories);

            foreach ($selectedCategoryIds as $categoryId) {
                $productCategories[] = [
                    'product_id' => $productId,
                    'category_id' => $categoryId,
                ];
            }
        }

        shuffle($productCategories);


        DB::table('category_product')->insert($productCategories);
    }
}
