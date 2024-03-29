@extends('layouts.client.master')

@section('title')
    Giỏ hàng & Thanh toán
@endsection

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
                            <li class="active">Giỏ hàng & Thanh toán</li>
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

                <div class="shop checkout section mt-5">
                    <div class="container">
                        <!-- Form -->
                        <form class="form" method="POST" action="{{ route('client.checkout') }}" id="form-checkout">
                            @csrf

                            <div class="row">
                                <div class="col-lg-8 col-12">
                                    <div class="checkout-form">
                                        <h2>THÔNG TIN THANH TOÁN</h2>
                                        <p></p>
                                        <div class="wrap-step info">
                                            <div class="step">
                                                <span>1</span>
                                            </div>
                                            <h5>Thông tin khách hàng</h5>
                                            <div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label>Họ tên<span>*</span></label>
                                                        <input type="text" name="name" value="{{ old('name', $user->name) }}">
                                                        @if ($errors->has('name'))
                                                            <div class="invalid-feedback d-block">{{ $errors->first('name') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label>Số điện thoại<span>*</span></label>
                                                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">
                                                        @if ($errors->has('phone'))
                                                            <div class="invalid-feedback d-block">{{ $errors->first('phone') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label>Email<span>*</span></label>
                                                        <input type="text" name="email" value="{{ old('email', $user->email) }}">
                                                        @if ($errors->has('email'))
                                                            <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label>Địa chỉ nhận hàng<span>*</span></label>
                                                        <input type="text" name="address" value="{{ old('address', $user->address) }}">
                                                        @if ($errors->has('address'))
                                                            <div class="invalid-feedback d-block">{{ $errors->first('address') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label>Ghi chú đơn hàng</label>
                                                        <textarea name="note" id="" cols="30" rows="5">{{ old('note') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="wrap-step payment">
                                            <div class="step">
                                                <span>2</span>
                                            </div>
                                            <h5>Thanh toán</h5>
                                            <div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="mb-4">
                                                        <p><b>Lưu ý</b>: Quý khách vui lòng liên hệ <b>Rubia Shop</b> theo thông tin dưới đây trước khi thực hiện đặt hàng hoặc chuyển khoản:</p>
                                                        <p>Số điện thoại: {{ $info->phone }}</p>
                                                        <p>Địa chỉ: {{ $info->address }}</p>
                                                        @if ($info->zalo_qr)
                                                            <p><b>Hoặc Zalo:</b></p>
                                                            <img src="{{ asset($info->zalo_qr) }}" alt="ZALO QR CODE" class="zalo-qr-code">
                                                        @endif
                                                    </div>
                                                    <div class="form-group payment-method">
                                                        <label class="method-item active">
                                                            Trả tiền mặt khi nhận hàng
                                                            <input type="radio" name="method" value="0" checked>
                                                        </label>
                                                        <label class="method-item method-banking">
                                                            Chuyển khoản ngân hàng
                                                            <input type="radio" name="method" value="1">
                                                        </label>
                                                    </div>

                                                    <div class="info-banking">
                                                        <p><b>Thông tin chuyển khoản:</b></p>
                                                        <p>{{ $info->bank }}</p>
                                                        @if ($info->bank_qr)
                                                            <p><b>Hoặc quét mã QR:</b></p>
                                                            <img src="{{ asset($info->bank_qr) }}" alt="QR CODE" class="qr-code">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="order-details">
                                        <!-- Order Widget -->
                                        <div class="single-widget ">
                                            <h2>Đặt hàng</h2>
                                            <div class="content total-amount">
                                                <ul>
                                                    <li class="total_bill">Hóa đơn<span>{{ number_format($total_price) }} VNĐ</span></li>
{{--                                                    <li>(+) Ship<span>Free</span></li>--}}
                                                    <li class="vat">(+) VAT ({{ $info->vat }}%)<span>{{ number_format($total_price * $info->vat / 100) }} VNĐ</span></li>
                                                    <li class="last">Tổng<span>{{ number_format($total_price + $total_price * $info->vat / 100) }} VNĐ</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/ End Order Widget -->
                                        <!-- Button Widget -->
                                        <div class="single-widget get-button">
                                            <div class="content">
                                                <div class="button">
                                                    <button class="btn" type="submit">Đặt hàng</button>
                                                    <a href="{{ route('client.product.index') }}" class="btn mt-2">Tiếp tục mua sắm</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/ End Button Widget -->
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--/ End Form -->
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
