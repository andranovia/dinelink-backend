<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getProducts(Request $request)
    {

        $restaurantId = $request->restaurantId;
        $products = $this->productService->getProducts($restaurantId);

        return response()->json(
            $products,
            200
        );
    }

    public function getFilteredProducts(Request $request)
    {
        $restaurantId = $request->restaurant_id;
        $categoryId = $request->category_id;
        $products = $this->productService->getProductByCategory($restaurantId, $categoryId);

        return response()->json(
            $products,
            200
        );
    }

    public function getAllProductCategories(Request $request)
    {
        $restaurantId = $request->restaurantId;
        $products = $this->productService->getAllProductCategories($restaurantId);
        $categoryData = [];

        foreach ($products as $product) {
            foreach ($product->categories as $category) {
                $categoryData[$category->id] = $category;
            }
        }

        return response()->json(
            array_values($categoryData),
            200
        );
    }
}
