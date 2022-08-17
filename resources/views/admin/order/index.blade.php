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
        <div class="col-sm-12 mb-2 d-flex justify-content-center align-items-baseline">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
                <form action="">
                    <div>
                        <label>
                            Trạng thái thanh toán
                            <select class="form-select" name="paid_flg">
                                <option value="">--- Chọn</option>
                                @foreach(\App\Order::PAYMENT as $payment)
                                    <option value="{{ $payment['value'] }}" {{ (isset($_GET['paid_flg']) && $payment['value'] === $_GET['paid_flg']) ? 'selected' : ''}}>
                                        {{ $payment['key'] }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        <label>
                            Trạng thái đơn hàng
                            <select class="form-select" name="status">
                                <option value="">--- Chọn</option>
                                @foreach(\App\Order::STATUS as $status)
                                    <option value="{{ $status['value'] }}" {{ (isset($_GET['status']) && $status['value'] === $_GET['status']) ? 'selected' : ''}}>
                                        {{ $status['key'] }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        <label>
                            Từ
                            <div class="date-range-picker">
                                <div class="input-group date" id="dt-date" data-target-input="nearest">
                                    <input class="form-control search-date" type="text" name="date_from">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </label>
                        <label>
                            Đến
                            <div class="date-range-picker">
                                <div class="input-group date" id="dt-date" data-target-input="nearest">
                                    <input class="form-control search-date" type="text" name="date_to">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </label>
                    </div>

                    <div>
                        <label>
                            Mã đơn hàng
                            <input type="text" name="code" class="form-control" value="{{ !empty($_GET['code']) ? $_GET['code'] : '' }}">
                        </label>
                        <label>
                            Số điện thoại
                            <input type="text" name="phone" class="form-control" value="{{ !empty($_GET['phone']) ? $_GET['phone'] : '' }}">
                        </label>

                        <label>
                            Email
                            <input type="text" name="email" class="form-control" value="{{ !empty($_GET['email']) ? $_GET['email'] : '' }}">
                        </label>

                        <label>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </label>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                        <tr class="table-primary">
                            <th scope="col">STT</th>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Tổng tiền (VNĐ)</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Phương thức thanh toán</th>
                            <th scope="col">Trạng thái thanh toán</th>
                            <th scope="col">Trạng thái đơn hàng</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>#{{ $order->code }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ number_format($order->total + $order->ship_fee) }}</td>
                                <td>{{ date_format($order->created_at, 'd-m-Y H:i:s') }}</td>
                                <td>
                                    {{ $order->method == \App\Order::METHOD['COD']['value'] ? \App\Order::METHOD['COD']['key'] : \App\Order::METHOD['BANKING']['key'] }}
                                </td>
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
                                <td>
                                    <div>
                                        <a href="{{ route('admin.order.view', $order->code) }}" class="btn btn-primary btn-sm m-r-5"><i class="fa fa-eye"></i></a>
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
    <script>
        $(function() {
            let date_form = $('input[name="date_from"]');
            let date_to = $('input[name="date_to"]');

            date_form.daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,
                locale: {
                    format: 'DD-MM-YYYY'
                }
            });
            date_form.on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD-MM-YYYY'));
            });

            date_to.daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,
                locale: {
                    format: 'DD-MM-YYYY'
                }
            });
            date_to.on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD-MM-YYYY'));
            });
        });
    </script>
@endsection
