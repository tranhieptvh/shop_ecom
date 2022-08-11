@extends('layouts.admin.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/backend/order.css')}}">
@endsection

@section('breadcrumb-title')
    <h3>Chi tiết đơn hàng</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.order.index') }}">Đơn hàng</a>
    </li>
    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
@endsection

@section('content')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
        @endif
            @if (session('error'))
                <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
            @endif
        <div class="d-flex">
            <div class="card col-sm-6">
                <form class="form theme-form" id="form_update_order" method="POST" action="{{ route('admin.order.update', $order->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Tên khách hàng</label>
                                <div class="col-sm-9">
                                    <input class="form-control disable" type="text" name="name" value="{{ $order->name }}" disabled>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input class="form-control disable" type="text" name="email" value="{{ $order->email }}" disabled>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">SĐT</label>
                                <div class="col-sm-9">
                                    <input class="form-control disable" type="text" name="email" value="{{ $order->phone }}" disabled>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Địa chỉ</label>
                                <div class="col-sm-9">
                                    <input class="form-control disable" type="text" name="address" value="{{ $order->address }}" disabled>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Ghi chú đơn hàng</label>
                                <div class="col-sm-9">
                                    <textarea name="note" cols="30" rows="5" disabled class="disable width100">{{ $order->note }}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Phương thức thanh toán</label>
                                <div class="col-sm-9">
                                    <input class="form-control disable" type="text" name="address" value="{{ $order->method == \App\Order::METHOD['COD']['value'] ? \App\Order::METHOD['COD']['key'] : \App\Order::METHOD['BANKING']['key'] }}" disabled>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Tổng tiền (+VAT, -ship) (VNĐ)</label>
                                <div class="col-sm-9">
                                    <input class="form-control disable" type="text" name="total_amount" value="{{ number_format($order->total) }}" disabled>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Phí ship (VNĐ)</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="ship_fee" value=" {{number_format($order->ship_fee) }}">
                                    @if ($errors->has('ship_fee'))
                                        <div class="invalid-feedback validated">{{ $errors->first('ship_fee') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Tổng tiền (+VAT, +ship) (VNĐ)</label>
                                <div class="col-sm-9">
                                    <input class="form-control disable" type="text" name="total_amount" value="{{ number_format($order->total + $order->ship_fee) }}" disabled>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Trạng thái thanh toán</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="paid_flg">
                                        @foreach(\App\Order::PAYMENT as $payment)
                                            <option value="{{ $payment['value'] }}" {{ $order->paid_flg == $payment['value'] ? 'selected' : ''}}>
                                                {{ $payment['key'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if ($order->method == \App\Order::METHOD['BANKING']['value'])
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Hình ảnh minh chứng</label>
                                    <div class="col-sm-9">
                                        <input class="d-none" type="file" name="evidence_img" id="evidence_img" value="{{ $order->evidence_img }}" onchange="preview()">
                                        <button class="btn btn-primary m-b-5" type="button" onclick=" document.getElementById('evidence_img').click()">Chọn ảnh</button>
                                        <div>
                                            <img id="frame" src="{{ !empty($order->evidence_img) ? asset($order->evidence_img) : '' }}"
                                                 style="width: 100%;" class="{{ !empty($order->evidence_img) ? '' : 'hidden' }}" alt=""/>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Trạng thái đơn hàng</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="status">
                                        @foreach(\App\Order::STATUS as $status)
                                            <option value="{{ $status['value'] }}" {{ $order->status == $status['value'] ? 'selected' : ''}}>
                                                {{ $status['key'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-success btn-lg" type="submit">Lưu</button>

                        <a href="{{ route('admin.order.export-order', $order->code) }}" class="btn btn-outline-primary d-inline-flex align-items-center m-l-20">
                            <i data-feather="download"></i>
                            <span class="m-l-10">Xuất hóa đơn</span>
                        </a>
                    </div>
                </form>
            </div>

            <div class="card col-sm-6 m-l-10">
                <div class="card-body">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr class="table-primary">
                                    <th>STT</th>
                                    <th colspan="2">Sản phẩm</th>
                                    <th>Đơn giá (VNĐ)</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền (VNĐ)</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($order->orderDetails as $key => $detail)
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

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
@endsection
