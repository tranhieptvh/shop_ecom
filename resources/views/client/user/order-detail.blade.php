@extends('layouts.client.profile')

@section('title')
    Chi tiết đơn hàng
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
                            <li class="active">Chi tiết đơn hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="wrap-title mb-4 pb-1">
        <h3>Chi tiết đơn hàng</h3>
    </div>

    <div class="order-detail">

        @if (empty($order))
            <p>Đơn hàng không tồn tại</p>
        @else
            @if (session('success'))
                <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
            @endif

            <div class="overview">
                <div class="row col-12 mt-1">
                    <span class="col-3"><b>Mã đơn hàng: </b></span>
                    <span class="col-9">#{{ $order->code }}</span>
                </div>
                <div class="row col-12 mt-1">
                    <span class="col-3"><b>Thời gian đặt hàng: </b></span>
                    <span class="col-9">{{ date_format($order->created_at, 'd-m-Y H:i:s') }}</span>
                </div>
                <div class="row col-12 mt-1">
                    <span class="col-3"><b>Trạng thái đơn hàng: </b></span>
                    <span class="col-9">
                    @foreach(\App\Order::STATUS as $status)
                            {{ $order->status == $status['value'] ? $status['key'] : '' }}
                        @endforeach
                </span>
                </div>
            </div>

            <div class="main-step user-info mt-4">
                <div class="step">
                    <span>1</span>
                </div>
                <p class="title mb-3">
                    Thông tin người mua
                    <span class="check-pass"><i class="ti-check"></i></span>
                </p>

                <div class="row col-12 mt-1">
                    <span class="col-4"><b>Họ tên: </b></span>
                    <span class="col-8">{{ $order->name }}</span>
                </div>
                <div class="row col-12 mt-1">
                    <span class="col-4"><b>Số điện thoại: </b></span>
                    <span class="col-8">{{ $order->phone }}</span>
                </div>
                <div class="row col-12 mt-1">
                    <span class="col-4"><b>Email: </b></span>
                    <span class="col-8">{{ $order->email }}</span>
                </div>
                <div class="row col-12 mt-1">
                    <span class="col-4"><b>Địa chỉ nhận hàng: </b></span>
                    <span class="col-8">{{ $order->address }}</span>
                </div>
                <div class="row col-12 mt-1">
                    <span class="col-4"><b>Ghi chú đơn hàng: </b></span>
                    <span class="col-8">{{ $order->note }}</span>
                </div>
            </div>

            <div class="main-step payment mt-4">
                <div class="step">
                    <span>2</span>
                </div>
                <p class="title mb-3">
                    Thông tin thanh toán
                    @if ($order->paid_flg == \App\Order::PAYMENT['PAID']['value'])
                        <span class="check-pass"><i class="ti-check"></i></span>
                    @endif
                </p>

                <div class="row col-12 mt-1">
                    <span class="col-4"><b>Phương thức thanh toán: </b></span>
                    <span class="col-8">{{ $order->method == \App\Order::METHOD['COD']['value'] ? \App\Order::METHOD['COD']['key'] : \App\Order::METHOD['BANKING']['key'] }}</span>
                </div>
                <div class="row col-12 mt-1">
                    <span class="col-4"><b>Trạng thái thanh toán: </b></span>
                    <span class="col-8">{{ $order->paid_flg == \App\Order::PAYMENT['UNPAID']['value'] ? \App\Order::PAYMENT['UNPAID']['key'] : \App\Order::PAYMENT['PAID']['key'] }}</span>
                </div>
                @if ($order->method == \App\Order::METHOD['BANKING']['value'])
                    <form action="{{ route('client.user.update-evidence', $order->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row col-12 mt-1">
                            <span class="col-4"><b>Ảnh minh chứng: </b></span>
                            <div class="col-8">
                                <input class="d-none" type="file" name="evidence_img" id="evidence_img" onchange="preview_evd()">
                                <button class="btn m-b-5 btn-img" type="button" onclick=" document.getElementById('evidence_img').click()">Chọn ảnh</button>
                                <div>
                                    <img id="frame" src="{{ !empty($order->evidence_img) ? asset($order->evidence_img) : '' }}"
                                         class="{{ !empty($order->evidence_img) ? '' : 'd-none' }}" alt=""/>
                                </div>
                            </div>
                        </div>

                        <div class="row col-12 mt-2 wrap-submit d-none">
                            <span class="col-4"></span>
                            <div class="col-8">
                                <button type="submit" class="btn btn-success">Lưu ảnh minh chứng</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>

            <div class="list-product mt-5">
                <p class="title mb-3">
                    Thông tin đơn hàng
                </p>

                <table class="table">
                    <thead>
                        <tr class="heading">
                            <th>STT</th>
                            <th colspan="2">Sản phẩm</th>
                            <th>Đơn giá (VNĐ)</th>
                            <th>Số lượng</th>
                            <th>Thành tiền (VNĐ)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $key => $detail)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img src="{{ $detail->product->getMainImage[0] ? asset($detail->product->getMainImage[0]->path) : '' }}" alt="" height="100px">
                                </td>
                                <td>
                                    <p class="product-name"><a href="{{ route('client.product.detail', $detail->product->slug) }}" target="_blank">
                                            {{ $detail->product->name }}</a>
                                    </p>
                                </td>
                                <td>{{ number_format($detail->price) }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ number_format($detail->price * $detail->quantity) }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">Hóa đơn</td>
                            <td colspan="3">{{ number_format($order->total_amount) }} (VNĐ)</td>
                        </tr>
                        <tr>
                            <td colspan="3">Ship</td>
                            <td colspan="3">Free</td>
                        </tr>
                        <tr>
                            <td colspan="3">VAT ({{ $info->vat }}%)</td>
                            <td colspan="3">{{ number_format($order->total_amount * $info->vat / 100) }} (VNĐ)</td>
                        </tr>
                        <tr>
                            <td colspan="3">Tổng</td>
                            <td colspan="3">{{ number_format($order->total) }} (VNĐ)</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        @endif
    </div>
@endsection

@section('script')
@endsection
