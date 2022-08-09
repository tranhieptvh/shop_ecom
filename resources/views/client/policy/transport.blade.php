@extends('layouts.client.master')

@section('title')
    Chính sách giao hàng
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
                            <li class="active">Chính sách giao hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="contact mt-3 mb-5">
        <div class="container">
            <div class="row col-12">
                <h2>CHÍNH SÁCH GIAO HÀNG</h2>
                <hr>

                <p>Tuân thủ các quy định hiện hành về kinh doanh bán hàng qua mạng, không bán rượu cho người dưới 18 tuổi, luật quảng cáo rượu, website <b>Rubia Shop</b>. không có chức năng đặt hàng qua mạng, chính vì thế xin quý khách hàng vui lòng liên lạc qua Hotline, SMS, Messenger hoặc Zalo cho chúng tôi.</p>
                <p class="mt-3"><b>Rubia Shop xin cam kết:</b></p>

                <ul>
                    <li>Giao hàng nhanh.</li>
                    <li>Giao hàng miễn phí trong giờ hành chính khu vực nội thành Hà Nội</li>
                    <li>Giao hàng ngoại thành Hà Nội và phụ cận với mức giá hợp lý.</li>
                    <li>Giao hàng đến các nơi xa hơn thông qua các dịch vụ giao hàng trung gian mà quý khách chỉ định.</li>
                </ul>

                <p class="mt-3">Chúng tôi cam kết sẽ giao hàng cho quý khách đúng nơi, đúng hẹn theo yêu cầu, ngay cả trong các kỳ nghỉ hay lễ Tết. Cho dù quý khách ở nhà hay đang trên bàn tiệc, chỉ cần gọi điện cho Rubia Shop.</p>

                <p class="mt-3">Trân trọng.</p>

            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
