@extends('layouts.admin.master')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Thêm mới sản phẩm</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.product.index') }}">Sản phẩm</a>
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
            <form class="form theme-form" method="POST" action="{{ route('admin.product.store') }}">
                @csrf

                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Tên sản phẩm<span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback validated">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Slug <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug') }}">
                                @if ($errors->has('slug'))
                                    <div class="invalid-feedback validated">{{ $errors->first('slug') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Giá (VNĐ) <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="price" value="{{ old('price') }}">
                                @if ($errors->has('price'))
                                    <div class="invalid-feedback validated">{{ $errors->first('price') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Thương hiệu</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="brand_id" id="">
                                    <option value="">--- Chọn thương hiệu</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('brand_id'))
                                    <div class="invalid-feedback validated">{{ $errors->first('brand_id') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Danh mục <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-select" name="category_id" id="">
                                    <option value="0">--- Chọn danh mục</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ str_repeat('|--- ', $category->level) . $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <div class="invalid-feedback validated">{{ $errors->first('category_id') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Mô tả</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" value="{{ old('description') }}" rows="5" cols="5"></textarea>
                                @if ($errors->has('description'))
                                    <div class="invalid-feedback validated">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nội dung</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="content" value="{{ old('content') }}" rows="5" cols="5"></textarea>
                                @if ($errors->has('content'))
                                    <div class="invalid-feedback validated">{{ $errors->first('content') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nội dung</label>
                            <div class="col-sm-9">
                                <textarea id="editor1" name="content" cols="30" rows="10"></textarea>
                                @if ($errors->has('content'))
                                    <div class="invalid-feedback validated">{{ $errors->first('content') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-success btn-lg" type="submit">Lưu</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/common.js') }}"></script>

    <!-- CK Editer-->
    <script src="{{asset('assets/js/editor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/styles.js')}}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/ckeditor.custom.js')}}"></script>
@endsection
