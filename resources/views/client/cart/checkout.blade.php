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
                                            <label class="method-item active">
                                                Trả tiền mặt khi nhận hàng
                                                <input type="radio" name="payment_method" value="0" checked>
                                            </label>
                                            <label class="method-item method-banking">
                                                Chuyển khoản ngân hàng
                                                <input type="radio" name="payment_method" value="1">
                                            </label>
                                        </div>

                                        <div class="info-banking">
                                            <p><b>Lưu ý</b>: Quý khách vui lòng liên hệ shop theo thông tin dưới đây trước khi chuyển khoản:</p>
                                            <p>Số điện thoại: +84 985250657</p>
                                            <p>Hoặc Zalo: &nbsp; <a href="https://chat.zalo.me/?c=1507282913207556787" target="_blank">
                                                    <img src="{{ asset('/client/images/zalo.svg') }}" alt="" class="zalo">
                                                </a></p>
                                            <br>
                                            <p><b>Thông tin chuyển khoản:</b></p>
                                            <p>Vietcombank chi nhánh Tây Hồ - 1016081089 - TRAN VAN HIEP</p>
                                            <p>Hoặc quét mã QR:</p>
                                            <img src="{{ asset('/client/images/payment_qrcode.png') }}" alt="QR CODE" class="qr-code">
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
                            <h2>Đặt hàng</h2>
                            <div class="content">
                                <ul>
                                    <li>Hóa đơn<span>$330.00</span></li>
                                    <li>(+) Ship<span>Free</span></li>
                                    <li class="last">Tổng<span>$340.00</span></li>
                                </ul>
                            </div>
                        </div>
                        <!--/ End Order Widget -->
                        <!-- Button Widget -->
                        <div class="single-widget get-button">
                            <div class="content">
                                <div class="button">
                                    <a href="#" class="btn">Đặt hàng</a>
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
