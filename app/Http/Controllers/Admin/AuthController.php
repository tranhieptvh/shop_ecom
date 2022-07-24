<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        if(auth()->check()) {
            return redirect()->to('admin');
        }
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request) {
        $remember = $request->has('remember_me') ? true : false;
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => [config('constants.ROLE_ROOT'), config('constants.ROLE_ADMIN')],
        ], $remember)) {
            return redirect()->to('admin');
        }
        return view('admin.auth.login')->with('error', 'Đăng nhập không thành công, vui lòng thử lại!');
    }

    public function logout() {
        Auth::logout();
        return redirect()->to('/admin/login');
    }
}
