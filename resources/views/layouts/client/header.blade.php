<header class="header shop">
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ route('/') }}"><img src="{{ asset('logo/logo_dark.png') }}" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="javascript:void(0)"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form search-header">
                                <input type="text" placeholder="Tìm kiếm..." name="keyword" value="{{ !empty($_GET['keyword']) ? $_GET['keyword'] : ''}}">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <form action="{{ route('client.product.index') }}" class="search-header">
                                <input type="text" name="keyword" placeholder="Tìm kiếm..." value="{{ !empty($_GET['keyword']) ? $_GET['keyword'] : ''}}">
                                <button class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <div class="sinlge-bar profile">
                            @if (Auth::user())
                                <a href="{{ route('client.user.profile') }}">
                                    <div class="avatar" style="background-image: url({{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('assets/images/dashboard/profile.jpg') }})"></div> &nbsp;
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                            @else
                                <a href="{{ route('client.auth.index') }}" class="single-icon"><span style="font-size: 15px;">Đăng nhập</span> &nbsp; <i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                            @endif
                        </div>
                        <div class="sinlge-bar shopping">
                            <a href="{{ route('client.cart') }}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{ $total_cart_quantity }}</span></a>
                            <!-- Shopping Item -->
{{--                            <div class="shopping-item">--}}
{{--                                <div class="dropdown-cart-header">--}}
{{--                                    <span>2 Items</span>--}}
{{--                                    <a href="#">View Cart</a>--}}
{{--                                </div>--}}
{{--                                <ul class="shopping-list">--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>--}}
{{--                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>--}}
{{--                                        <h4><a href="#">Woman Ring</a></h4>--}}
{{--                                        <p class="quantity">1x - <span class="amount">$99.00</span></p>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>--}}
{{--                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>--}}
{{--                                        <h4><a href="#">Woman Necklace</a></h4>--}}
{{--                                        <p class="quantity">1x - <span class="amount">$35.00</span></p>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <div class="bottom">--}}
{{--                                    <div class="total">--}}
{{--                                        <span>Total</span>--}}
{{--                                        <span class="total-amount">$134.00</span>--}}
{{--                                    </div>--}}
{{--                                    <a href="checkout.html" class="btn animate">Checkout</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{ request()->route()->getName() == '/' ? 'active' : '' }}"><a href="{{ route('/') }}">Trang chủ</a></li>
                                            @foreach($categories_menu as $category)
                                                <li><a href="{{ route('client.product.category', $category->slug) }}">
                                                        {{ $category->name }}
                                                        @if(!empty( $category->child->toArray()))
                                                            <i class="ti-angle-down"></i>
                                                        @endif
                                                    </a>
                                                    @if(!empty( $category->child->toArray()))
                                                        <div class="dropdown">
                                                            @foreach($category->child as $child_category)
                                                                <div class="sub-menu">
                                                                    <ul class="sub-menu-head"><li>
                                                                            <a href="{{ route('client.product.category', $child_category->slug) }}">
                                                                                {{ $child_category->name }}</a></li></ul>
                                                                    <ul>
                                                                        @foreach($child_category->child as $item)
                                                                            <li><a href="{{ route('client.product.category', $item->slug) }}">
                                                                                    {{ $item->name }}</a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </li>
                                            @endforeach
                                            <li><a href="{{ route('client.contact') }}">Liên hệ</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
