@extends('layouts.client.master')

@section('title')
    Chính sách đổi trả
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
                            <li class="active">Chính sách đổi trả</li>
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
                <h2>CHÍNH SÁCH ĐỔI TRẢ</h2>
                <hr>

                <p>Tuân thủ các quy định hiện hành về kinh doanh bán hàng qua mạng, không bán rượu cho người dưới 18 tuổi, luật quảng cáo rượu, website <b>Rubia Shop</b>. không có chức năng đặt hàng qua mạng, chính vì thế xin quý khách hàng vui lòng liên lạc qua Hotline, SMS, Messenger hoặc Zalo cho chúng tôi.</p>
                <p class="mt-3"><b>Rubia Shop</b> cam kết chất lượng sản phẩm bán ra đến giọt cuối cùng. Trong trường hợp quý khách không thích dòng sản phẩm đã mua hoặc muốn đổi sang dòng sản phẩm khác, không vấn đề gì, chúng tôi không giới hạn thời gian đổi trả. Bất cứ lúc nào quý khách cũng có thể mang sản phẩm đến showroom của <b>Rubia Shop</b>.</p>

                <p><b>Rubia Shop</b> chỉ chấp nhận đổi trả nếu sản phẩm vẫn được giữ nguyên vẹn trong trạng thái ban đầu (như không bị bóc tem, rách nhãn, mở seal hoặc ướp lạnh).</p>

                <p><b>Rubia Shop</b> chỉ nhận đổi trả hàng tại showroom.</p>

                <p class="mt-3">Trân trọng.</p>

            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
