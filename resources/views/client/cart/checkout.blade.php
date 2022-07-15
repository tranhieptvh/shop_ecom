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
                            <li class="active">Thanh toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="shop checkout section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="checkout-form">
                        <h2>THÔNG TIN THANH TOÁN</h2>
                        <p></p>
                        <!-- Form -->
                        <form class="form" method="post" action="#">
                            <div class="wrap-step info">
                                <div class="step">
                                    <span>1</span>
                                </div>
                                <h5>Thông tin khách hàng</h5>
                                <div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Họ tên<span>*</span></label>
                                            <input type="text" name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Số điện thoại<span>*</span></label>
                                            <input type="text" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Email<span>*</span></label>
                                            <input type="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Địa chỉ nhận hàng<span>*</span></label>
                                            <input type="text" name="address">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Ghi chú đơn hàng</label>
                                            <textarea name="note" id="" cols="30" rows="5"></textarea>
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
                                        <div class="form-group payment-method">
                                            <label>
                                                Trả tiền mặt khi nhận hàng
                                                <input type="radio" name="payment_method" value="1">
                                            </label>
                                            <label>
                                                Chuyển khoản khi nhận hàng
                                                <input type="radio" name="payment_method" value="2">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--/ End Form -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="order-details">
                        <!-- Order Widget -->
                        <div class="single-widget">
                            <h2>CART  TOTALS</h2>
                            <div class="content">
                                <ul>
                                    <li>Sub Total<span>$330.00</span></li>
                                    <li>(+) Shipping<span>$10.00</span></li>
                                    <li class="last">Total<span>$340.00</span></li>
                                </ul>
                            </div>
                        </div>
                        <!--/ End Order Widget -->
                        <!-- Order Widget -->
                        <div class="single-widget">
                            <h2>Payments</h2>
                            <div class="content">
                                <div class="checkbox">
                                    <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label>
                                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Cash On Delivery</label>
                                    <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox"> PayPal</label>
                                </div>
                            </div>
                        </div>
                        <!--/ End Order Widget -->
                        <!-- Payment Method Widget -->
                        <div class="single-widget payement">
                            <div class="content">
                                <img src="images/payment-method.png" alt="#">
                            </div>
                        </div>
                        <!--/ End Payment Method Widget -->
                        <!-- Button Widget -->
                        <div class="single-widget get-button">
                            <div class="content">
                                <div class="button">
                                    <a href="#" class="btn">proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                        <!--/ End Button Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
