@extends('layouts.admin.master')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Quản lý sản phẩm</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Quản lý sản phẩm</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-sm-12 mb-2 d-flex justify-content-center align-items-baseline">
            <div class="col-sm-3">
                <a href="{{ route('admin.product.create') }}" class="btn btn-success btn-add">Thêm mới &nbsp;&nbsp; <i class="fa fa-plus"></i></a>
            </div>
            <div class="col-sm-9">
                <form action="">
                    <label>
                        Danh mục
                        <select class="form-select" name="category_id" id="">
                            <option value="">--- Chọn danh mục</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        class="{{ $category->parent_id == 0 ? 'bold' : '' }}" >
                                    {{ str_repeat('|--- ', $category->level) . $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    <label>
                        Thuơng hiệu
                        <select class="form-select" name="brand_id" id="">
                            <option value="">--- Chọn thương hiệu</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label>
                        Tên sản phẩm
                        <input type="text" name="name" class="form-control">
                    </label>

                    <label>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </label>
                </form>
            </div>
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
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Giá (VNĐ)</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td><img src="{{ !empty($product->getMainImage->first()) ? asset($product->getMainImage->first()->path) : '' }}" style="height: 50px; max-width: 100px"></td>
                                <td>{{ number_format($product->price) }}</td>
                                <td>
                                    <div style="display: flex;">
                                        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary btn-sm m-r-5"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display: inline-block"
                                              onSubmit="return confirm('Xóa sản phẩm này? \n\n Tên sản phẩm: {{ $product->name }}')">
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
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
