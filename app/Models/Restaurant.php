<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function tables()
    {
        return $this->hasMany(RestaurantTable::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
