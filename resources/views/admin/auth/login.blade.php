@extends('layouts.authentication.master')

@section('content')
    <div class="container-fluid">
        <div class="col-sm-12 col-xl-6">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Đăng nhập</h5>
                    </div>
                    <div class="card-body">
                        <form class="theme-form" method="POST" action="{{ '/admin/login' }}">
                            @csrf

                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="email">Email</label>
                                <input class="form-control" id="email" name="email" type="text" placeholder="Nhập email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback validated">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="password">Mật khẩu</label>
                                <input class="form-control" id="password" name="password" type="password" placeholder="Nhập mật khẩu" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback validated">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            @if (!empty($error))
                                <div class="invalid-feedback validated">{{ $error }}</div>
                            @endif
                            <div class="checkbox p-0">
                                <input id="dafault-checkbox" type="checkbox" name="remember_me">
                                <label class="mb-0" for="dafault-checkbox">Lưu đăng nhập</label>
                            </div>

                            <div class="card-footer text-center no-border">
                                <button class="btn btn-primary" type="submit">Đăng nhập</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
