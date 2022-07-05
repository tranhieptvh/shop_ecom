<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
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
            $carts = $this->cartRepository->getBuilder()->where('user_id', Auth::user()->id)->where('is_completed', 0)->get();
        } else {
            if (session('cart')) {
                $carts = session('cart');
            } else {
                $carts = null;
            }
        }

        $total_price = 0;
        foreach ($carts as $cart) {
            $total_price += $cart->price * $cart->quantity;
        }

        return view('client.cart.index')->with([
            'carts' => $carts,
            'total_price' => $total_price,

        ]);
    }
}
