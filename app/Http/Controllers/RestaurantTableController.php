<?php

namespace App\Http\Controllers;

use App\Services\RestaurantTableService;
use Illuminate\Http\Request;

class RestaurantTableController extends Controller
{

    protected $restaurantTableService;

    public function __construct(RestaurantTableService $restaurantTableService)
    {
        $this->restaurantTableService = $restaurantTableService;
    }

    public function index(Request $request)
    {
        $restaurantTable = $this->restaurantTableService->index($request->restaurant_id);

        return response()->json([
            'restaurant_table' => $restaurantTable
        ], 200);
    }

    public function userTables(Request $request)
    {
        $restaurantTable = $this->restaurantTableService->userTables($request->restaurant_id, $request->user_id);



        return response()->json([
            'restaurant_table' => $restaurantTable
        ], 200);
    }

    public function getFloor(Request $request)
    {
        $restaurantFloor = $this->restaurantTableService->getFloor($request->restaurant_id);

        return response()->json([
            'restaurant_floor' => $restaurantFloor
        ], 200);
    }

    public function postFloor(Request $request)
    {

        $restaurantTable = $this->restaurantTableService->postFloor($request->restaurant_id, $request->number);

        return response()->json([
            'restaurant_table' => $restaurantTable
        ], 200);
    }

    public function deleteFloor(Request $request)
    {
        $restaurantTable = $this->restaurantTableService->deleteFloor($request->restaurant_id, $request->floor_id);

        return response()->json([
            'restaurant_table' => $restaurantTable
        ], 200);
    }

    public function editFloor(Request $request)
    {
        $restaurantTable = $this->restaurantTableService->editFloor($request->restaurant_id, $request->floor_id, $request->number);

        return response()->json([
            'restaurant_table' => $restaurantTable
        ], 200);
    }

    public function store(Request $request)
    {

        $data = $request->only('floor_id', 'number', 'seats', 'is_active');
        $data['restaurant_id'] = $request->restaurant_id;

        if ($request->has('user_id')) {
            $data['user_id'] = $request->user_id;
        }

        $restaurantTable = $this->restaurantTableService->store($data['restaurant_id'], $data);

        return response()->json([
            'restaurant_table' => $restaurantTable
        ], 200);
    }

    public function cancelUserTable(Request $request)
    {
        $restaurantTable = $this->restaurantTableService->cancelUserTable($request->restaurant_id, $request->user_id, $request->table_id);

        return response()->json([
            'restaurant_table' => $restaurantTable
        ], 200);
    }

    public function editTable(Request $request)
    {
        $data = $request->only('id', 'number', 'seats');
        $data['restaurant_id'] = $request->restaurant_id;

        $restaurantTable = $this->restaurantTableService->editTable($data['restaurant_id'], $data['id'], $data);

        return response()->json([
            'restaurant_table' => $restaurantTable
        ], 200);
    }

    public function updateUserTable(Request $request)
    {
        $data = $request->only('id', 'floor', 'number', 'seats', 'is_active', 'persons', 'notes');
        $data['restaurant_id'] = $request->restaurant_id;
        $data['user_id'] = $request->user_id;

        $restaurantTable = $this->restaurantTableService->updateUserTable($data['restaurant_id'], $data['user_id'], $data);

        return response()->json([
            'restaurant_table' => $restaurantTable
        ], 200);
    }
}
