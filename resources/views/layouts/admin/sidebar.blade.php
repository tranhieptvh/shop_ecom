<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="{{route('/admin')}}">
                <img class="img-fluid for-light main-logo" src="{{asset('assets/images/logo/main-logo.png')}}" alt="">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == 'admin/dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard.index') }}">
                            <i data-feather="home"></i>
                            <span class="lan-3">Dashboards</span>
                            <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <?php $a = 1; ?>
                        <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == 'admin/user' ? 'active' : '' }}" href="{{ route('admin.user.index') }}">
                            <i class="fa fa-users"></i>
                            <span class="lan-3">Quản lý User</span>
                            <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == 'admin/category' ? 'active' : '' }}" href="{{ route('admin.category.index') }}">
                            <i data-feather="list"></i>
                            <span class="lan-3">Quản lý danh mục sản phẩm</span>
                            <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <?php $a = 1; ?>
                        <a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == 'admin/product' ? 'active' : '' }}" href="{{ route('admin.product.index') }}">
                            <i class="fa fa-product-hunt"></i>
                            <span class="lan-3">Quản lý sản phẩm</span>
                            <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>