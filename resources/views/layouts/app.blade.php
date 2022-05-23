<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('plugins/images/favicon.png') }}">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>

<body>
    
        <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
                data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
                @guest
                    @yield('content')
                @else
                    <div id="app">
                            @include('layouts.header')
                            @include('layouts.sidebar')
                            <div class="page-wrapper">
                                <main class="py-4" style="min-height: 80vh">
                                    @yield('content')
                                </main>
                                    <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                                        <div class="container">
                                            <a class="navbar-brand" href="{{ url('/') }}">
                                                {{ config('app.name', 'Laravel') }}
                                            </a>
                                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                                <span class="navbar-toggler-icon"></span>
                                            </button>

                                            <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
                                                <!-- Left Side Of Navbar -->
                                            <!-- <ul class="navbar-nav me-auto">

                                                </ul>-->

                                                <!-- Right Side Of Navbar -->
                                                <!--<ul class="navbar-nav ms-auto">
                                                    <!-- Authentication Links -->
                                            <!--     @guest
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
                                                        <li class="nav-item dropdown">
                                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                                {{ Auth::user()->name }}
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();">
                                                                    {{ __('Logout') }}
                                                                </a>

                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                    @csrf
                                                                </form>
                                                            </div>
                                                        </li>
                                                    @endguest
                                                </ul>
                                            </div>
                                        </div>
                                    </nav> -->
                                    <!-- ============================================================== -->
                                    <!-- End Container fluid  -->
                                    <!-- ============================================================== -->
                                    @include('layouts.footer')
                                    <!-- ============================================================== -->
                                    <!-- End footer -->
                                    <!-- ============================================================== -->
                            </div>
                    </div>
                @endguest
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    @include('layouts.script')
    <!-- Page JS -->
    @stack('script')
</body>
</html>
