@extends('layouts.admin.admin')

@section('css')
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/admin/user.css')}}">
@endsection

@section('breadcrumb-title')
    <h3>Thêm mới User</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.user.index') }}">User</a>
    </li>
    <li class="breadcrumb-item active">Thêm mới</li>
@endsection

@section('content')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
        @endif
        <div class="card">
            <form class="form theme-form" method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Họ tên <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback validated">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row date-range-picker">
                                <label class="col-sm-3 col-form-label">Ngày sinh <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <div class="theme-form">
                                        <div class="input-group date" id="dt-date" data-target-input="nearest">
                                            <input class="form-control" type="text" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @if ($errors->has('date_of_birth'))
                                        <div class="invalid-feedback validated">{{ $errors->first('date_of_birth') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Số điện thoại <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                        <div class="invalid-feedback validated">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Địa chỉ <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="address" value="{{ old('address') }}">
                                    @if ($errors->has('address'))
                                        <div class="invalid-feedback validated">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Ảnh đại diện</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" name="avatar" value="{{ old('avatar') }}">
                                    @if ($errors->has('avatar'))
                                        <div class="invalid-feedback validated">{{ $errors->first('avatar') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Email <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback validated">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Mật khẩu <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="password" name="password" value="{{ old('password') }}">
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback validated">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Phân quyền <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <div class="mb-3 m-t-15 custom-radio-ml">
                                        @foreach($roles as $key => $role)
                                            <div class="form-check radio radio-primary">
                                                <input class="form-check-input" id="radio{{ $key }}" type="radio" name="role_id" value="{{ $role->id }}">
                                                <label class="form-check-label" for="radio{{ $key }}">{{ $role->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('role_id'))
                                        <div class="invalid-feedback validated">{{ $errors->first('role_id') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center col-sm-6">
                    <button class="btn btn-success btn-lg" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('input[name="date_of_birth"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'DD-MM-YYYY'
                }
            })
        });
    </script>
@endsection
