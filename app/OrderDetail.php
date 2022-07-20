<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = [
        'order_id', 'product_id', 'price', 'quantity',
    ];

    public function order() {
        return $this->belongsTo(Order::class, 'orders_id');
    }
}
