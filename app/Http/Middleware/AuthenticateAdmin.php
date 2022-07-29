<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $is_admin = Auth::check() && (Auth::user()->role_id == 1 || Auth::user()->role_id == 2);
        if (!$is_admin) {
            Auth::logout();
            Session::flush();
            return redirect()->to('/admin/login');
        }
        return $next($request);
    }
}
