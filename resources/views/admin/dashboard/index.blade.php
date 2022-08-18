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
        <div class="row">
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <a href="{{ route('admin.user.index') }}">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center">
                                    <i data-feather="users"></i>
                                </div>
                                <div class="media-body">
                                    <span class="m-0">User</span>
                                    <h4 class="mb-0 counter">{{ $count_user }}</h4>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users icon-bg"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <a href="{{ route('admin.brand.index') }}">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center">
                                    <i data-feather="tag"></i>
                                </div>
                                <div class="media-body">
                                    <span class="m-0">Nhãn hàng</span>
                                    <h4 class="mb-0 counter">{{ $count_brand }}</h4>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag icon-bg"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path></svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <a href="{{ route('admin.product.index') }}">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center">
                                    <i data-feather="shopping-bag"></i>
                                </div>
                                <div class="media-body">
                                    <span class="m-0">Sản phẩm</span>
                                    <h4 class="mb-0 counter">{{ $count_product }}</h4>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag icon-bg"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <a href="{{ route('admin.order.index') }}">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center">
                                    <i data-feather="file-text"></i>
                                </div>
                                <div class="media-body">
                                    <span class="m-0">Đơn hàng</span>
                                    <h4 class="mb-0 counter">{{ $count_order }}</h4>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text icon-bg"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="card p-2">
            <div class="row title m-b-10 m-t-15">
                <h5>Đơn hàng mới</h5>
            </div>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                    <tr class="table-primary">
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Tổng tiền (VNĐ)	</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Trạng thái đơn hàng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($new_orders as $order)
                        <tr>
                            <td>
                                <a href="{{ route('admin.order.view', $order->code) }}" target="_blank" class="text-decoration-underline">#{{ $order->code }}</a>
                            </td>
                            <td>{{ $order->name }}</td>
                            <td>{{ number_format($order->total) }}</td>
                            <td>{{ date_format($order->created_at, 'd-m-Y H:i:s') }}</td>
                            <td>
                                <span class="flag {{ 'status_' . $order->status }}">
                                    @foreach(\App\Order::STATUS as $status)
                                        {{ $order->status == $status['value'] ? $status['key'] : '' }}
                                    @endforeach
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card p-2">
            <div class="row title m-b-10 m-t-15">
                <h5>Sản phẩm bán chạy</h5>
            </div>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                    <tr class="table-primary">
                        <th scope="col">Tên sản phầm</th>
                        <th scope="col">Hình Ảnh</th>
                        <th scope="col">Giá (VNĐ)</th>
                        <th scope="col">Số lượng bán</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($best_sell_products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td><img src="{{ !empty($product->getMainImage->first()) ? asset($product->getMainImage->first()->path) : '' }}" style="height: 50px; max-width: 100px" alt=""></td>
                                <td>{{ number_format($product->price) }}</td>
                                <td>{{ $product->quantity_sold }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
