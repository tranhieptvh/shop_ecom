<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'address', 'notes', 'status', 'method',
    ];

    const METHOD_COD = 0;
    const METHOD_BANKING = 1;

    const STATUS_CONFIRMING = 0;
    const STATUS_CONFIRMED = 1;
    const STATUS_SHIPPING = 2;
    const STATUS_RECEIVED = 3;
    const STATUS_DONE = 4;

    const PAYMENT_UNPAID = 0;
    const PAYMENT_PAID = 1;

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'orders_id');
    }

}
