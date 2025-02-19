<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';


    protected $fillable = [
        'order_id',
        'items',
        'user_id',
        'restaurant_id',
        'status',
        'total',
        'payment_url',
        'subtotal',
        'tax',
    ];

    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
