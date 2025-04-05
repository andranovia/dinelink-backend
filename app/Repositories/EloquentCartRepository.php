<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Interfaces\CartRepositoryInterface;

class EloquentCartRepository implements CartRepositoryInterface
{
    public function index(int $userId)
    {
        $cart = Cart::where('user_id', $userId)->get();

        foreach ($cart as $cartItem) {
            $cartItem->product = Product::find($cartItem->product_id);
        }

        return $cart;
    }



    public function store(int $userId, array $data)
    {
        $cart = Cart::where('user_id', $userId)->where('product_id', $data['product_id'])->first();

        if ($cart) {
            $cart->quantity += $data['quantity'];
            $cart->save();
            return $cart;
        }

        return Cart::create([
            'user_id' => $userId,
            'product_id' => $data['product_id'],
            'quantity' => $data['quantity'],
            'notes' => $data['notes'],
            'size' => $data['size'],
        ]);
    }

    public function update(int $userId, int $productId, array $data)
    {
        return Cart::where('user_id', $userId)->where('product_id', $productId)->update([
            'quantity' => $data['quantity'],
            'notes' => $data['notes'],
            'size' => $data['size'],
        ]);
    }

    public function destroy(int $userId, int $productId)
    {
        return Cart::where('user_id', $userId)->where('product_id', $productId)->delete();
    }
}
