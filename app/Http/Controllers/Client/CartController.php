<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $productRepository;
    protected $cartRepository;

    public function __construct(
        CartRepository $cartRepository,
        ProductRepository $productRepository
    ) {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }

    public function index() {
        if (Auth::check()) {
            $carts = $this->cartRepository->getBuilder()->where('user_id', Auth::user()->id)->get()->toArray();
            session(['cart' => $carts]);
        } else {
            if (session('cart')) {
                $carts = session('cart');
            } else {
                $carts = null;
            }
        }

        if ($carts) {
            $total_price = 0;
            foreach ($carts as $key => $cart) {
                $product = $this->productRepository->getBuilder()->where('id', $cart['product_id'])->first();
                $cart['product'] = $product;
                $total_price += $cart['price'] * $cart['quantity'];
                $carts[$key] = $cart;
            }

            return view('client.cart.index')->with([
                'carts' => $carts,
                'total_price' => $total_price,

            ]);
        } else {
            return view('client.cart.index');
        }
    }

    public function checkout(CheckoutRequest $request) {
        $data_cart = session('cart');
        $data_info = $request->input();

        return view('client.cart.thank')->with([

        ]);
    }
}
