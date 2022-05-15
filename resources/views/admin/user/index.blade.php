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
        <div class="col-sm-12 mb-2">
            <a href="{{ route('admin.user.create') }}" class="btn btn-success btn-add">Thêm mới &nbsp;&nbsp; <i class="fa fa-plus"></i></a>
        </div>
        @if (session('success'))
            <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
        @endif
        <div class="col-sm-12 mb-2">
            @foreach($roles as $role)
                <a href="/admin/user?role={{ $role->id }}" class="btn btn-outline-light-2x txt-dark {{ $role->id == $target_role ? 'active' : '' }}">{{ $role->name }}</a>
            @endforeach
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
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Action</th>
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
                                <td style="display: flex;">
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning m-r-5">Sửa</a>
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display: inline-block" id="delete_user"
                                          onSubmit="return confirm('Xóa User này? \n\n Họ tên: {{ $user->name }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Xóa</button>
                                    </form>
                                </td>
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
    <script>
        $(document).ready(function(){
            console.log(123);
        });
    </script>
@endsection
