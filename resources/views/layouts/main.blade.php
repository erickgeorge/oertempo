<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }} | Homepage</title>
    <!-- Stylesheets -->
    <link href="{{ asset('layout/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('layout/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('layout/css/responsive.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('logo_ud.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('logo_ud.png') }}" type="image/x-icon">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Titillium+Web:wght@300;400;600;700;900&display=swap"
        rel="stylesheet">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="{{ asset('layout/js/respond.js') }}"></script><![endif]-->
</head>

<body>

    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Main Header-->
        <header class="main-header header-style-one">

            <!-- Header Top -->
            <div class="header-top">
                <div class="auto-container">
                    <div class="clearfix">

                        <img src="{{ asset('OER.svg') }}" alt="">

                    </div>
                </div>
            </div>

            <!-- Header Upper -->
            <div class="header-upper">
                <div class="auto-container">
                    <div class="clearfix">



                        <div class="nav-outer clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                            <!-- Main Menu -->
                            <nav class="main-menu show navbar-expand-md">
                                <div class="navbar-header">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li><a href="/">Home</a>
                                        </li>
                                        <li><a href="{{ route('courses') }}">Resources</a>

                                        </li>
                                        <li><a href="{{ route('categoriesView') }}">Categories</a>
                                        </li>
                                        <li><a href="{{ route('login') }}">Login</a>

                                        </li>
                                    </ul>
                                </div>

                            </nav>

                        </div>

                    </div>
                </div>
            </div>
            <!-- End Header Upper -->

            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

                <nav class="menu-box">
                    <div class="nav-logo"><a href="/"><img src="{{ asset('logo_ud.png') }}" alt=""
                                title=""></a></div>
                    <div class="menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>
                </nav>
            </div>
            <!-- End Mobile Menu -->

        </header>
        <!-- End Main Header -->
        {{-- Content start --}}

        @yield('content')

        {{-- Content ends --}}

        <!-- Call To Action Section Two -->
        <section class="call-to-action-section-two"
            style="background-image: url({{ asset('layout/images/background/3.png') }})">
            <div class="auto-container">
                <div class="content">
                    <h2>Ready to get started?</h2>
                    <div class="text">Replenish him third creature and meat blessed void a fruit gathered you’re,
                        they’re two <br> waters own morning gathered greater shall had behold had seed.</div>
                    <div class="buttons-box">
                        <a href="#" class="theme-btn btn-style-one"><span class="txt">Get Stared <i
                                    class="fa fa-angle-right"></i></span></a>
                        <a href="{{ route('courses') }}" class="theme-btn btn-style-two"><span class="txt">All
                                Contents <i class="fa fa-angle-right"></i></span></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Call To Action Section Two -->

        <!--Main Footer-->
        <footer class="main-footer">
            <!-- Pattern Layer -->

            <div class="auto-container">

                <!-- Widgets Section -->
                <div class="widgets-section">
                    <div class="row clearfix">

                        <!-- Big Column -->
                        <div class="big-column col-lg-6 col-md-12 col-sm-12">
                            <div class="row clearfix">

                                <!--Footer Column-->
                                <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                                    <div class="footer-widget logo-widget justify-content-center text-center">
                                        <div class="logo">
                                            <a href="/">
                                                <img src="{{ asset('logo_ud.png') }}" width="120px"
                                                    alt="" /></a>
                                        </div>
                                        <div class="text">
                                            <h4>University of Dar es salaam</h4>
                                            <h6>Open Educational Resources</h6>
                                        </div>
                                        <div class="copyright">Copyright &copy;  <?php echo date('Y'); ?> UDSM</div>
                                    </div>
                                </div>

                                <!--Footer Column-->
                                <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                                    <div class="footer-widget links-widget">
                                        <h4>About Us</h4>
                                        <ul class="links-widget">
                                            <li><a href="#">Afficiates</a></li>
                                            <li><a href="#">Partners</a></li>
                                            <li><a href="#">Reviews</a></li>
                                            <li><a href="#">Blogs</a></li>
                                            <li><a href="#">Newsletter</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Big Column -->
                        <div class="big-column col-lg-6 col-md-12 col-sm-12">
                            <div class="row clearfix">

                                <!--Footer Column-->
                                <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget links-widget">
                                        <h4>Resource</h4>
                                        <ul class="links-widget">
                                            <li><a href="http://journals.udsm.ac.tz/">Journals</a></li>
                                            <li><a href="http://196.44.162.10:8080/xmlui/">Research Repository</a></li>
                                            <li><a href="https://www.udsm.ac.tz/web/index.php/institutes/library">Library
                                                    Services</a></li>
                                            <li><a href="http://alumni.udsm.ac.tz/">Alumni</a></li>
                                            <li><a href="https://www.udsm.ac.tz/web/index.php/bureaus/qab">QAB</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <!--Footer Column-->
                                <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget links-widget">
                                        <h4>Quick Links</h4>
                                        <ul class="links-widget">
                                            <li><a href="#">Undergraduate Prospectus</a></li>
                                            <li><a href="#">Postgraduate prospectus</a></li>
                                            <li><a href="#">Forms and downloads</a></li>
                                            <li><a href="#">Variour speeches</a></li>
                                            <li><a href="#">List of academic advisors</a></li>
                                            <li><a href="#">Almanac</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </footer>

    </div>
    <!--End pagewrapper-->

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-up"></span></div>

    <script src="{{ asset('layout/js/jquery.js') }}"></script>
    <script src="{{ asset('layout/js/popper.min.js') }}"></script>
    <script src="{{ asset('layout/js/jquery.scrollTo.js') }}"></script>
    <script src="{{ asset('layout/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('layout/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('layout/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('layout/js/appear.js') }}"></script>
    <script src="{{ asset('layout/js/swiper.min.js') }}"></script>
    <script src="{{ asset('layout/js/element-in-view.js') }}"></script>
    <script src="{{ asset('layout/js/jquery.paroller.min.js') }}"></script>
    <script src="{{ asset('layout/js/parallax.min.js') }}"></script>
    <script src="{{ asset('layout/js/tilt.jquery.min.js') }}"></script>
    <!--Master Slider-->
    <script src="{{ asset('layout/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('layout/js/owl.js') }}"></script>
    <script src="{{ asset('layout/js/wow.js') }}"></script>
    <script src="{{ asset('layout/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('layout/js/script.js') }}"></script>
    <script src="{{ asset('layout/js/search.js') }}"></script>

</body>

</html>
