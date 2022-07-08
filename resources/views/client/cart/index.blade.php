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
                            <li class="active">Giỏ hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="shopping-cart section">
        <div class="container">
            @if (isset($carts))
                <div class="row">
                    <div class="col-12">
                        <!-- Shopping Summery -->
                        <table class="table shopping-summery">
                            <thead>
                            <tr class="main-hading">
                                <th colspan="2">SẢN PHẨM</th>
                                <th class="text-center">ĐƠN GIÁ (VNĐ)</th>
                                <th class="text-center">SỐ LƯỢNG</th>
                                <th class="text-center">THÀNH TIỀN (VNĐ)</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carts as $key => $cart)
                                <tr id="{{ 'cart_'.$key }}">
                                    <td class="image" data-title="No">
                                        <img src="{{ !empty($cart['product']->getMainImage[0]) ? asset($cart['product']->getMainImage[0]->path) : '' }}" alt="">
                                    </td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="{{ route('client.product.detail', $cart['product']->slug) }}" target="_blank">
                                                {{ $cart['product']->name }}</a>
                                        </p>
                                    </td>
                                    <td class="price" data-title="Price"><span>{{ number_format($cart['price']) }}</span></td>
                                    <td class="qty" data-title="Qty"><!-- Input Order -->
                                        <div class="input-group"
                                             data-cart_id="{{ isset($cart['id']) ? $cart['id'] : '' }}"
                                             data-cart_index="{{ $key }}">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number btn-minus" {{ $cart['quantity'] == 1 ? 'disabled' : '' }}>
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="quantity" class="input-number" min="1" value="{{ $cart['quantity'] }}">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number btn-plus">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </td>
                                    <td class="total-amount" data-title="Total"><span>{{ number_format($cart['price'] * $cart['quantity']) }}</span></td>
                                    <td class="action"
                                        data-cart_id="{{ isset($cart['id']) ? $cart['id'] : '' }}"
                                        data-cart_index="{{ $key }}">
                                        <span class="delete-cart-item">
                                            <i class="ti-trash remove-icon"></i>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <!--/ End Shopping Summery -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Total Amount -->
                        <div class="total-amount">
                            <div class="row">
                                <div class="col-lg-8 col-md-5 col-12">
                                    <div class="left">
                                        {{--                                    <div class="coupon">--}}
                                        {{--                                        <form action="#" target="_blank">--}}
                                        {{--                                            <input name="Coupon" placeholder="Enter Your Coupon">--}}
                                        {{--                                            <button class="btn">Apply</button>--}}
                                        {{--                                        </form>--}}
                                        {{--                                    </div>--}}
                                        {{--                                    <div class="checkbox">--}}
                                        {{--                                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>--}}
                                        {{--                                    </div>--}}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-7 col-12">
                                    <div class="right">
                                        <ul>
                                            <li class="total_bill">Hóa đơn<span>{{ number_format($total_price) }} VNĐ</span></li>
                                            <li>Ship<span>Free</span></li>
                                            <li class="last">Tổng<span>{{ number_format($total_price) }} VNĐ</span></li>
                                        </ul>
                                        <div class="button5">
                                            <a href="#" class="btn">Thanh toán</a>
                                            <a href="{{ route('client.product.index') }}" class="btn">Tiếp tục mua sắm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ End Total Amount -->
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12">
                        <p class="no-product">Bạn chưa chọn sản phẩm nào vào giỏ hàng!</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
@endsection
