@extends('layouts.admin.master')

@section('css')
@endsection

@section('style')
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
                            <th scope="col">STT</th>
                            <th scope="col">ID</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Ảnh đại diện</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td><img src="{{ isset($user->avatar) ? asset($user->avatar) : '' }}" style="height: 50px; max-width: 100px"></td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div style="display: flex;">
                                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary btn-sm m-r-5"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display: inline-block"
                                              onSubmit="return confirm('Xóa User này? \n\n Họ tên: {{ $user->name }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="m-t-30 m-b-20 m-l-10">
                        {!! $users->links() !!}
                    </div>
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
