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
        <div class="card">
            <form class="form theme-form" method="POST" action="{{ route('admin.user.store') }}">
                @csrf

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Họ tên</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="name">
                                </div>
                            </div>
                            <div class="mb-3 row date-range-picker">
                                <label class="col-sm-3 col-form-label">Ngày sinh</label>
                                <div class="col-sm-9">
                                    <div class="theme-form">
                                        <div class="input-group date" id="dt-date" data-target-input="nearest">
                                            <input class="form-control" type="text" name="date_of_birth">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Số điện thoại</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="phone">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Quê quán</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="address">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="email">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Mật khẩu</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="password" name="password">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Phân quyền</label>
                                <div class="col-sm-9">
                                    <div class="mb-3 m-t-15 custom-radio-ml">
                                        <div class="form-check radio radio-primary">
                                            <input class="form-check-input" id="radio1" type="radio" name="role" value="1">
                                            <label class="form-check-label" for="radio1">Admin</label>
                                        </div>
                                        <div class="form-check radio radio-primary">
                                            <input class="form-check-input" id="radio2" type="radio" name="role" value="2" checked>
                                            <label class="form-check-label" for="radio2">Member</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-success" type="submit">Submit</button>
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
