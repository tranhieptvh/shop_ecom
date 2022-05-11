<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function login(Request $request) {
        $remember = $request->has('remember_me') ? true : false;
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 1,
        ], $remember)) {
            return redirect()->to('/admin');
        } else {
            return view('admin.auth.login');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->to('/admin/login');
    }
}
