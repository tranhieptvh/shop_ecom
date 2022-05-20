@extends('layouts.admin.master')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Quản lý nhãn hiệu</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Quản lý nhãn hiệu</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-sm-12 mb-2">
            <a href="{{ route('admin.brand.create') }}" class="btn btn-success btn-add">Thêm mới &nbsp;&nbsp; <i class="fa fa-plus"></i></a>
        </div>
        @if (session('success'))
            <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
        @endif
        <div class="col-sm-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr class="table-primary">
                            <th scope="col">STT</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($brands as $key => $brand)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->created_at->format('d-m-y') }}</td>
                                <td>
                                    <div style="display: flex;">
                                        <a href="{{ route('admin.brand.edit', $brand->id) }}" class="btn btn-primary btn-sm m-r-5"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('admin.brand.destroy', $brand->id) }}" method="POST" style="display: inline-block"
                                              onSubmit="return confirm('Xóa danh mục sản phẩm này? \n\n Tên: {{ $brand->name }}')">
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
                        {!! $brands->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection