<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Repositories\CartRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    protected $productRepository;
    protected $cartRepository;
    protected $orderRepository;
    protected $orderDetailRepository;

    public function __construct(
        CartRepository $cartRepository,
        ProductRepository $productRepository,
        OrderRepository $orderRepository,
        OrderDetailRepository $orderDetailRepository
    ) {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
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

        if (Auth::check()) {
            $data_info['user_id'] = Auth::user()->id;
        }

        DB::beginTransaction();
        try {
            $order = $this->orderRepository->create($data_info);

            foreach ($data_cart as $detail) {
                $detail['order_id'] = $order->id;
                $this->orderDetailRepository->create($detail);
            }

            if (Auth::check()) {
                $carts = $this->cartRepository->getBuilder()->where('user_id', Auth::user()->id)->get();
                foreach ($carts as $cart) {
                    $this->cartRepository->delete($cart);
                }
            }

            session(['cart' => null]);
            session(['total_quantity' => 0]);
            session(['total_price' => 0]);

            DB::commit();
            return redirect()->route('client.thank');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' Line: ' . $e->getLine());
            return back();
        }
    }

    public function thank() {
        return view('client.cart.thank');
    }
}
