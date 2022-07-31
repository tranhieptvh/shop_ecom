<footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer about">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('logo/logo_light.png') }}" alt="#"></a>
                        </div>
                        <p class="text">Tuân thủ Nghị định số 185/2013/NĐ-CP của Chính Phủ và Luật Quảng Cáo số 16/2012/QH13 về kinh doanh bán hàng qua mạng. Rubia Shop là trang thông tin chia sẻ kiến thức về rượu ngoại hoạt động phi lợi nhuận. Chúng tôi không kinh doanh trực tiếp trên internet. Vui lòng đến trực tiếp đến các cửa hàng hoặc gọi tới số hotline để được tư vấn. </p>
                        <p class="call">Hotline: <span><a href="tel:0985250657">0985 250 657</a></span></p>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4>Thông tin</h4>
                        <ul>
                            <li><a href="{{ route('client.contact') }}">Liên hệ</a></li>
{{--                            <li><a href="#">Cửa hàng</a></li>--}}
                            <li><a href="{{ route('client.deposit') }}">Ký gửi & trao đổi</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4>Chính sách</h4>
                        <ul>
                            <li><a href="{{ route('client.transport') }}">Chính sách giao hàng</a></li>
                            <li><a href="{{ route('client.refund') }}">Chính sách đổi trả</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer social">
                        <h4>Follow</h4>
                        <!-- Single Widget -->
                        <div class="contact">
                            <ul>
                                <li>Nam Từ Liêm, Hà Nội</li>
                                <li>tranhieptvh@gmail.com</li>
                                <li>0985 250 657</li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                        <ul>
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <div class="copyright">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="left text-center">
                            <p>THƯỞNG THỨC CÓ TRÁCH NGHIỆM</p>
                            <p>Các sản phẩm rượu không dành cho người dưới 18 tuổi và phụ nữ đang mang thai.</p>
                            <p class="mb-0">Copyright {{ date('Y') }} © Rubia Shop. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
