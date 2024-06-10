<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>News | @yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- href="{{ asset('assets/admin/css/style1.css') }}" -->
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('assets/client/images/favicon.ico')}}" type="image/png">
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('assets/client/css/bootstrap.min.css')}}">
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{asset('assets/client/css/font-awesome.min.css')}}">
    <!--====== nice select css ======-->
    <link rel="stylesheet" href="{{asset('assets/client/css/nice-select.css')}}">
    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('assets/client/css/magnific-popup.css')}}">
    <!--y====== Slick css ======-->
    <link rel="stylesheet" href="{{asset('assets/client/css/slick.css')}}">
    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{asset('assets/client/css/default.css')}}">
    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('assets/client/css/style.css')}}">

    <!--  -->
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/bootstrap.min.css') }}" type="text/css">

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/css/materialdesignicons.min.css') }}" />

    <!-- Custom  Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/css/style.css') }}" />


</head>

<body>
    <!--====== OFFCANVAS MENU PART START ======-->
    <div class="binduz-er-news-off_canvars_overlay"></div>
    <div class="binduz-er-news-offcanvas_menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="binduz-er-news-offcanvas_menu_wrapper">
                        <div class="binduz-er-news-canvas_close">
                            <a href="javascript:void(0)"><i class="fal fa-times"></i></a>
                        </div>
                        <div class="binduz-er-news-header-social">
                            <ul class="text-center">
                                <li><a href="#">facebook</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Skype</a></li>
                            </ul>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="binduz-er-news-offcanvas_main_menu">
                                <li class="binduz-er-news-menu-item-has-children binduz-er-news-active">
                                    <a href="#">Home1111111111111</a>
                                </li>
                                <li class="binduz-er-news-menu-item-has-children">
                                    <a href="archived.html">Archived </a>
                                </li>
                                <li class="binduz-er-news-menu-item-has-children">
                                    <a href="archived.html">Archived </a>
                                </li>
                                <li class="binduz-er-news-menu-item-has-children">
                                    <a href="author.html">Author</a>
                                </li>
                                <li class="binduz-er-news-menu-item-has-children">
                                    <a href="#"> Pages</a>
                                    <ul class="binduz-er-news-sub-menu">
                                        <li><a href="blog-details-1.html">Blog Details 1</a></li>
                                        <li><a href="blog-details-2.html">Blog Details 2</a></li>
                                    </ul>
                                </li>
                                <li class="binduz-er-news-menu-item-has-children">
                                    <a href="about-us.html"> About</a>
                                </li>
                                <li class="binduz-er-news-menu-item-has-children">
                                    <a href="contact.html"> Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="binduz-er-news-offcanvas_footer">
                            <div class="binduz-er-news-logo text-center mb-30 mt-30">
                                <a href="index.html">
                                    <img src="/assets/client/images/logo.png" alt="">
                                </a>
                            </div>
                            <p>I’m Michal Škvarenina, a multi-disciplinary designer currently working at Wild and as a freelance designer.</p>
                            <ul>
                                <li><i class="fas fa-phone"></i> +212 34 45 45 98</li>
                                <li><i class="fas fa-home"></i> Angle Bd Abdelmoumen & rue soumaya, Résidence</li>
                                <li><i class="fas fa-envelope"></i> hello@example.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== OFFCANVAS MENU PART ENDS ======-->

    <!--====== SEARCH PART START ======-->

    <div class="binduz-er-news-search-box">
        <div class="binduz-er-news-search-header">
            <div class="container mt-60">
                <div class="row">
                    <div class="col-6">
                        <img src="/assets/client/images/logo-4.png" alt=""> <!-- search title -->
                    </div>
                    <div class="col-6">
                        <div class="binduz-er-news-search-close float-end">
                            <button class="binduz-er-news-search-close-btn">Close <span></span><span></span></button>
                        </div> <!-- search close -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- search header -->
        <div class="binduz-er-news-search-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="binduz-er-news-search-form">
                            <form action="#">
                                <input type="text" placeholder="Search for Products">
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- search body -->
    </div>

    <!--====== SEARCH PART ENDS ======-->

    <!--====== BINDUZ TOP HEADER PART START ======-->

    <div class="binduz-er-top-header-area">
        <div class="binduz-er-bg-cover"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="binduz-er-topbar-headline">
                        <p><span><i class="fas fa-bolt"></i> Tin tức thịnh hành:</span> <a href="#">Miranda halim đã lan truyền sau khi kết thúc quá trình tập luyện của mình.</a></p>
                        <p><span><i class="fas fa-bolt"></i> Tin tức thịnh hành:</span> <a href="#">Kỷ niệm Nghệ thuật và văn hóa người Mỹ gốc Á Thái Bình Dương</a></p>
                        <p><span><i class="fas fa-bolt"></i> Tin tức thịnh hành:</span> <a href="#">Tôn vinh Tháng Di sản Người Mỹ gốc Á Thái Bình Dương tại Google</a></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="binduz-er-topbar-social d-flex justify-content-end align-items-center">
                        <div class="binduz-er-news-social">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== BINDUZ TOP HEADER PART ENDS ======-->

    <!--====== BINDUZ HEADER PART START ======-->
    @include ('layouts.header')
    <!--====== BINDUZ HEADER PART ENDS ======-->

    <!--====== BINDUZ TRENDING PART START ======-->
    @yield ('content')

    <!--====== BINDUZ MAIN POSTS PART ENDS ======-->

    <!--====== BINDUZ FOOTER PART START ======-->
    @include ('layouts.footer')
    <!--====== BINDUZ FOOTER PART ENDS ======-->

    <!--====== BINDUZ BACK TO TOP PART START ======-->

    <div class="binduz-er-back-to-top">
        <p>BACK TO TOP <i class="fal fa-long-arrow-right"></i></p>
    </div>

    <!--====== BINDUZ BACK TO TOP PART ENDS ======-->
    <!--====== jquery js ======-->
    <script src="{{asset('assets/client/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/client/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!--====== Bootstrap js ======-->
    <script src="{{asset('assets/client/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/client/js/popper.min.js')}}"></script>
    <!--====== Slick js ======-->
    <script src="{{asset('assets/client/js/slick.min.js')}}"></script>
    <!--====== nice select js ======-->
    <script src="{{asset('assets/client/js/jquery.nice-select.min.js')}}"></script>
    <!--====== Isotope js ======-->
    <script src="{{asset('assets/client/js/isotope.pkgd.min.js')}}"></script>
    <!--====== Images Loaded js ======-->
    <script src="{{asset('assets/client/js/imagesloaded.pkgd.min.js')}}"></script>
    <!--====== Magnific Popup js ======-->
    <script src="{{asset('assets/client/js/jquery.magnific-popup.min.js')}}"></script>
    <!--====== Main js ======-->
    <script src="{{asset('assets/client/js/main.js')}}"></script>
    <script src="{{ asset('assets/client/js/bootstrap.bundle.min.js') }}"></script>
    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/client/js/app.js')}}"></script>

</body>

</html>