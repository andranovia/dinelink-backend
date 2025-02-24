<?php

namespace App\Repositories;

use App\Models\Rating;
use App\Models\Restaurant;
use App\Repositories\Interfaces\RestaurantRepositoryInterface;

class EloquentRestaurantRepository implements RestaurantRepositoryInterface
{
    public function getAllRestaurants()
    {
        return Restaurant::all();
    }

    public function restaurantCategories(int $restaurantId)
    {
        return Restaurant::find($restaurantId)->categories()->get();
    }

    public function postRestaurantCategory(array $data)
    {
        return Restaurant::find($data['restaurant_id'])->categories()->create($data);
    }

    public function findByOwner(int $userId)
    {
        return Restaurant::where('user_id', $userId)->first();
    }

    public function editRestaurant(array $data, int $id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->update($data);

        return $restaurant;
    }

    public function findByCode(string $code)
    {
        return Restaurant::where('code', $code)->first();
    }

    public function rating(int $restaurantId)
    {
        $ratings = Restaurant::find($restaurantId)->ratings()->get();


        foreach ($ratings as $rating) {
            $rating->user;
        }

        return $ratings;
    }

    public function ratingToggle(int $ratingId, int $show)
    {
        $rating = Rating::find($ratingId);
        $rating->update(['show' => $show]);

        return $rating;
    }

    public function postRating(array $data)
    {
        return Restaurant::find($data['restaurant_id'])->ratings()->create($data);
    }

    public function restaurantStatus(int $restaurantId)
    {
        $restaurant = Restaurant::find($restaurantId);
        $restaurant->update(['open' => !$restaurant->open]);

        return $restaurant;
    }

    public function sales(int $restaurantId)
    {
        $restaurantData = Restaurant::find($restaurantId)->transactions()->get();

        $restaurantSalesData = [
            'total_sales' => 0,
            'total_orders' => 0,
            'total_customers' => 0,
            'last_month' => [
                'total_sales' => 0,
                'total_orders' => 0,
                'total_customers' => 0
            ],
            'monthly' => []
        ];

        $lastMonth = date('m', strtotime('-1 month'));

        foreach ($restaurantData as $transaction) {
            $restaurantSalesData['total_sales'] += $transaction->subtotal;
            $restaurantSalesData['total_orders'] += 1;
            $restaurantSalesData['total_customers'] += 1;

            $transactionMonth = date('Y-m', strtotime($transaction->created_at));

            if (!isset($restaurantSalesData['monthly'][$transactionMonth])) {
                $restaurantSalesData['monthly'][$transactionMonth] = [
                    'total_sales' => 0,
                    'total_orders' => 0,
                    'total_customers' => 0
                ];
            }

            $restaurantSalesData['monthly'][$transactionMonth]['total_sales'] += $transaction->subtotal;
            $restaurantSalesData['monthly'][$transactionMonth]['total_orders'] += 1;
            $restaurantSalesData['monthly'][$transactionMonth]['total_customers'] += 1;

            if (date('m', strtotime($transaction->created_at)) == $lastMonth) {
                $restaurantSalesData['last_month']['total_sales'] += $transaction->subtotal;
                $restaurantSalesData['last_month']['total_orders'] += 1;
                $restaurantSalesData['last_month']['total_customers'] += 1;
            }
        }

        return $restaurantSalesData;
    }
}
