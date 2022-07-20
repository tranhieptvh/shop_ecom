@extends('layouts.admin.master')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Quản lý đơn hàng</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Quản lý đơn hàng</li>
@endsection

@section('content')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
        @endif
        <div class="col-sm-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr class="table-primary">
                            <th scope="col">STT</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Tổng tiền (VNĐ)</th>
                            <th scope="col">Phương thức thanh toán</th>
                            <th scope="col">Trạng thái thanh toán</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ number_format($order->total_amount) }}</td>
                                <td>{{ $order->method == \App\Order::METHOD_COD ? 'COD' : 'Banking' }}</td>
                                <td>{{ $order->paid_flg == \App\Order::PAYMENT_UNPAID ? 'Chưa thanh toán' : 'Đã thanh toán' }}</td>
                                <td>
                                    <div style="display: flex;">
                                        <a href="{{ route('admin.order.view', $order->id) }}" class="btn btn-primary btn-sm m-r-5"><i class="fa fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="m-t-30 m-b-20 m-l-10">
                        {!! $orders->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
