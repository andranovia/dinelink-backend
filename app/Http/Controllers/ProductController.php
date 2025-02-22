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

    public function index(Request $request)
    {

        $restaurantId = $request->restaurantId;
        $products = $this->productService->index($restaurantId);

        return response()->json(
            $products,
            200
        );
    }

    public function byCategory(Request $request)
    {
        $restaurantId = $request->restaurant_id;
        $categoryId = $request->category_id;
        $products = $this->productService->byCategory($restaurantId, $categoryId);

        return response()->json(
            $products,
            200
        );
    }

    public function categories(Request $request)
    {
        $restaurantId = $request->restaurantId;
        $products = $this->productService->categories($restaurantId);
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
