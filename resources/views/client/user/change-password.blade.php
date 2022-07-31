@extends('layouts.client.profile')

@section('style')
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('/') }}">Trang chủ<i class="ti-arrow-right"></i></a></li>
                            <li class="active">Đổi mật khẩu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="wrap-title mb-4 pb-1">
        <h3>Đổi mật khẩu</h3>
    </div>

    <div class="change-password">
        @if (session('success'))
            <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
        @endif

        <form action="{{ route('client.user.post-change-password') }}" class="form" method="POST">
            @csrf

            <div class="col-lg-12 col-md-12 col-12">
                <div class="form-group row col-12">
                    <label class="col-3">Mật khẩu hiện tại<span>*</span></label>
                    <div class="col-9">
                        <input type="password" name="password" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                            <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-12 mt-3">
                <div class="form-group row col-12">
                    <label class="col-3">Mật khẩu mới<span>*</span></label>
                    <div class="col-9">
                        <input type="password" name="new-password" value="{{ old('new-password') }}">
                        @if ($errors->has('new-password'))
                            <div class="invalid-feedback d-block">{{ $errors->first('new-password') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-12 mt-3">
                <div class="form-group row col-12">
                    <label class="col-3">Nhập lại mật khẩu mới<span>*</span></label>
                    <div class="col-9">
                        <input type="password" name="new-password-confirm" value="{{ old('new-password-confirm') }}">
                        @if ($errors->has('new-password-confirm'))
                            <div class="invalid-feedback d-block">{{ $errors->first('new-password-confirm') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-12 mt-5 text-center">
                <button type="submit" class="btn btn-success">Lưu</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
@endsection
