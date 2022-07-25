<?php

namespace App\Repositories;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class OrderRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\Order::class;

    public function getOrders($paginate) {
        $orders = $this->getBuilder();

        if (isset($_GET['paid_flg']) && $_GET['paid_flg'] != '') {
            $orders->where('paid_flg', $_GET['paid_flg']);
        }

        if (isset($_GET['status']) && $_GET['status'] != '') {
            $orders->where('status', $_GET['status']);
        }

        if (!empty($_GET['phone'])) {
            $orders->where('phone', 'LIKE', '%' . $_GET['phone'] . '%');
        }

        if (!empty($_GET['email'])) {
            $orders->where('email', 'LIKE', '%' . $_GET['email'] . '%');
        }

        return $orders->orderBy('id', 'DESC')->paginate($paginate);
    }
}
