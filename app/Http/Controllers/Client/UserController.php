<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ClientUserUpdateRequest;
use App\Repositories\InfoRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $userRepository;
    protected $orderRepository;
    protected $orderDetailRepository;
    protected $infoRepository;

    public function __construct(
        UserRepository $userRepository,
        OrderRepository $orderRepository,
        OrderDetailRepository $orderDetailRepository,
        InfoRepository $infoRepository
    ) {
        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->infoRepository = $infoRepository;
    }

    public function profile() {
        if(Auth::check()) {
            $user = Auth::user();

            return view('client.user.profile')->with([
                'user' => $user,
            ]);
        }
        return redirect()->to('/');
    }

    public function update(ClientUserUpdateRequest $request, $id)
    {
        $user_data = $request->input();

        DB::beginTransaction();
        try {
            $user = $this->userRepository->find($id);
            if ($request->hasFile('avatar')) {
                $file = $request->avatar;
                $user_data['avatar'] = handleImage($file, 'user');

                if (isset($user->avatar) && file_exists($user->avatar)) {
                    unlink($user->avatar);
                }
            }
            $result = $this->userRepository->update($user, $user_data);

            DB::commit();

            return back()->with('success', 'Cập nhật thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' Line: ' . $e->getLine());
            return back();
        }
    }

    public function purchase() {
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $orders = $this->orderRepository->getBuilder()->where('user_id', $user_id)->orderBy('id', 'DESC')->get();
//            foreach ($orders as $order) {
//                $order->total_amount = $this->orderDetailRepository->getTotalAmount($order->id);
//            }

            return view('client.user.purchase')->with([
                'orders' => $orders,
            ]);
        }
        return redirect()->to('/');
    }

    public function orderDetail($code) {
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $order = $this->orderRepository->getOrderByCode($code);
            $order->total_amount = $this->orderDetailRepository->getTotalAmount($order->id);

            if (empty($order) || $order->user_id != $user_id) {
                $order = null;
            }

            $info = $this->infoRepository->getInfoShop();

            return view('client.user.order-detail')->with([
                'order' => $order,
                'info' => $info,
            ]);
        }
        return redirect()->to('/');
    }

    public function updateEvidence(Request $request, $id) {
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $order = $this->orderRepository->find($id);
            if ($order && $order->user_id == $user_id) {
                $order_data = [];
                if ($request->hasFile('evidence_img')) {
                    $file = $request->evidence_img;
                    $order_data['evidence_img'] = handleImage($file, 'order');

                    if (isset($order->evidence_img) && file_exists($order->evidence_img)) {
                        unlink($order->evidence_img);
                    }
                }
                $result = $this->orderRepository->update($order, $order_data);
                return back()->with([
                    'order' => $order,
                    'success' => 'Lưu ảnh minh chứng thành công. Vui lòng đợi Admin kiểm tra!'
                ]);
            } else {
                return back()->with([
                    'error' => 'Đơn hàng không tồn tại.',
                ]);
            }
        }
        return redirect()->to('/');
    }

    public function changePassword() {
        return view('client.user.change-password');
    }

    public function postChangePassword(Request $request) {
        if(Auth::check()) {
            if (!(Hash::check($request->get('password'), Auth::user()->password))) {
                return redirect()->back()->with("error", "Vui lòng nhập đúng mật khẩu hiện tại!");
            }

            if(strcmp($request->get('password'), $request->get('new-password')) == 0){
                return redirect()->back()->with("error", "Mật khẩu mới phải khác mật khẩu hiện tại!");
            }

            if(!(strcmp($request->get('new-password'), $request->get('new-password-confirm')) == 0)){
                return redirect()->back()->with("error", "Vui lòng nhập lại đúng mật khẩu mới!");
            }

            $rules = [
                'password' => 'required',
                'new-password' => 'required|string|min:6',
            ];
            $attrNames = [
                'password' => 'Mật khẩu hiện tại',
                'new-password' => 'Mật khẩu mới',
            ];
            $request->validate($rules, [], $attrNames);

            $user = Auth::user();
            $user->password = Hash::make($request->get('new-password'));
            $user->save();

            return redirect()->back()->with("success", "Đổi mật khẩu thành công!");
        }
        return redirect()->to('/');
    }
}
