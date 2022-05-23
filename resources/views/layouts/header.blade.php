<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="dashboard.html">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('plugins/images/logo-icon.png') }}" alt="homepage" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    <img src="{{ asset('plugins/images/logo-text.png') }}" alt="homepage" />
                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav ms-auto d-flex align-items-center">

                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class=" in">
                    <form role="search" class="app-search d-none d-md-block me-3">
                        <input type="text" placeholder="Search..." class="form-control mt-0">
                        <a href="" class="active">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li>
                    <a class="profile-pic" href="#">
                        <img src="{{ asset('plugins/images/users/varun.jpg') }}" alt="user-img" width="36"
                            class="img-circle"><span class="text-white font-medium"> {{ ucfirst(Auth::user()->name) }}</span></a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"   onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                        <span class="text-white font-medium"> {{ __('Logout') }} </span>
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @endguest
                <!-- ============================================================== -->
                <!-- End User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>