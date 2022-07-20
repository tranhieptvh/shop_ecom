<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderRepository;
    protected $orderDetailRepository;

    public function __construct(
        OrderRepository $orderRepository,
        OrderDetailRepository $orderDetailRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function index() {
        $orders = $this->orderRepository->getBuilder()->orderBy('id', 'DESC')->paginate(10);

        foreach ($orders as $order) {
            $order->total_amount = $this->orderDetailRepository->getTotalAmount($order->id);
        }

        return view('admin.order.index')->with([
            'orders' => $orders,
        ]);
    }

    public function view($id) {

    }
}
