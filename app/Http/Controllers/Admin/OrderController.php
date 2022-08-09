<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\InfoRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    protected $orderRepository;
    protected $orderDetailRepository;
    protected $infoRepository;

    public function __construct(
        OrderRepository $orderRepository,
        OrderDetailRepository $orderDetailRepository,
        InfoRepository $infoRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->infoRepository = $infoRepository;
    }

    public function index() {
        $orders = $this->orderRepository->getOrders(12);

//        foreach ($orders as $order) {
//            $order->total_amount = $this->orderDetailRepository->getTotalAmount($order->id);
//        }

        return view('admin.order.index')->with([
            'orders' => $orders,
        ]);
    }

    public function view($code) {
        $order = $this->orderRepository->getOrderByCode($code);
//        $order->total_amount = $this->orderDetailRepository->getTotalAmount($id);

        return view('admin.order.view')->with([
            'order' => $order,
        ]);
    }

    public function update(Request $request, $id) {
        $order_data = $request->input();

        DB::beginTransaction();
        try {
            $order = $this->orderRepository->find($id);
            if ($request->hasFile('evidence_img')) {
                $file = $request->evidence_img;
                $order_data['evidence_img'] = handleImage($file, 'order');

                if (isset($order->evidence_img) && file_exists($order->evidence_img)) {
                    unlink($order->evidence_img);
                }
            }
            $result = $this->orderRepository->update($order, $order_data);

            DB::commit();

            return back()->with('success', 'Cập nhật đơn hàng thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' Line: ' . $e->getLine());
            return back();
        }
    }

    public function exportOrder($code) {
        $order = $this->orderRepository->getOrderByCode($code);
        $order->total_amount = $this->orderDetailRepository->getTotalAmount($order->id);

        $info = $this->infoRepository->getInfoShop();

        $data = [];
        $data['order'] = $order;
        $data['order_details'] = $order->orderDetails;
        $data['info'] = $info;

        $pdf = PDF::loadView('pdf.order', compact('data'));
        return $pdf->download($order->code . '_' . $order->name . '.pdf');
    }
}
