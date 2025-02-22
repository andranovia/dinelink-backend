<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct(protected CartService $cartService) {}


    public function index(Request $request)
    {
        if (!$request->has('user_id')) {
            return response()->json(
                [
                    'message' => 'User ID is required'
                ],
                400
            );
        }

        $userId = $request->user_id;
        $cart = $this->cartService->index($userId);

        return response()->json(
            [
                'cart' => $cart
            ],
            200
        );
    }

    public function store(Request $request)
    {
        $userId = $request->user_id;
        $data = $request->all();
        $cart = $this->cartService->store($userId, $data);

        return response()->json(
            $cart,
            201
        );
    }

    public function update(Request $request)
    {
        $userId = $request->user_id;
        $productId = $request->product_id;
        $data = $request->all();
        $cart = $this->cartService->update($userId, $productId, $data);

        return response()->json(
            $cart,
            200
        );
    }

    public function destroy(Request $request)
    {
        $userId = $request->user_id;
        $productId = $request->product_id;
        $cart = $this->cartService->destroy($userId, $productId);

        return response()->json(
            $cart,
            200
        );
    }
}
