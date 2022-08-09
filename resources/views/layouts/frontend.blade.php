<!DOCTYPE html>
<html lang="tr">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @foreach ($settings as $item)
        <title>@yield('title', $item['title'])</title>
        <meta name="description" content="@yield(' description', $item['description'])">
        <meta name="author" content="@yield('author', $item['author'])">
    @endforeach

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/frontend/assets/frontend/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    @stack('customCss')

</head>


<body>
    <!-- Preloader -->
    <div class="preloader-bg"></div>
    <div id="preloader">
        <div id="preloader-status">
            <div class="preloader-position loader"> <span></span> </div>
        </div>
    </div>
    <!-- Progress scroll totop -->
    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <div class="logo-wrapper navbar-brand valign">
                <a class="logo" href="/anasayfa">
                    <h2>KAMURAN AKBAY<span>MİMARLIK</span></h2>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"><i class="ti-menu"></i></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @foreach ($menus as $item)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is("$item->route") ? 'active' : '' }} "
                                href="{{ $item->route }}">{{ $item->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="content-wrapper">
        @yield('content')
        <!-- Footer section -->

        <section class="clients pt-3 pb-3">
            <div class="container">
                <div class="clients-carousel owl-theme owl-carousel">
                    <div class="clients-logo">
                        <a href=''> <img src="{{ asset('assets/frontend/img/icons/1.png') }}" alt=""></a>
                    </div>

                    <div class="clients-logo">
                        <a href=''> <img src="{{ asset('assets/frontend/img/icons/2.png') }}" alt=""></a>
                    </div>

                    <div class="clients-logo">
                        <a href=''> <img src="{{ asset('assets/frontend/img/icons/3.png') }}" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href=''> <img src="{{ asset('assets/frontend/img/icons/5.png') }}" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href=''> <img src="{{ asset('assets/frontend/img/icons/6.png') }}"
                                alt=""></a>
                    </div>

                    <div class="clients-logo">
                        <a href=''> <img src="{{ asset('assets/frontend/img/icons/7.png') }}"
                                alt=""></a>
                    </div>

                </div>
            </div>
        </section>
        <footer class="main-footer dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-30">
                        <div class="item fotcont">
                            <div class="fothead">
                                <h6>Phone</h6>
                            </div>
                            <p>+1 203-123-0606</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-30">
                        <div class="item fotcont">
                            <div class="fothead">
                                <h6>Email</h6>
                            </div>
                            <p>architecture@info.com</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-30">
                        <div class="item fotcont">
                            <div class="fothead">
                                <h6>Our Address</h6>
                            </div>
                            <p>24 King St, Charleston, SC 29401 USA</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-left">
                                <p>© 2022. All right reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-4 abot">
                            <div class="social-icon"> <a href="index.html"><i class="ti-facebook"></i></a> <a
                                    href="index.html"><i class="ti-twitter"></i></a> <a href="index.html"><i
                                        class="ti-instagram"></i></a> <a href="index.html"><i
                                        class="ti-pinterest"></i></a> </div>
                        </div>
                        <div class="col-md-4">
                            <p class="right"><a href="#">Terms &amp; Conditions</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.isotope.v3.0.2.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/scrollIt.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/YouTubePopUp.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/custom.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.menu-toggle').on('click', function() {
            $('body').toggleClass('open');
        });
    </script>
    @stack('customJs')
</body>

</html>
