@extends('layouts.admin.admin')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Quản lý danh mục sản phẩm</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Quản lý danh mục sản phẩm</li>
@endsection

@section('content')
    <div class="container-fluid">
        Categories
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')
    <script>
        console.log(123);
    </script>
@endsection
