<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Specer Template">
    <meta name="keywords" content="Specer, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Specer</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('../frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../frontend/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../frontend/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <div class="header__top--canvas">
            <div class="ht-info">
                <ul>
                    <li>
                        <script>document.write(new Date().getDate());</script>-
                        <script>document.write(new Date().getMonth());</script>-
                        <script>document.write(new Date().getFullYear());</script>
                    </li>
                    <li></li>
                    <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <ul class="main-menu mobile-menu">
            @auth
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/my-profile') }}">My Profile</a></li>
                <li><a href="{{ url('/my-post') }}">My Post</a></li>
                <li><a href="{{ url('/my-coin') }}">Coin</a></li>
                <li><a href="{{ url('/my-blogs') }}">Blogs</a></li>
                <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                <li>

                    <a href="{{ route('user.logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('user-logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="user-logout-form" action="{{ route('user.logout') }}" method="POST"
                            style="display: none;">
                        @csrf
                    </form>

                </li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>

                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endif
            @endauth
        </ul>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header__nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="{{ URL::to('/') }}"><img src="{{ url('frontend/img/logo.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <ul class="main-menu">
                                @auth
                                    <li><a href="{{ url('/home') }}">Home</a></li>
                                    <li><a href="{{ url('/my-profile') }}">My Profile</a></li>
                                    <li><a href="{{ url('/my-post') }}">My Post</a></li>
                                    <li><a href="{{ url('/my-coin') }}">Money</a></li>
                                    <li><a href="{{ url('/my-blogs') }}">Blogs</a></li>
                                    <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                                    <li>

                                        <a href="{{ route('user.logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('user-logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="user-logout-form" action="{{ route('user.logout') }}" method="POST"
                                                style="display: none;">
                                            @csrf
                                        </form>

                                    </li>
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>

                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="canvas-open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->


    <!-- Body Main Content -->
    <main>
        @yield('content')
    </main>
    <!-- Body Main Content End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section set-bg" data-setbg="{{ asset('frontend/img/footer-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="fs-logo">
                        <div class="logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li><i class="fa fa-envelope"></i>info.specer@gmail.com </li>
                            <li><i class="fa fa-copy"></i>1-234-567-89011 </li>
                            <li><i class="fa fa-thumb-tack"></i>T8/480 Collins St, Melbourne VIC 3000, New York </li>
                        </ul>
                        <div class="fs-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-tumblr"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-lg-1">
                    <div class="fs-widget">
                        <h4>SPECER</h4>
                        <ul class="fw-links">
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policies</a></li>
                            <li><a href="#">How To Use</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                        {{-- <ul class="fw-links">
                            <li><a href="#">England</a></li>
                            <li><a href="#">Netherlands</a></li>
                            <li><a href="#">Hungary</a></li>
                            <li><a href="#">Croatia</a></li>
                            <li><a href="#">Poland</a></li>
                        </ul> --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="fs-widget">
                        <h4>Recent Blog</h4>

                        <div class="fw-item">
                            <h5><a href="#">This Section will be available soon</a></h5>
                            {{-- <ul>
                                <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                <li><i class="fa fa-edit"></i> 3 Comment</li>
                            </ul> --}}
                        </div>
                        {{-- <div class="fw-item">
                            <h5><a href="#">Sri Lanka v Australia: Cricket World Cup 2019 – live!</a></h5>
                            <ul>
                                <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                <li><i class="fa fa-edit"></i> 3 Comment</li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright-option">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="co-text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">TAHS</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="co-widget">
                            <ul>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="fa fa-close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{ asset('../frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('../frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('../frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('../frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('../frontend/js/main.js') }}"></script>

    <script>
        $('#myTab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
        })
    </script>

</body>

</html>
