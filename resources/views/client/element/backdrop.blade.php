<div class="backdrop-18 d-none"></div>

<div class="popup-confirm d-none">
    <div class="wrap-confirm">
        <img src="{{ asset('logo/logo_dark.png') }}" alt="">
        <hr>

        <div class="content-confirm">
            <p>CÁC SẢN PHẨM CỦA CHÚNG TÔI KHÔNG DÀNH CHO NGƯỜI DƯỚI 18 TUỔI.
                HÃY THƯỞNG THỨC CÓ TRÁCH NHIỆM VÀ KHÔNG LÁI XE KHI ĐÃ UỐNG RƯỢU</p>
            <hr>
            <p>VUI LÒNG XÁC NHẬN ĐỘ TUỔI CỦA BẠN ĐỂ TIẾP TỤC!</p>
        </div>

        <div class="wrap-btn">
            <a href="{{ route('client.could-not-access') }}" class="cf-btn btn btn-outline-danger">Dưới 18 tuổi</a>
            <button class="cf-btn btn btn-outline-success" id="btn-over-18">Trên 18 tuổi</button>
        </div>
    </div>
</div>
