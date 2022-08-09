<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function transport() {
        return view('client.policy.transport');
    }

    public function refund() {
        return view('client.policy.refund');
    }
}
