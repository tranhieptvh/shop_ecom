@extends('layouts.client.master')

@section('style')
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('/') }}">Trang chủ<i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{ route('client.product.index') }}">Sản phẩm<i class="ti-arrow-right"></i></a></li>
                            <li class="active">{{ $product->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    detail

@endsection

@section('script')
@endsection
