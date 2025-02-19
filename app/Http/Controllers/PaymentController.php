<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function getCheckout(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_KEY'));

        try {
            $session = Session::retrieve($request->sessionId);
            if ($session) {
                $paymentIntent = PaymentIntent::retrieve($session->payment_intent);
                $paymentMethod = PaymentMethod::retrieve($paymentIntent->payment_method);

                $cardInfo = $paymentMethod->card;
                $lineItems = Session::allLineItems($request->sessionId);
                $purchasedProducts = [];

                foreach ($lineItems->data as $item) {
                    $purchasedProducts[] = [
                        'name' => $item->description,
                        'amount' => $item->amount_total,
                        'currency' => $item->currency,
                        'quantity' => $item->quantity,
                    ];
                }


                return response()->json([
                    'sessionId' => $session->id,
                    'customer_details' => $session->customer_details,
                    'cardInfo' => $cardInfo,
                    'purchasedProducts' =>  $purchasedProducts,
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function postCheckout(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_KEY'));

        $purchased_products_array = [];

        foreach ($request->input('purchased_products') as $purchased_product) {
            $purchased_products_array[] = [
                'name' => $purchased_product['name'],
                'amount' => $purchased_product['amount'],
                'item_price' => $purchased_product['item_price']
            ];
        }

        $line_items = [];
        foreach ($purchased_products_array as $product) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product['name'],
                    ],
                    'unit_amount' => $product['item_price'] * 100,
                ],
                'quantity' => $product['amount'],
            ];
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => env('FRONTEND_URL') . '/payment/{CHECKOUT_SESSION_ID}',
            'cancel_url' => env('FRONTEND_URL') . $request->current_url,
        ]);

        return response()->json(['url' => $session->url]);
    }
}
