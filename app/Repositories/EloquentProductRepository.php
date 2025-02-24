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

    public function store(array $data, string $imagePath)
    {
        return Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $imagePath,
            'category_id' => $data['category_id'],
            'price' => $data['price'],
            'restaurant_id' => $data['restaurant_id'],
        ]);
    }

    public function update(array $data, int $product_id)
    {
        $product = Product::find($product_id);
        $product->update($data);

        return $product;
    }

    public function delete(int $id)
    {
        return Product::destroy($id);
    }

    public function status(int $id)
    {
        $product = Product::find($id);
        $product->available = !$product->available;
        $product->save();

        return $product;
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
