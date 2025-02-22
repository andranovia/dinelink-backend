<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class EloquentProductRepository implements ProductRepositoryInterface
{
    public function index(int $restaurantId)
    {
        $products = Product::where('restaurant_id', $restaurantId)->with('categories')->get();
        $productWithCategory = [];

        if (!$products) {
            return response()->json(['error' => 'Product not found'], 404);
        }




        foreach ($products as $product) {


            $productData = [
                "id" => $product->id,
                "restaurant_id" => $product->restaurant_id,
                "name" => $product->name,
                "description" => $product->description,
                "image" => $product->image,
                "category_id" => $product->category_id,
                "price" => $product->price,
                "available" => $product->available,
                "created_at" => $product->created_at,
                "updated_at" => $product->updated_at,
                "categories" => $product->categories,
            ];

            $productWithCategory[] = $productData;
        }

        return $productWithCategory;
    }

    public function byCategory(int $restaurantId, int $categoryId)
    {
        return Product::where('restaurant_id', $restaurantId)->where('category_id', $categoryId)->get();
    }

    public function categories(int $restaurantId)
    {
        return Product::where('restaurant_id', $restaurantId)->with('categories')->get();
    }
}
