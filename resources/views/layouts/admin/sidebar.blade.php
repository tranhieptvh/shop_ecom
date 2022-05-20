<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper text-center">
            <a href="{{route('admin')}}">
                <img class="img-fluid for-light main-logo" src="{{asset('assets/images/logo/logo-dark.png')}}" alt="">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        </div>
{{--        <div class="logo-icon-wrapper"><a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a></div>--}}
        <nav class="sidebar-main">
{{--            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>--}}
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == 'admin/dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard.index') }}">
                            <i data-feather="home"></i>
                            <span class="lan-3">Dashboards</span>
                            <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == 'admin/user' ? 'active' : '' }}" href="{{ route('admin.user.index') }}">
                            <i class="fa fa-users"></i>
                            <span class="lan-3">User</span>
                            <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == 'admin/category' ? 'active' : '' }}" href="{{ route('admin.category.index') }}">
                            <i data-feather="list"></i>
                            <span class="lan-3">Danh mục sản phẩm</span>
                            <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == 'admin/brand' ? 'active' : '' }}" href="{{ route('admin.brand.index') }}">
                            <i data-feather="list"></i>
                            <span class="lan-3">Nhãn hiệu</span>
                            <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == 'admin/product' ? 'active' : '' }}" href="{{ route('admin.product.index') }}">
                            <i data-feather="list"></i>
                            <span class="lan-3">Sản phẩm</span>
                            <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
