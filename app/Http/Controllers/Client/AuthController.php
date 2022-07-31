<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function index() {
        if(auth()->check()) {
            return redirect()->to('/');
        }
        return view('client.auth.login');
    }

    public function login(LoginRequest $request) {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->to('/');
        }
        return back()->with('error', 'Email hoặc mật khẩu không đúng, vui lòng thử lại!');
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect()->to('/login');
    }

    public function register() {
        return view('client.auth.register');
    }

    public function postRegister(RegisterRequest $request) {
        $user_data = $request->all();
        $user_data['date_of_birth'] = date_format(date_create($user_data['date_of_birth']), 'd-m-Y');
        $user_data['password'] = Hash::make($user_data['password']);
        $user_data['role_id'] = \App\Role::ROLE['MEMBER'];

        DB::beginTransaction();
        try {
            $user = $this->userRepository->create($user_data);

            $view = 'emails.register';
            $data = [];
            $data['email'] = $user->email;
            $data['name'] = $user->name;
            $subject = 'Đăng ký tài khoản Rubia Shop thành công!';
            $to = $user->email;
            sendmail($view, $data, $subject, $to);

            DB::commit();
            return redirect()->route('client.auth.index')->with([
                'success' => 'Đăng ký thành công, vui lòng đăng nhập!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' Line: ' . $e->getLine());
            return back();
        }
    }
}
