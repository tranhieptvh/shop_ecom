@extends('layouts.admin.master')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Thêm mới danh mục sản phẩm</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.category.index') }}">Danh mục sản phẩm</a>
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
            <form class="form theme-form" method="POST" action="{{ route('admin.category.store') }}">
                @csrf

                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Tên <span class="required">*</span></label>
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
                            <label class="col-sm-3 col-form-label">Danh mục cha</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="parent_id" id="">
                                    <option value="0">--- Chọn danh mục cha</option>
                                    @foreach($categories as $item)
                                        <option value="{{ $item->id }}" class="{{ $item->parent_id == 0 ? 'red bold' : '' }} {{ $item->parent_id == 1 ? 'bold' : '' }}">
                                            {{ str_repeat('|--- ', $item->level) . $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('parent_id'))
                                    <div class="invalid-feedback validated">{{ $errors->first('parent_id') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Thứ tự</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="number" name="ordering" value="1">
                                @if ($errors->has('ordering'))
                                    <div class="invalid-feedback validated">{{ $errors->first('ordering') }}</div>
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
@endsection
