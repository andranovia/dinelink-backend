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
}
