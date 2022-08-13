<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>
        @yield('title')
    </title>
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

    @include('client.element.backdrop')

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
                        <div class="menu-item {{ request()->route()->getName() == 'client.user.change-password' ? 'active' : '' }}">
                            <a href="{{ route('client.user.change-password') }}">
                                <i class="ti-key"></i> &nbsp;
                                <span>Đổi mật khẩu</span>
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

    @include('client.element.services')

    @include('layouts.client.footer')

    @include('layouts/client/script')
    @yield('script')

    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "110558835076275");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v14.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

</body>
</html>
