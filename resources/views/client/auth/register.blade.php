@extends('layouts.client.master')

@section('title')
    Đăng ký
@endsection

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

                                    <form action="{{ route('client.auth.post-register') }}" method="POST">
                                        @csrf

                                        <h1 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng ký</h1>

                                        <div class="form-outline mb-4">
                                            <label class="form-label">Họ tên <span class="required">*</span></label>
                                            <input type="text" name="name" class="form-control form-control-lg" value="{{ old('name') }}"/>
                                            @if ($errors->has('name'))
                                                <div class="invalid-feedback d-block">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label">Ngày sinh <span class="required">*</span></label>
                                            <input type="date" name="date_of_birth" class="form-control form-control-lg" value="{{ old('date_of_birth') }}"/>
                                            @if ($errors->has('date_of_birth'))
                                                <div class="invalid-feedback d-block">{{ $errors->first('date_of_birth') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label">Số điện thoại <span class="required">*</span></label>
                                            <input type="text" name="phone" class="form-control form-control-lg" value="{{ old('phone') }}"/>
                                            @if ($errors->has('phone'))
                                                <div class="invalid-feedback d-block">{{ $errors->first('phone') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label">Địa chỉ <span class="required">*</span></label>
                                            <input type="text" name="address" class="form-control form-control-lg" value="{{ old('address') }}"/>
                                            @if ($errors->has('address'))
                                                <div class="invalid-feedback d-block">{{ $errors->first('address') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label">Email <span class="required">*</span></label>
                                            <input type="text" name="email" class="form-control form-control-lg" value="{{ old('email') }}"/>
                                            @if ($errors->has('email'))
                                                <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label">Mật khẩu <span class="required">*</span></label>
                                            <input type="password" name="password" class="form-control form-control-lg" value="{{ old('password') }}"/>
                                            @if ($errors->has('password'))
                                                <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button type="submit" class="btn btn-lg btn-block" style="background: #0e1d42; color: #fff;">Đăng ký</button>
                                        </div>

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
