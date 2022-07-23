<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'address', 'note', 'status', 'method', 'paid_flg', 'evidence_img',
    ];

    const METHOD = [
        'COD' => [
            'key' => 'COD',
            'value' => 0,
        ],
        'BANKING' => [
            'key' => 'Chuyển khoản ngân hàng',
            'value' => 1,
        ],
    ];

    const STATUS = [
        'CONFIRMING' => [
            'key' => 'Đang xác nhận',
            'value' => 0
        ],
        'CONFIRMED' => [
            'key' => 'Đã xác nhận',
            'value' => 1
        ],
        'SHIPPING' => [
            'key' => 'Đang giao hàng',
            'value' => 2
        ],
        'RECEIVED' => [
            'key' => 'Đã nhận hàng',
            'value' => 3
        ],
        'DONE' => [
            'key' => 'Hoàn thành',
            'value' => 4
        ],
        'REJECT' => [
            'key' => 'Hủy đơn',
            'value' => 5
        ],
    ];

    const PAYMENT = [
        'UNPAID' => [
            'key' => 'Chưa thanh toán',
            'value' => 0
        ],
        'PAID' => [
            'key' => 'Đã thanh toán',
            'value' => 1
        ],
    ];


    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

}
