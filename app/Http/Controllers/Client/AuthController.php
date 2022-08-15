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
use Illuminate\Support\Str;
use function Ramsey\Uuid\v1;

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
            if (!is_null(Auth::user()->email_verified_at)) {
                return redirect()->to('/');
            } else {
                Auth::logout();
                return back()->with('error', 'Email hoặc mật khẩu không đúng!<br>Vui lòng thử lại!');
            }
        }
        return back()->with('error', 'Email hoặc mật khẩu không đúng!<br>Vui lòng thử lại!');
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
        $user_data['verify_token'] = Str::random();

        DB::beginTransaction();
        try {
            $user = $this->userRepository->create($user_data);

            $view = 'emails.register';
            $data = [];
            $data['email'] = $user->email;
            $data['name'] = $user->name;
            $data['url_verify'] = request()->getHttpHost() . '/email-verify?_token=' . $user->verify_token;
            $subject = 'Đăng ký tài khoản Rubia Shop thành công!';
            $to = $user->email;
            sendmail($view, $data, $subject, $to);

            DB::commit();
            return redirect()->route('client.auth.index')->with([
                'success' => 'Đăng ký thành công!<br>Vui lòng kiểm tra email để xác thực tài khoản!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' Line: ' . $e->getLine());
            return back();
        }
    }

    public function emailVerify() {
        if (isset($_GET['_token'])) {
            $user = $this->userRepository->getBuilder()->where('verify_token', $_GET['_token'])->first();
            if ($user && is_null($user->email_verified_at)) {
                $this->userRepository->update($user, ['email_verified_at' => new \DateTime()]);
                return redirect()->route('client.auth.index')->with([
                    'success' => 'Xác thực email thành công!<br>Vui lòng đăng nhập!'
                ]);
            } else {
                return redirect()->route('client.auth.index');
            }
        } else {
            return redirect()->route('client.auth.index');
        }
    }

    public function couldNotAccess() {
        return view('client.auth.could-not-access');
    }
}
