<?php

namespace App\Helper;

use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;

class CartHelper {
    public $items = [];

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

        $this->items = session('cart') ? session('cart') : [];
    }

    public function add($user_id, $product_id) {
        $product = $this->productRepository->getBuilder()->where('id', $product_id)->first();
        $item = [
            'product_id' => $product_id,
            'price' => $product->price,
            'quantity' => 1,
        ];

        if (!empty($user_id)) {
            $item['user_id'] = $user_id;
            $cart = $this->cartRepository->getBuilder()->where('user_id', $user_id)->where('product_id', $product_id)->where('is_completed', 0)->first();
            if ($cart) {
                $this->cartRepository->update($cart, ['quantity' => $cart->quantity + 1]);
            } else {
                $cart = $this->cartRepository->create($item);
            }

            $carts = $this->cartRepository->getBuilder()->where('user_id', $user_id)->where('is_completed', 0)->get();
            foreach ($carts as $cart) {
                $this->items[$cart->product_id] = $cart;
            }
        } else {

        }

        session(['cart' => $this->items]);
    }
}
