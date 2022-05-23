<div class="page-header">
    <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper col-auto p-0">
{{--            <div class="logo-wrapper"><a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo.png')}}" alt=""></a></div>--}}
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
        </div>
        <div class="nav-right pull-right right-header p-0">
            <ul class="nav-menus">
                <li class="profile-nav onhover-dropdown p-0 me-0">
                    <div class="media profile-media">
                        <div class="avatar" style="background-image: url({{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('assets/images/dashboard/profile.jpg') }})">
                        </div>
                        <div class="media-body">
                            <span>{{ Auth::user()->name }}</span>
                            <p class="mb-0 font-roboto">{{ Auth::user()->role->name }} <i class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>
                        <li><a href="{{ url('/admin/logout') }}"><i data-feather="log-in"> </i><span>Đăng xuất</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
