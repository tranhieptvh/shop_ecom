<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile() {
        if(auth()->check()) {
            return view('client.user.profile');
        }
        return redirect()->to('/');
    }
}