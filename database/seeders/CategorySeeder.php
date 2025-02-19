<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Seafood',
            ],
            [
                'name' => 'Steakhouse',
            ],
            [
                'name' => 'Italian',
            ],
            [
                'name' => 'Mexican',
            ],
            [
                'name' => 'Japanese',
            ],
            [
                'name' => 'Vegetarian',
            ],
            [
                'name' => 'Vegan',
            ],
            [
                'name' => 'Chinese',
            ],
            [
                'name' => 'Indian',
            ],
            [
                'name' => 'Thai',
            ],
            [
                'name' => 'French',
            ],
            [
                'name' => 'Greek',
            ],
            [
                'name' => 'Korean',
            ],
            [
                'name' => 'American',
            ],
            [
                'name' => 'Burger',
            ],
            [
                'name' => 'Pizza',
            ],
            [
                'name' => 'BBQ',
            ],
            [
                'name' => 'Sushi',
            ],
            [
                'name' => 'Cafe',
            ],
            [
                'name' => 'Dessert',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
