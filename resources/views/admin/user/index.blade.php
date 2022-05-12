@extends('layouts.admin.admin')

@section('css')
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/admin/user.css')}}">
@endsection

@section('breadcrumb-title')
    <h3>Danh sách User</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">User</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-sm-12 mb-3">
            <a href="{{ route('admin.user.create') }}" class="btn btn-success btn-add">Thêm mới &nbsp;&nbsp; <i class="fa fa-plus"></i></a>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr class="table-primary">
                            <th scope="col">#</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Email</th>
                            <th scope="col">Quê quán</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->date_of_birth }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
