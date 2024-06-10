@extends('layouts.master')
@section('title')
    Đăng nhập
@endsection

@section('content')
    <!-- Mirrored from themesdesign.in/heyauth/layouts/signin-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Jun 2024 01:08:29 GMT -->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Đăng nhập</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Themesdesign" />

        <link rel="shortcut icon" href="images/favicon.ico">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{ asset('assets/client/css/bootstrap.min.css') }}" type="text/css">

        <!--Material Icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/css/materialdesignicons.min.css') }}" />

        <!-- Custom  Css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/css/style.css') }}" />

    </head>

    <body>

        <!-- START -->
        <div class="account-pages">
            <div class="container">
                <div class="row g-0 bg-white align-items-center">

                    <div class="col-lg-6">
                        <div class="bg-login">
                            <div class="bg-overlay"></div>
                            <img src="https://mediaengagement.org/wp-content/uploads/2022/12/News-Desert-Web-Tile-1-600x355.png"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-lg-6">
                        <div class="auth-box">
                            <div class="mb-4 mb-md-5 text-center">
                                <a href="javascript:void(0);" class="auth-logo">
                                    <img src="{{ asset('../Client/images/logo-dark.png') }}" alt="">

                                </a>
                            </div>

                            <div class="auth-content">
                                <div class="mb-3 pb-3 text-center">
                                    <h4 class="fw-normal">Welcome to <span class="fw-bold">my website</span></h4>
                                    <p class="text-muted mb-0">Đăng nhập để tiếp tục tới website.</p>
                                </div>
                                @if (!empty($_SESSION['error']))
                                    <div class="mb-3 alert alert-warning">
                                        {{ $_SESSION['error'] }}
                                    </div>
                                    @php
                                        unset($_SESSION['error']);
                                    @endphp
                                @endif
                                <form class="form-custom mt-3" action="{{ url('handle-login') }}" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Email</label>
                                        <input type="email" name="email" class="form-control" id="username"
                                            placeholder="Enter email">
                                    </div>

                                    <div class="form-password mb-3 auth-pass-inputgroup">
                                        <label class="form-label" for="userpassword">Mật khẩu</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control" name="password" id="password-input"
                                                placeholder="Enter password">
                                            <button type="button"
                                                class="btn btn-link position-absolute h-100 end-0 top-0 shadow-none"
                                                id="password-addon">
                                                <i class="mdi mdi-eye-outline f-16 text-muted"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <div class="form-checkbox">
                                                <input type="checkbox" class="form-check-input me-1 shadow-none"
                                                    id="customControlInline">
                                                <label class="form-label text-muted f-15 fw-medium"
                                                    for="customControlInline">Nhớ mật khẩu</label>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-sm-6 text-end">
                                            <a href="recover-pass-1.html" class="text-muted f-15 fw-medium"><i
                                                    class="mdi mdi-lock"></i> Quên mật khẩu?</a>
                                        </div><!-- end col -->
                                    </div><!-- end row -->

                                    <div class="text-center mt-3">
                                        <button class="btn btn-success shadow-none w-50 rounded-pill" type="submit">Đăng
                                            nhập</button>
                                    </div>
                                    <hr>
                                    <div class="mt-3 text-center">
                                        <p class="mb-0 text-muted">Bạn chưa có tài khoản?<a href="{{ url('logup') }}"
                                                class="text-success fw-bold text-decoraton-underline ms-1"> Đăng ký
                                            </a></p>
                                    </div>
                                </form>
                                <!-- end -->
                                <div class="row justify-content-center align-items-center mt-4 mt-md-5 ">
                                    <div class="col-4">
                                        <div class="client-images my-3 my-md-0">
                                            <img src="images/img-1.png" class="mx-auto d-block img-fluid" alt="logo-img">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-4">
                                        <div class="client-images my-3 my-md-0">
                                            <img src="images/img-2.png" class="mx-auto d-block img-fluid" alt="logo-img">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-4">
                                        <div class="client-images my-3 my-md-0">
                                            <img src="images/img-3.png" class="mx-auto d-block img-fluid" alt="logo-img">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div><!-- end row -->
                            </div><!-- auth content -->
                        </div>
                        <!-- end authbox -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>>
        <!-- END -->

        <!-- bootstrap -->
        <script src="{{ asset('assets/client/js/bootstrap.bundle.min.js') }}"></script>
        <!-- CUSTOM JS -->
        <script src="{{ asset('assets/client/js/app.js') }}"></script>
    </body>


    <!-- Mirrored from themesdesign.in/heyauth/layouts/signin-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Jun 2024 01:08:33 GMT -->

    </html>
@endsection
