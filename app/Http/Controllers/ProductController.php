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

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
        } else {
            $imagePath = null;
        }

        $product = $this->productService->store($data, $imagePath);

        return response()->json(
            $product,
            201
        );
    }

    public function update(Request $request, $product_id)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads', 'public');
        } else {
            $data['image'] = null;
        }
        $product = $this->productService->update($data, $product_id);

        return response()->json(
            $product,
            200
        );
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $product = $this->productService->delete($id);

        return response()->json(
            $product,
            200
        );
    }

    public function status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $product = $this->productService->status($id, $status);

        return response()->json(
            $product,
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
