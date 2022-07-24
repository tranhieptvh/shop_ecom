@extends('layouts.client.master')

@section('content')
    <section class="form-login">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div>
                        <div class="row align-items-center g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://ruoungoai.net/uploads/chivas-regal-18-den.jpg"
                                     alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    @if (session('success'))
                                        <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                    @endif

                                    <form action="{{ route('client.auth.login') }}" method="POST">
                                        @csrf

                                        <h1 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng nhập</h1>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="text" id="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}"/>
                                            @if ($errors->has('email'))
                                                <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">Mật khẩu</label>
                                            <input type="password" id="password" name="password" class="form-control form-control-lg" value="{{ old('password') }}"/>
                                            @if ($errors->has('password'))
                                                <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>

                                        @if (!empty($error))
                                            <div class="invalid-feedback validated">{{ $error }}</div>
                                        @endif

                                        <div class="pt-1 mb-4">
                                            <button type="submit" class="btn btn-lg btn-block" style="background: #0e1d42; color: #fff;">Đăng nhập</button>
                                        </div>

                                        <a class="small text-muted" href="#!">Quên mật khẩu</a> <br>
                                        <a class="small text-muted" href="{{ route('client.auth.register') }}">Đăng ký</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
