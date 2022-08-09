@extends('layouts.client.master')

@section('title')
    Ký gửi & trao đổi
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
                            <li class="active">Ký gửi & trao đổi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="contact-page mt-3 mb-5">
        <div class="container">
            <div class="row col-12">
                <h2>KÝ GỬI & TRAO ĐỔI</h2>
                <hr>

                <p><b>Bạn có rượu cũ không uống?</b> Nhưng bạn vẫn còn băn khoăn nhiều điều nên chưa bán được? Hãy đến với Malt & Co, cho dù bạn ở Hà Nội hay Sài Gòn.</p>
                <ul>
                    <li>Bạn không biết giá bao nhiêu là tốt nhất</li>
                    <li>Bạn lo lắng giao dịch không được bảo mật</li>
                    <li>Bao lo lắng giao dịch không an toàn, sợ bị lừa đảo?</li>
                </ul>

                <h4 class="mt-5 mb-2">Rubia Shop xin cam kết</h4>

                <ul>
                    <li>Giá phù hợp nhất</li>
                    <li>Hoàn toàn giữ kín thông tin cá nhân của bạn cũng như giao dịch</li>
                    <li>Chúng tôi đến tận nơi để giao dịch</li>
                </ul>
                <p>Chúng tôi không chuyên, nhưng đây là một trong những cách giúp chúng tôi phục vụ đông đảo cộng đồng người yêu rượu ở Việt Nam nói chung. Malt & Co luôn muốn hướng tới việc có thể đáp ứng được mọi nhu cầu của khách hàng, trong đó có cả việc được trải nghiệm những chai rượu cũ, hiếm hoặc thỏa mãn thú vui sưu tầm.</p>
                <p>Cũng chính vì thế, chúng tôi không hướng đến những sản phẩm phổ thông dễ tìm kiếm ở bất cứ đâu trên thị trường. Chúng tôi mong muốn nếu bạn có dư hoặc không có nhu cầu, hãy chia sẻ với chúng tôi, với cộng đồng những chai rượu đặc biệt mà bạn có thể vô tình sở hữu. Đó có thể là chai Glenfarclas 25 năm tuổi, cũng có thể là chai Ballantine’s 30 phiên bản cũ, hoặc chỉ đơn giản là chai Bowmore được sản xuất trước năm 1990. Hãy liên hệ với chúng tôi theo <b>Hotline:  {{ $info->phone }}</b></p>

                <h4 class="mt-5 mb-2">Xin hãy chú ý:</h4>

                <ul>
                    <li>Chúng tôi ưu tiên Whisky, tiếp theo là Cognac và Rum</li>
                    <li>Chúng tôi không trao đổi Vang và Vodka</li>
                    <li>Chúng tôi không thu mua vỏ chai, vỏ hộp.</li>
                </ul>

                <h4 class="mt-5 mb-4">Một vài ví dụ tiêu biểu:</h4>

                <div class="example">
                    <img src="{{ asset('uploads/images/contact/Macallan-Archival-Series-289x400.jpg') }}" alt="">
                    <p>Chai Macallan Folio 3 này có thể lên tới 25 triệu VNĐ</p>
                </div>

                <div class="example">
                    <img src="{{ asset('uploads/images/contact/JW-Blue-Cruise-Edition-1L-300x400.jpg') }}" alt="">
                    <p>Johnnie Walker Blue Cruise Edition 1L là phiên bản giới hạn rất hiếm gặp, có thể lên tới gần 10 triệu VNĐ</p>
                </div>

                <div class="example">
                    <img src="{{ asset('uploads/images/contact/Glenmorangie-Port-Wood-Finish-300x400.jpg') }}" alt="">
                    <p>Chai Glenmorangie Port Wood Finish này dù đã cũ nhưng vẫn có giá khoảng 4 triệu VNĐ</p>
                </div>

                <div class="example">
                    <img src="{{ asset('uploads/images/contact/Highland-Park-Single-Cask-Strength-300x400.jpg') }}" alt="">
                    <p>Highland Park Single Cask Strength rất được ưa chuộng tại Mỹ, giá bán khoảng 3 triệu VNĐ</p>
                </div>

                <div class="example">
                    <img src="{{ asset('uploads/images/contact/Port-Ellen-20-300x400.jpg') }}" alt="">
                    <p>Port Ellen 20 – nay nhà máy chưng cất đã ngừng hoạt động, có giá lên tới 40 triệu VNĐ</p>
                </div>

                <div class="example">
                    <img src="{{ asset('uploads/images/contact/Glenfiddich-18-Ancient-Reserved-300x400.jpg') }}" alt="">
                    <p>Glenfiddich 18 Ancient Reserved cũ nhưng hương vị vẫn tuyệt vời – 3,5 triệu VNĐ</p>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
