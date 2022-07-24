<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $remember = $request->has('remember_me') ? true : false;
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $remember)) {
            return redirect()->to('/');
        }
        return view('client.auth.login')->with('error', 'Đăng nhập không thành công, vui lòng thử lại!');
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

        $user = $this->userRepository->create($user_data);

        return redirect()->route('client.auth.index')->with([
            'success' => 'Đăng ký thành công, vui lòng đăng nhập!'
        ]);
    }
}
