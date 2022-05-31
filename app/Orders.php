<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'notes', 'orders_date', 'status',
    ];

    public function ordersDetail() {
        return $this->hasMany(OrdersDetail::class, 'orders_id');
    }
}
