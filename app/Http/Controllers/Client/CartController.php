<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Repositories\CartRepository;
use App\Repositories\InfoRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use stdClass;

class CartController extends Controller
{
    protected $productRepository;
    protected $cartRepository;
    protected $orderRepository;
    protected $orderDetailRepository;
    protected $infoRepository;

    public function __construct(
        CartRepository $cartRepository,
        ProductRepository $productRepository,
        OrderRepository $orderRepository,
        OrderDetailRepository $orderDetailRepository,
        InfoRepository $infoRepository
    ) {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->infoRepository = $infoRepository;
    }

    public function index() {
        if (Auth::check()) {
            $carts = $this->cartRepository->getBuilder()->where('user_id', Auth::user()->id)->get()->toArray();
            session(['cart' => $carts]);

            $user = Auth::user();
        } else {
            if (session('cart')) {
                $carts = session('cart');
            } else {
                $carts = null;
            }

            $user = new StdClass();
            $user->name = '';
            $user->phone = '';
            $user->email = '';
            $user->address = '';
        }

        if ($carts) {
            $total_price = 0;
            foreach ($carts as $key => $cart) {
                $product = $this->productRepository->getBuilder()->where('id', $cart['product_id'])->first();
                $cart['product'] = $product;
                $total_price += $cart['price'] * $cart['quantity'];
                $carts[$key] = $cart;
            }

            $info = $this->infoRepository->getInfoShop();

            return view('client.cart.index')->with([
                'carts' => $carts,
                'total_price' => $total_price,
                'user' => $user,
                'info' => $info,
            ]);
        } else {
            return view('client.cart.index');
        }
    }

    public function checkout(CheckoutRequest $request) {
        $data_cart = session('cart');
        $data_info = $request->input();
        $data_info['code'] = $this->orderRepository->generateUniqueCode();
        $info = $this->infoRepository->getInfoShop();
        $data_info['total'] = $this->_calculateTotalOrder($data_cart, $info->vat);
        $data_info['ship_fee'] = $info->ship_fee;

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

            $order->total_amount = $this->orderDetailRepository->getTotalAmount($order->id);
            $view = 'emails.order';
            $data = [];
            $data['info'] = $info;
            $data['order'] = $order;
            $data['order_details'] = $order->orderDetails;
            $subject = 'Đặt hàng thành công!';
            $to = $order->email;
            sendmail($view, $data, $subject, $to);

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

    public function _calculateTotalOrder($carts, $vat) {
        $price = 0;
        foreach ($carts as $item) {
            $price += $item['price'] * $item['quantity'];
        }

        return $price + $price * $vat / 100;
    }
}
