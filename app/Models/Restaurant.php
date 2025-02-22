<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $fillable = [
        'name',
        'user_id',
        'email',
        'code',
        'open',
        'img',
        'phone_number',
        'rating',
        'address',
        'logo',
    ];

    public function tables()
    {
        return $this->hasMany(RestaurantTable::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
