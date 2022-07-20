<?php

namespace App\Repositories;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class OrderDetailRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\OrderDetail::class;

    public function getTotalAmount($order_id) {
        $total = 0;
        $order_details = $this->getBuilder()->where('order_id', $order_id)->get();
        foreach ($order_details as $detail) {
            $total += $detail->price * $detail->quantity;
        }

        return $total;
    }
}
