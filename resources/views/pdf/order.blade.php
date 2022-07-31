<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi tiết hóa đơn</title>
</head>
<body>

    <style>
        body {
            font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
        }
    </style>

    <div class="wrap">
        <table>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <h2 style="color: red;">HÓA ĐƠN BÁN HÀNG</h2>
                    <p>Mã: #{{ $data['order']->code }}</p>
                    <p>Ngày mua hàng: {{ date_format( $data['order']->created_at, 'd-m-Y H:i:s') }}</p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top; border-right: 1px solid;">
                    <h4>Người gửi: RUBIA SHOP</h4>
                    <p>Địa chỉ: {{ $data['info']->address }} </p>
                    <p>SĐT: {{ $data['info']->phone }}</p>
                    <p>Email: {{ $data['info']->email }}</p>
                </td>
                <td style="vertical-align: text-top; padding-left: 30px;">
                    <h4>Nguời nhận: {{ $data['order']->name }}</h4>
                    <p>Địa chỉ: {{ $data['order']->address }}</p>
                    <p>SĐT: {{ $data['order']->phone }}</p>
                    <p>Email: {{ $data['order']->email }}</p>
                    <p>Ghi chú: {{ $data['order']->note }}</p>
                </td>
            </tr>
        </table>

        <div class="content">
            <h4>Chi tiết:</h4>
            <div class="table-wrap">
                <table style="border: 1px solid; width: 100%; border-collapse: collapse; text-align: center;">
                    <thead>
                    <tr>
                        <th style="border: 1px solid;">STT</th>
                        <th style="border: 1px solid;">Tên sản phẩm</th>
                        <th style="border: 1px solid;">Đơn giá (VNĐ)</th>
                        <th style="border: 1px solid;">Số lượng</th>
                        <th style="border: 1px solid;">Thành tiền (VNĐ)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['order_details'] as $key => $detail)
                        <tr>
                            <td style="border: 1px solid;">{{ $key + 1 }}</td>
                            <td style="border: 1px solid;">{{ $detail->product->name }}</td>
                            <td style="border: 1px solid;">{{ number_format($detail->price) }}</td>
                            <td style="border: 1px solid;">{{ $detail->quantity }}</td>
                            <td style="border: 1px solid;">{{ number_format($detail->price * $detail->quantity) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4" style="border: 1px solid;"><b>Hóa đơn (VNĐ)</b></td>
                        <td style="border: 1px solid;"><b>{{ number_format($data['order']->total_amount) }}</b></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="border: 1px solid;"><b>Ship</b></td>
                        <td style="border: 1px solid;"><b>Free</b></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="border: 1px solid;"><b>VAT ({{ $data['info']->vat }}%) (VNĐ)</b></td>
                        <td style="border: 1px solid;"><b>{{ number_format($data['order']->total_amount * $data['info']->vat / 100) }}</b></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="border: 1px solid;"><b>Đã thanh toán (VNĐ)</b></td>
                        <td style="border: 1px solid;">
                            <b>
                                {{ $data['order']->paid_flg == \App\Order::PAYMENT['PAID']['value'] ? number_format($data['order']->total) : 0 }}
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="border: 1px solid;"><span style="color: red;"><b>Tổng (VNĐ)</b></span></td>
                        <td style="border: 1px solid;">
                            <span style="color: red;">
                                <b>
                                    {{ $data['order']->paid_flg == \App\Order::PAYMENT['PAID']['value'] ? 0 : number_format($data['order']->total) }}
                                </b>
                            </span>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
