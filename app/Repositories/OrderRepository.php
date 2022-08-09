<?php

namespace App\Repositories;

use Illuminate\Support\Str;
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

        if (!empty($_GET['code'])) {
            $orders->where('code', 'LIKE', '%' . $_GET['code'] . '%');
        }

        if (!empty($_GET['phone'])) {
            $orders->where('phone', 'LIKE', '%' . $_GET['phone'] . '%');
        }

        if (!empty($_GET['email'])) {
            $orders->where('email', 'LIKE', '%' . $_GET['email'] . '%');
        }

        return $orders->orderBy('id', 'DESC')->paginate($paginate);
    }

    public function generateUniqueCode() {
        $code = Str::random(8);

        if ($this->checkExistsCode($code)) {
            return $this->generateUniqueCode();
        }

        return $code;
    }

    public function checkExistsCode($code) {
        $count = $this->getBuilder()->where('code', $code)->get()->count();

        if ($count > 0) {
            return true;
        }
        return false;
    }

    public function getOrderByCode($code) {
        return $this->getBuilder()->where('code', $code)->first();
    }
}
