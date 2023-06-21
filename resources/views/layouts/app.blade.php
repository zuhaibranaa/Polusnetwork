<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/img/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <!-- <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/responsive.css') }}"> -->
    @vite(['resources/sass/app.scss'])
</head>

<body class="home-01">

    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
    <!-- Preloader -->

    <!-- header-area -->
    <header id="header">
        <div id="header-fixed-height"></div>
        <div id="sticky-header" class="menu-area sticky-white-header">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <div class="menu-wrap">
                            <nav class="menu-nav">
                                <div class="logo">
                                    <a href="index.html"><img style="max-height: 65px"
                                            src="{{ asset('/img/logo/icon.svg') }}" alt=""></a>
                                </div>
                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li class="{{ Request::is('/') ? 'active' : '' }}"><a
                                                href="{{ url('/') }}" class="section-link">Home</a></li>
                                        <li class="{{ Request::is('test') ? 'active' : '' }}">
                                            <a href="{{ url('/test') }}" class="section-link">Stake Polus Network</a>
                                        </li>
                                        <li class="{{ Request::is('howitworks') ? 'active' : '' }}">
                                            <a href="{{ url('/howitworks') }}" class="section-link">How It Works</a>
                                        </li>
                                        <li class="{{ Request::is('about') ? 'active' : '' }} ">
                                            <a href="{{ url('/about') }}" class="section-link">About us</a>
                                        </li>
                                        <li class="{{ Request::is('contact') ? 'active' : '' }}">
                                            <a href="{{ url('/contact') }}" class="section-link">Contact Us</a>
                                        </li>
                                    </ul>
                                </div>


                                @guest
                                    @if (Route::has('login'))
                                        <div class="header-action d-none d-md-block">
                                            <ul>
                                                <li class="header-btn header_main_btn"><a href="{{ route('login') }}"
                                                        class="btn">{{ __('Sign In') }}</a></li>
                                            </ul>
                                        </div>
                                    @endif

                                    @if (Route::has('register'))
                                        <div class="header-action d-none d-md-block">
                                            <ul>
                                                <li class="header-btn header_main_btn"><a href="{{ route('register') }}"
                                                        class="btn">{{ __('Sign Up') }}</a></li>
                                            </ul>
                                        </div>
                                    @endif
                                @else
                                    <li class="header-btn header_main_btn">
                                        <a id="navbarDropdown" class="btn nav-link dropdown-toggle" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest


                            </nav>
                        </div>
                        <!-- Mobile Menu  -->
                        <div class="mobile-menu">
                            <nav class="menu-box">
                                <div class="close-btn"><i class="fas fa-times"></i></div>
                                <div class="nav-logo"><a href="index.html"><img
                                            src="{{ asset('img/logo/icon.svg') }}" alt=""
                                            title=""></a>
                                </div>
                                <div class="menu-outer">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-area-end -->
    @yield('content')
    <!-- footer-area -->
    <footer>
        <div class="footer-area">
            <div class="container">
                <div class="footer-scroll-wrap">
                    <button class="scroll-to-target" data-target="html"><i class="fas fa-arrow-up"></i></button>
                </div>
                <div class="footer-top">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="footer-widget wow fadeInUp" data-wow-delay=".2s">
                                <a href="index.html" class="f-logo"><img src="{{ asset('/img/logo/icon.svg') }}"
                                        alt=""></a>
                                <div class="footer-content">
                                    <p>A new way to make the payments easy, reliable and 100% secure. claritatem
                                        itamconse quat. Exerci tationulla</p>
                                    <ul class="footer-social">
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-skype"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-5 col-sm-6">
                            <div class="footer-widget  wow fadeInUp" data-wow-delay=".4s">
                                <h4 class="fw-title">Useful Links</h4>
                                <div class="footer-link">
                                    <ul>
                                        <li><a href="#">Contact us</a></li>
                                        <li><a href="#">How it Works</a></li>
                                        <li><a href="#">Create</a></li>
                                        <li><a href="#">Explore</a></li>
                                        <li><a href="#">Terms & Services</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-sm-6">
                            <div class="footer-widget wow fadeInUp" data-wow-delay=".6s">
                                <h4 class="fw-title">Community</h4>
                                <div class="footer-link">
                                    <ul>
                                        <li><a href="#">Help Center</a></li>
                                        <li><a href="#">Partners</a></li>
                                        <li><a href="#">Suggestions</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Newsletters</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="footer-widget wow fadeInUp" data-wow-delay=".8s">
                                <h4 class="fw-title">Subscribe Newsletter</h4>
                                <div class="footer-newsletter">
                                    <p>Exerci tation ullamcorper suscipit lobortis nisl aliquip ex ea commodo</p>
                                    <form action="#">
                                        <input type="email" placeholder="Info@gmail.com" required>
                                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- footer-area-end -->

    <!-- JS here -->
    @vite(['resources/js/app.js'])
    @yield('belowfooter')
</body>

</html>
