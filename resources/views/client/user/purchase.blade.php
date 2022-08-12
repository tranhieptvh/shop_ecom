@extends('layouts.client.profile')

@section('title')
    Danh sách đơn hàng
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
                            <li class="active">Danh sách đơn hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="wrap-title mb-4 pb-1">
        <h3>Danh sách đơn hàng</h3>
    </div>

    <div class="purchase">
        <table class="table list-order text-center">
            <thead>
                <tr class="heading">
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tổng (+VAT, +ship) (VNĐ)</th>
                    <th>Thời gian đặt hàng</th>
                    <th>Trạng thái thanh toán</th>
                    <th>Trạng thái đơn hàng</th>
                </tr>
            </thead>
            <tbody>
            @if ($orders->count() == 0)
                <tr>
                    <td colspan="5" class="text-center">Chưa có đơn hàng</td>
                </tr>
            @endif
                @foreach($orders as $key => $order)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td> &nbsp;&nbsp;
                            <a href="{{ route('client.user.order-detail', $order->code) }}" target="_blank">#{{ $order->code }}</a>
                        </td>
                        <td>{{ number_format($order->total + $order->ship_fee) }}</td>
                        <td>{{ date_format($order->created_at, 'd-m-Y H:i:s') }}</td>
                        <td>
                            <span class="flag {{ $order->paid_flg == \App\Order::PAYMENT['PAID']['value'] ? 'paid' : 'unpaid'}}">
                                {{ $order->paid_flg == \App\Order::PAYMENT['UNPAID']['value'] ? \App\Order::PAYMENT['UNPAID']['key'] : \App\Order::PAYMENT['PAID']['key'] }}
                            </span>
                        </td>
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
@endsection

@section('script')
@endsection
