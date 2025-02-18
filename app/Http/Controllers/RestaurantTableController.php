<?php

namespace App\Http\Controllers;

use App\Services\RestaurantTableService;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class RestaurantTableController extends Controller
{

    protected $restaurantTableService;

    public function __construct(RestaurantTableService $restaurantTableService)
    {
        $this->restaurantTableService = $restaurantTableService;
    }

    public function getRestaurantTable(Request $request)
    {
        $restaurantTable = $this->restaurantTableService->getRestaurantTable($request->restaurant_id);

        return response()->json([
            'restaurant_table' => $restaurantTable
        ], 200);
    }

    public function getRestaurantTablesByUserId(Request $request)
    {
        $restaurantTable = $this->restaurantTableService->getRestaurantTablesByUserId($request->restaurant_id, $request->user_id);



        return response()->json([
            'restaurant_table' => $restaurantTable
        ], 200);
    }

    public function postRestaurantTable(Request $request)
    {

        $data = $request->only('floor', 'number', 'seats', 'is_active');
        $data['restaurant_id'] = $request->restaurant_id;

        if ($request->has('user_id')) {
            $data['user_id'] = $request->user_id;
        }

        $restaurantTable = $this->restaurantTableService->postRestaurantTable($data['restaurant_id'], $data);

        return response()->json([
            'restaurant_table' => $restaurantTable
        ], 200);
    }

    public function editUserRestaurantTable(Request $request)
    {
        $data = $request->only('id', 'floor', 'number', 'seats', 'is_active');
        $data['restaurant_id'] = $request->restaurant_id;
        $data['user_id'] = $request->user_id;

        $restaurantTable = $this->restaurantTableService->editUserRestaurantTable($data['restaurant_id'], $data['user_id'], $data);

        return response()->json([
            'restaurant_table' => $restaurantTable
        ], 200);
    }
}
