<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    protected $table = 'orders_detail';

    protected $fillable = [
        'orders_id', 'product_id', 'price', 'amount',
    ];

    public function orders() {
        return $this->belongsTo(Orders::class, 'orders_id');
    }
}
