<?php

namespace App\Http\Controllers\Api;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;

class CartController extends Controller
{
    protected $productRepository;
    protected $cartRepository;
    protected $userRepository;

    public function __construct(
        CartRepository $cartRepository,
        ProductRepository $productRepository,
        UserRepository $userRepository
    ) {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
    }

    public function add(CartHelper $cart) {
        $user_id = $_REQUEST['user_id'];
        $product_id = $_REQUEST['product_id'];

        $cart->add($user_id, $product_id);

        $total_quantity = $this->getTotalQuantity($cart->items);
        $total_price = $this->getTotalPrice($cart->items);

        session('total_quantity', $total_quantity);
        session('total_price', $total_price);

        return response()->json([
            'cart' => $cart,
            'total_quantity' => $total_quantity,
            'total_price' => $total_price,
        ]);
    }

    public function getTotalQuantity($items) {
        $quantity = 0;
        foreach ($items as $item) {
            $quantity += $item['quantity'];
        }
        return $quantity;
    }

    public function getTotalPrice($items) {
        $price = 0;
        foreach ($items as $item) {
            $price += $item['price'] * $item['quantity'];
        }

        return $price;
    }
}
