<?php

namespace App\Helper;

use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;

class CartHelper {
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

    public function add($user_id, $product_id) {
        $items = [];
        $product = $this->productRepository->getBuilder()->where('id', $product_id)->first();
        $item = [
            'product_id' => $product_id,
            'price' => $product->price,
            'quantity' => 1,
        ];

        if (!empty($user_id)) {
            $item['user_id'] = $user_id;
            $cart = $this->cartRepository->getBuilder()->where('user_id', $user_id)->where('product_id', $product_id)->first();
            if ($cart) {
                $this->cartRepository->update($cart, ['quantity' => $cart->quantity + 1]);
            } else {
                $cart = $this->cartRepository->create($item);
            }

            $carts = $this->cartRepository->getBuilder()->where('user_id', $user_id)->get();
            foreach ($carts as $cart) {
                $items[$cart->product_id] = $cart;
            }
        } else {
            if (session('cart')) {
                $items = session('cart');
            }
            if (!empty($this->items[$product_id])) {
                $items[$product_id]['quantity'] = $this->items['product_id']['quantity'] + 1;
            } else {
                $items[] = $item;
            }
        }

        return $items;

//        session(['cart' => $this->items]);
    }
}
