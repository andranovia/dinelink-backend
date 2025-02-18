<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantTable extends Model
{
    protected $table = 'restaurant_tables';

    protected $fillable = [
        'floor',
        'number',
        'seats',
        'is_active',
        'restaurant_id',
        'user_id',
    ];


    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
