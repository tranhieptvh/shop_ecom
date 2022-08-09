@extends('layouts.admin.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Dashboard</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
@endsection

@section('content')
    <div class="container-fluid">
        <p style="font-size: 1rem;">
            Chào mừng <b>{{ Auth::user()->name }}</b> đã đến với trang Admin quản lý của <b>Rubia Shop</b>
        </p>
    </div>
@endsection

@section('script')
@endsection
