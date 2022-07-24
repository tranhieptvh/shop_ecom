<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>TVH Shop</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('logo/favicon.png')}}">
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- StyleSheet -->
    @include('layouts/client/css')
    @yield('style')

</head>
<body class="js">

<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>

@include('layouts.client.header')

@yield('breadcrumbs')

<div class="section-profile">
    <div class="container">
        <div class="row col-12 pt-5 pb-5">
            <div class="col-3 menu-col">

                <div class="wrap-menu">
                    <div class="menu-item {{ request()->route()->getName() == 'client.user.profile' ? 'active' : '' }}">
                        <a href="{{ route('client.user.profile') }}">
                            <i class="ti-user"></i> &nbsp;
                            <span>Thông tin cá nhân</span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->route()->getName() == 'client.user.purchase' ? 'active' : '' }}">
                        <a href="{{ route('client.user.purchase') }}">
                            <i class="ti-receipt"></i> &nbsp;
                            <span>Danh sách đơn hàng</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('client.auth.logout') }}">
                            <i class="ti-arrow-right"></i> &nbsp;
                            <span>Đăng xuất</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-9 main-col">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Miễn phí giao hàng</h4>
                    <p>Nội thành Hà Nội</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Miễn phí đổi hàng</h4>
                    <p>Trong vòng 7 ngày</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Giao dịch an toàn</h4>
                    <p>Đảm bảo 100%</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Lựa chọn xứng đáng</h4>
                    <p>Giá cả tốt nhất</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.client.footer')

@include('layouts/client/script')
@yield('script')

</body>
</html>
