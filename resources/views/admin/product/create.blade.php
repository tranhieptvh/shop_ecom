@extends('layouts.admin.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/backend/product.css')}}">
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
            <form class="form theme-form" method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data" id="form">
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
                                    <option value="">--- Chọn danh mục</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" class="{{ $category->level == 0 ? 'red bold' : '' }} {{ $category->level == 1 ? 'bold' : '' }}">
                                            {{ str_repeat('|--- ', $category->level) . $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <div class="invalid-feedback validated">{{ $errors->first('category_id') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Hình ảnh <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input class="d-none" type="file" name="main" id="main_img" onchange="preview()">
                                <button class="btn btn-primary m-b-5" type="button" onclick=" document.getElementById('main_img').click()">Chọn ảnh</button>
                                @if ($errors->has('main'))
                                    <div class="invalid-feedback validated">{{ $errors->first('main') }}</div>
                                @endif
                                <div>
                                    <img id="frame" src="" height="100px" class="hidden"/>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Ảnh thumbnail</label>
                            <div class="col-sm-9">
                                <input class="d-none" type="file" name="thumbnail[]" id="thumbnail" multiple onchange="image_select()">
                                <button class="btn btn-primary m-b-5" type="button" onclick="document.getElementById('thumbnail').click()">Chọn ảnh</button>
                                @if ($errors->has('thumbnail'))
                                    <div class="invalid-feedback validated">{{ $errors->first('thumbnail') }}</div>
                                @endif
                                <div class="d-flex flex-wrap justify-content-start">
                                    <div class="d-flex flex-wrap justify-content-start" id="thumbnail_container"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Chất lượng</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="quality" value="{{ old('quality') }}">
                                @if ($errors->has('quality'))
                                    <div class="invalid-feedback validated">{{ $errors->first('quality') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Mô tả</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" rows="5" cols="5">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="invalid-feedback validated">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nội dung</label>
                            <div class="col-sm-9">
                                <textarea id="content" name="content" cols="30" rows="10">{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    <div class="invalid-feedback validated">{{ $errors->first('content') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nổi bật</label>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline checkbox checkbox-primary">
                                    <input class="form-check-input" id="is_feature" name="is_feature" type="checkbox" data-bs-original-title="" title="">
                                    <label class="form-check-label" for="is_feature"></label>
                                </div>
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
    <script src="{{ asset('assets/js/backend/product.js') }}"></script>

    <script>
        CKEDITOR.replace( 'content', {
            on: {
                contentDom: function( evt ) {
                    // Allow custom context menu only with table elemnts.
                    evt.editor.editable().on( 'contextmenu', function( contextEvent ) {
                        var path = evt.editor.elementPath();

                        if ( !path.contains( 'table' ) ) {
                            contextEvent.cancel();
                        }
                    }, null, null, 5 );
                }
            },
            language: 'vi',
            height: 500,
            filebrowserImageUploadUrl: "{{ url('admin/product/upload-ckeditor?_token='.csrf_token()) }}",
            filebrowserBrowseUrl: "{{ url('admin/product/file-browser?_token='.csrf_token()) }}",
            filebrowserUploadMethod: 'form'
        });

    </script>
@endsection
