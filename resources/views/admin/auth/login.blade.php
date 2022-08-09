@extends('layouts.authentication.master')

@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div>
                            <a class="logo" href="{{ route('admin') }}" >
                                <img class="img-fluid for-light" src="{{asset('logo/logo_dark.png')}}">
                            </a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="{{ '/admin/login' }}">
                                @csrf

                                <h4>Đăng nhập</h4>
                                <p>Nhập Email và Password để đăng nhập</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input class="form-control" id="email" name="email" type="text" value="{{ old('email') }}" placeholder="test@gmail.com">
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback validated">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" id="password" name="password" type="password" value="{{ old('password') }}" placeholder="******">
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback validated">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                @if (session('error'))
                                    <div class="invalid-feedback validated">{{ session('error') }}</div>
                                @endif
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox" name="remember_me">
                                        <label class="text-muted" for="checkbox1">Remember password</label>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button class="btn btn-primary btn-block" type="submit">Đăng nhập</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
