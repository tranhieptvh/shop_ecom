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
            return redirect()->to('/admin');
        }
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request) {
        $remember = $request->has('remember_me') ? true : false;
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 1,
        ], $remember)) {
            return redirect()->to('/admin');
        } else {
            return view('admin.auth.login')->with('error_validate', true);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->to('/admin/login');
    }
}
