<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
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
}
