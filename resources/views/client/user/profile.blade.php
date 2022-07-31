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
                            <li class="active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="wrap-title mb-4 pb-1">
        <h3>Hồ Sơ Của Tôi</h3>
        <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
    </div>

    <div class="info">
        @if (session('success'))
            <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
        @endif

        <form action="{{ route('client.user.update', $user->id) }}" enctype="multipart/form-data" method="POST" class="form">
            @csrf
            @method('PUT')

            <div class="col-lg-12 col-md-12 col-12">
                <div class="form-group row col-12">
                    <label class="col-3">Họ tên<span>*</span></label>
                    <div class="col-9">
                        <input type="text" name="name" value="{{ old('name', $user->name) }}">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback d-block">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>
            </div>
{{--            <div class="col-lg-12 col-md-12 col-12 mt-3">--}}
{{--                <div class="form-group row col-12">--}}
{{--                    <label class="col-3">Email<span>*</span></label>--}}
{{--                    <div class="col-9">--}}
{{--                        <input type="text" name="email" value="{{ old('email', $user->email) }}">--}}
{{--                        @if ($errors->has('email'))--}}
{{--                            <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-lg-12 col-md-12 col-12 mt-3">
                <div class="form-group row col-12">
                    <label class="col-3">Ngày sinh<span>*</span></label>
                    <div class="col-9">
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth', date_format(date_create($user->date_of_birth), 'Y-m-d')) }}">
                        @if ($errors->has('date_of_birth'))
                            <div class="invalid-feedback d-block">{{ $errors->first('date_of_birth') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-3">
                <div class="form-group row col-12">
                    <label class="col-3">Số điện thoại<span>*</span></label>
                    <div class="col-9">
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">
                        @if ($errors->has('phone'))
                            <div class="invalid-feedback d-block">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-3">
                <div class="form-group row col-12">
                    <label class="col-3">Địa chỉ<span>*</span></label>
                    <div class="col-9">
                        <input type="text" name="address" value="{{ old('address', $user->address) }}">
                        @if ($errors->has('address'))
                            <div class="invalid-feedback d-block">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-3">
                <div class="form-group row col-12">
                    <label class="col-3">Ảnh đại diện</label>
                    <div class="col-9">
                        <input class="d-none" type="file" name="avatar" id="avatar" value="{{ old('avatar') }}" onchange="preview()">
                        <button class="btn m-b-5 btn-img" type="button" onclick=" document.getElementById('avatar').click()">Chọn ảnh</button>
                        @if ($errors->has('avatar'))
                            <div class="invalid-feedback d-block">{{ $errors->first('avatar') }}</div>
                        @endif
                        <div>
                            <img id="frame" src="{{ isset($user->avatar) ? asset($user->avatar) : '' }}" class="{{ isset($user->avatar) ? '' : 'd-none' }}"/>
                        </div>
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
