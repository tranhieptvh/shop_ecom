<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;

class DashboardController extends Controller
{
    protected $userRepository;
    protected $brandRepository;
    protected $productRepository;
    protected $orderRepository;

    public function __construct(
        UserRepository $userRepository,
        BrandRepository $brandRepository,
        ProductRepository $productRepository,
        OrderRepository $orderRepository
    ) {
        $this->userRepository = $userRepository;
        $this->brandRepository = $brandRepository;
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    public function index() {
        $count_user = $this->userRepository->getCountUser();
        $count_brand = $this->brandRepository->getCountBrand();
        $count_product = $this->productRepository->getCountProduct();
        $count_order = $this->orderRepository->getCountOrder();

        $best_sell_products = $this->productRepository->getBestSellProducts();
        $new_orders = $this->orderRepository->getNewOrder();

        return view('admin.dashboard.index')->with([
            'count_user' => $count_user,
            'count_brand' => $count_brand,
            'count_product' => $count_product,
            'count_order' => $count_order,
            'best_sell_products' => $best_sell_products,
            'new_orders' => $new_orders,
        ]);
    }
}
