<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'code', 'user_id', 'name', 'email', 'phone', 'address', 'note', 'ship_fee', 'total', 'status', 'method', 'paid_flg', 'evidence_img',
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
            'value' => 0,
            'allow' => [
                'CONFIRMED' => [
                    'key' => 'Đã xác nhận',
                    'value' => 1
                ],
                'REJECT' => [
                    'key' => 'Hủy đơn',
                    'value' => 5
                ],
            ],
        ],
        'CONFIRMED' => [
            'key' => 'Đã xác nhận',
            'value' => 1,
            'allow' => [
                'SHIPPING' => [
                    'key' => 'Đang giao hàng',
                    'value' => 2
                ],
                'REJECT' => [
                    'key' => 'Hủy đơn',
                    'value' => 5
                ],
            ],
        ],
        'SHIPPING' => [
            'key' => 'Đang giao hàng',
            'value' => 2,
            'allow' => [
                'RECEIVED' => [
                    'key' => 'Đã nhận hàng',
                    'value' => 3
                ],
                'REJECT' => [
                    'key' => 'Hủy đơn',
                    'value' => 5
                ],
            ],
        ],
        'RECEIVED' => [
            'key' => 'Đã nhận hàng',
            'value' => 3,
            'allow' => [
                'DONE' => [
                    'key' => 'Hoàn thành',
                    'value' => 4
                ],
            ],
        ],
        'DONE' => [
            'key' => 'Hoàn thành',
            'value' => 4,
            'allow' => [],
        ],
        'REJECT' => [
            'key' => 'Hủy đơn',
            'value' => 5,
            'allow' => [],
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
