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
                            <li class="active">Hoàn tất đặt hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="section-thank">
        <div class="container">
            <p class="mt-5">Cảm ơn quý khách đã đặt hàng!</p>
            <p class="mt-2 mb-5"><b>Rubia Shop</b> sẽ sớm liên hệ với quý khách để xác nhận đơn hàng.</p>
        </div>
    </div>
@endsection

@section('script')
@endsection
