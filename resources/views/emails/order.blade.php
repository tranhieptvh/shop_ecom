<div class="wrap" style="width: 600px;">
    <div class="header" style="display: flex; justify-content: space-between;">
        <div class="info" style="margin-right: 50px;">
            <h2>RUBIA SHOP</h2>
            <p>Địa chỉ: {{ $data['info']->address }} </p>
            <p>SĐT: {{ $data['info']->phone }}</p>
            <p>Email: {{ $data['info']->email }}</p>
        </div>

        <div class="order">
            <h2>HÓA ĐƠN BÁN HÀNG</h2>
            <p>Mã: #{{ $data['order']->code }}</p>
            <p>Ngày mua hàng: {{ date_format( $data['order']->created_at, 'd-m-Y H:i:s') }}</p>
        </div>
    </div>

    <div class="content">
        <div class="customer">
            <h3>Thông tin đặt hàng</h3>
            <p>Họ tên người mua: {{ $data['order']->name }}</p>
            <p>Số điện thoại: {{ $data['order']->phone }}</p>
            <p>Email: {{ $data['order']->email }}</p>
            <p>Địa chỉ: {{ $data['order']->address }}</p>
            <p>Ghi chú: {{ $data['order']->note }}</p>
        </div>

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
{{--                <tr>--}}
{{--                    <td colspan="4" style="border: 1px solid;"><b>Ship</b></td>--}}
{{--                    <td style="border: 1px solid;"><b>Free</b></td>--}}
{{--                </tr>--}}
                <tr>
                    <td colspan="4" style="border: 1px solid;"><b>VAT ({{ $data['info']->vat }}%) (VNĐ)</b></td>
                    <td style="border: 1px solid;"><b>{{ number_format($data['order']->total_amount * $data['info']->vat / 100) }}</b></td>
                </tr>
                <tr>
                    <td colspan="4" style="border: 1px solid;"><span style="color: red;"><b>Tổng (VNĐ)</b></span></td>
                    <td style="border: 1px solid;"><span style="color: red;"><b>{{ number_format($data['order']->total) }}</b></span></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
