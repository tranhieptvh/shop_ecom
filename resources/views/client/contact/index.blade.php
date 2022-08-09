@extends('layouts.client.master')

@section('title')
    Liên hệ
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
                            <li class="active">Liên hệ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="contact-page  mt-3 mb-5">
        <div class="container">
            <div class="row col-12">
                <h2>GIỚI THIỆU</h2>
                <hr>

                <p>Bạn có thể tìm thấy rượu ở rất nhiều nơi nhưng chỉ ở <b>Rubia Shop</b>, bạn có thể tìm thấy giá trị thực sự của chai rượu thông qua những câu chuyện, phong cách phục vụ và tư vấn cũng như uy tín và chất lượng đảm bảo của chúng tôi.</p>
                <p><b>Rubia Shop</b> được tạo ra từ những người yêu rượu và muốn chia sẻ đam mê của mình với đông đảo mọi người. Bắt đầu từ năm 2016, khi nhu cầu thưởng thức rượu ngon, và chuẩn đang tăng mạnh nhưng thị trường dường như không thể đáp ứng đủ nhu cầu, những người sáng lập của <b>Rubia Shop</b> đã bắt đầu những bước đi để có thể giúp mọi người có thể tìm được chai rượu mình thích, được trải nghiệm những hương vị mình mong muốn mà không phải tốn quá nhiều tiền bạc hay công sức bỏ ra.</p>
                <p>Thưởng rượu là một văn hóa, là một cái thú, khi người thưởng rượu sẽ được trải nghiệm sự sáng tạo, những tinh túy của đất trời, của thời gian, của con người. Phục vụ người thưởng rượu cũng là niềm vui, sự yêu thích của chúng tôi. Sau gần bốn năm hoạt động, cuối cùng <b>Rubia Shop</b> cũng đã có thể mang đến cho quý khách hàng lượng sản phẩm phong phú, từ whisky đến rượu vang, rượu rum, rượu vodka và cả các loại rượu mùi để pha chế những ly cocktail hảo hạng.</p>
                <p>Bên cạnh đó, <b>Rubia Shop</b> vẫn duy trì chất lượng, đặc biệt là chất lượng dịch vụ để luôn là nơi mua rượu tin cậy của quý khách hàng.</p>
                <p>Đến với chúng tôi, các bạn sẽ tìm được sản phẩm ưng ý nhất với tầm giá hợp lý nhất.</p>

                <h2 class="mt-5">Thông tin liên hệ</h2>
                <hr>

                <p>Quý khách có thể liên hệ với <b>Rubia Shop</b> theo thông tin dưới đây:</p>
                <p><b>Số điện thoại</b>: {{ $info->phone }}</p>
                <p><b>Email</b>: {{ $info->email }}</p>
                <p><b>Địa chỉ</b>: {{ $info->address }}</p>
                <p><b>Hoặc zalo</b>:</p>
                <img src="{{ asset($info->zalo_qr) }}" alt="Zalo QR Code" style="width: 40%;">
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
