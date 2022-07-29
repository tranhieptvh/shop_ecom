<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CartHelper;
use App\Http\Controllers\Controller;
use App\Repositories\CartRepository;
use App\Repositories\InfoRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;

class CartController extends Controller
{
    protected $productRepository;
    protected $cartRepository;
    protected $userRepository;
    protected $infoRepository;

    public function __construct(
        CartRepository $cartRepository,
        ProductRepository $productRepository,
        UserRepository $userRepository,
        InfoRepository $infoRepository

    ) {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
        $this->infoRepository = $infoRepository;
    }

    public function add(CartHelper $cart) {
        $user_id = $_REQUEST['user_id'];
        $product_id = $_REQUEST['product_id'];

        $items = $cart->add($user_id, $product_id);

        $total_quantity = $this->getTotalQuantity($items);
        $total_price = $this->getTotalPrice($items);

        session(['cart' => $items]);
        session(['total_quantity' => $total_quantity]);
        session(['total_price' => $total_price]);

        return response()->json([
            'cart' => $cart,
            'total_quantity' => $total_quantity,
            'total_price' => $total_price,
        ]);
    }

    public function update() {
        $cart_id = $_REQUEST['cart_id'];
        $cart_session_index = $_REQUEST['cart_session_index'];
        $quantity = $_REQUEST['quantity'];

        if ($cart_id) {
            $cart = $this->cartRepository->getBuilder()->where('id', $cart_id)->first();
            if ($cart) {
                $this->cartRepository->update($cart, ['quantity' => $quantity]);
            }

            $carts = $this->cartRepository->getBuilder()->where('user_id', $cart->user_id)->get()->toArray();
        } else {
            $carts = session('cart');
            $carts[$cart_session_index]['quantity'] = $quantity;
            $cart = $carts[$cart_session_index];
        }

        $info = $this->infoRepository->getInfoShop();

        $total_quantity = $this->getTotalQuantity($carts);
        $total_price = $this->getTotalPrice($carts);
        $vat = $total_price * $info->vat / 100;

        session(['cart' => $carts]);
        session(['total_quantity' => $total_quantity]);
        session(['total_price' => $total_price]);

        return response()->json([
            'cart' => $cart,
            'total_quantity' => $total_quantity,
            'total_price' => $total_price,
            'vat' => $vat,
        ]);
    }

    public function deleteCartItem() {
        $cart_id = $_REQUEST['cart_id'];
        $cart_session_index = $_REQUEST['cart_session_index'];

        if ($cart_id) {
            $cart = $this->cartRepository->getBuilder()->where('id', $cart_id)->first();
            $result = $this->cartRepository->delete($cart);

            $carts = $this->cartRepository->getBuilder()->where('user_id', $cart->user_id)->get()->toArray();
        } else {
            $carts = session('cart');
            unset($carts[$cart_session_index]);
            $result = true;
        }

        $info = $this->infoRepository->getInfoShop();

        $total_quantity = $this->getTotalQuantity($carts);
        $total_price = $this->getTotalPrice($carts);
        $vat = $total_price * $info->vat / 100;

        session(['cart' => $carts]);
        session(['total_quantity' => $total_quantity]);
        session(['total_price' => $total_price]);

        return response()->json([
            'result' => $result,
            'cart_index' => $cart_session_index,
            'total_quantity' => $total_quantity,
            'total_price' => $total_price,
            'vat' => $vat,
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
