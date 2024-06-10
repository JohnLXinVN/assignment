@extends ('layouts.master')

@section('title')
    Trang Chủ
@endsection

@section('content')
    <section class="binduz-er-trending-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="binduz-er-trending-news-topbar d-block d-md-flex justify-content-between align-items-center">
                        <div class="binduz-er-trending-box">
                            <div class="binduz-er-title">
                                <h3 class="binduz-er-title">Tin tức thịnh hành</h3>
                            </div>
                        </div>

                        <div class="binduz-er-news-tab-btn d-flex justify-content-md-end justify-content-start">

                            <!-- FORECH DANH MỤC-->
                            <!-- @foreach ($category as $item)
    <ul class="nav nav-pills " id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="pills-1-tab" data-bs-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">{{ $item['name'] }}</a>
                                </li>
                            </ul>
    @endforeach -->
                            <!-- FORECH DANH MỤC-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="binduz-er-trending-news-list">
                                <div class="tab-content mt-50" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-1" role="tabpanel"
                                        aria-labelledby="pills-1-tab">
                                        <div class="row">
                                            <div class="col-lg-7 col-md-6">
                                                @foreach ($one as $onenew)
                                                    <div class="binduz-er-trending-box">
                                                        <div class="binduz-er-trending-news-item">
                                                            <a
                                                                href={{ url('products/' . $onenew['id'] . '/ProductDetail') }}>
                                                                <img class="w-5" src="{{ $onenew['image'] }}" alt="">
                                                            </a>
                                                            <div class="binduz-er-trending-news-overlay">
                                                                <div class="binduz-er-trending-news-meta">

                                                                    <div class="binduz-er-meta-date">
                                                                        <span><i
                                                                                class="fal fa-calendar-alt"></i> {{ $onenew['ngay_xuat_ban'] }}
                                                                        </span>
                                                                    </div>
                                                                    <div class="binduz-er-trending-news-title">
                                                                        <h3 class="binduz-er-title"><a
                                                                                href={{ url('products/' . $onenew['id'] . '/ProductDetail') }}>{{ $onenew['title'] }}</a>
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                                <div class="binduz-er-news-share">
                                                                    <a href="#"><i class="fal fa-share"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                            <div class="col-lg-5 col-md-6">
                                                <div class="binduz-er-trending-news-list-item">
                                                    <!-- FORECH 4 BÀI nhiều lượt xem  -->
                                                    @foreach ($news as $post)
                                                        <div class="binduz-er-trending-news-list-box">
                                                            <div class="binduz-er-thumb">
                                                                <a
                                                                    href={{ url('products/' . $post['id'] . '/ProductDetail') }}>
                                                                    <img src="{{ $post['image'] }}" class="img-fluid"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <div class="binduz-er-content">
                                                                <div class="binduz-er-meta-item">
                                                                    <div class="binduz-er-meta-date">
                                                                        <span><i
                                                                                class="fal fa-calendar-alt"></i> {{ $post['ngay_xuat_ban'] }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="binduz-er-trending-news-list-title">
                                                                    <h4 class="binduz-er-title"><a
                                                                            href={{ url('products/' . $post['id'] . '/ProductDetail') }}>{{ $post['title'] }}</a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach


                                                    <!-- FORECH  -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="binduz-er-trending-today-area">
        <div class="binduz-er-bg-cover"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="binduz-er-trending-today-topbar">
                        <div class="binduz-er-trending-today-title">
                            <h3 class="binduz-er-title">Xu hướng hiện nay là gì</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- FORECH TÙY THÍCH -->
                @foreach ($postsrandom as $all)
                    <div class="col-lg-3 col-md-6">

                        <div class="binduz-er-trending-today-item">

                            <div class="binduz-er-trending-news-list-box">
                                <div class="binduz-er-thumb">
                                    <a href={{ url('products/' . $all['id'] . '/ProductDetail') }}>
                                        <img src="{{ $all['image'] }}" alt="">
                                    </a>
                                </div>
                                <div class="binduz-er-content">
                                    <div class="binduz-er-meta-item">
                                        <div class="binduz-er-meta-categories">
                                            <a href="#">Technology</a>
                                        </div>
                                        <div class="binduz-er-meta-date">
                                            <span><i class="fal fa-calendar-alt"> {{ $all['ngay_xuat_ban'] }}</i> </span>
                                        </div>
                                    </div>
                                    <div class="binduz-er-trending-news-list-title">
                                        <h4 class="binduz-er-title"><a
                                                href={{ url('products/' . $all['id'] . '/ProductDetail') }}>{{ $all['title'] }}</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                @endforeach
                <!-- FORECH TÙY THÍCH -->
            </div>
        </div>
    </section>

    <section class="binduz-er-main-posts-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="binduz-er-video-post-topbar">
                        <div class="binduz-er-video-post-title">
                            <h3 class="binduz-er-title">Bài viết mới</h3>
                        </div>
                    </div>
                    <div class="row">
                        <!-- FORECH BÀI VIẾT -->
                        @foreach ($sixnew as $post)
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="binduz-er-main-posts-item">
                                    <div class="binduz-er-trending-news-list-box">
                                        <div class="binduz-er-thumb">
                                            <a href={{ url('products/' . $post['id'] . '/ProductDetail') }}>
                                                <img src="{{ $post['image'] }}" alt="">
                                            </a>
                                        </div>
                                        <div class="binduz-er-content">
                                            <div class="binduz-er-meta-item">
                                                <div class="binduz-er-meta-categories">
                                                    <a href="#">Technology</a>
                                                </div>
                                                <div class="binduz-er-meta-date">
                                                    <span><i class="fal fa-calendar-alt"></i> {{ $post['ngay_xuat_ban'] }}</span>
                                                </div>
                                            </div>
                                            <div class="binduz-er-trending-news-list-title">
                                                <h4 class="binduz-er-title"><a
                                                        href={{ url('products/' . $post['id'] . '/ProductDetail') }}>{{ $post['title'] }}</a>
                                                </h4>
                                                <p>{{ $post['excerpt'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- FORECH BÀI VIẾT -->
                    </div>
                </div>
                <!-- <div class="col-lg-3">
                    <div class="binduz-er-sidebar-about">
                        <div class="binduz-er-sidebar-title">
                            <h4 class="binduz-er-title">Về tôi</h4>
                        </div>
                        <div class="binduz-er-sidebar-about-item">
                            <div class="binduz-er-sidebar-about-user d-flex">
                                <div class="binduz-er-thumb">
                                    <img src="{{ asset('assets') }}/client/images/user.jpg" alt="">
                                </div>
                                <div class="binduz-er-content">
                                    <h4 class="binduz-er-title">ĐỨC ĐẸP TRAI</h4>
                                    <span>Tác giả</span>
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="binduz-er-text">
                                <p>Khía cạnh chức năng được ưu tiên hàng đầu trong quá trình làm việc vì đó là cốt lõi của đối tượng: Mục đích của nó là gì? thứ gì khác?</p>
                                <a class="binduz-er-main-btn" href="#">Kết nối với tôi</a>
                            </div>
                        </div>
                    </div>
                    <div class="binduz-er-sidebar-latest-post">
                        <div class="binduz-er-sidebar-title">
                            <h4 class="binduz-er-title">Bài đăng Mới nhất</h4>
                        </div>
                        <div class="binduz-er-sidebar-latest-post-box">
                            <div class="binduz-er-sidebar-latest-post-item">
                                <div class="binduz-er-thumb">
                                    <img src="{{ asset('assets') }}/client/images/latest-post-1.jpg" alt="latest">
                                </div>
                                <div class="binduz-er-content">
                                    <span><i class="fal fa-calendar-alt"></i> Ngày 24 tháng 2 năm 2020</span>
                                    <h4 class="binduz-er-title"><a href="#">Thời gian trôi nhanh trong bản cập nhật lớn nhất của Google Earth trong</a></h4>
                                </div>
                            </div>
                            <div class="binduz-er-sidebar-latest-post-item">
                                <div class="binduz-er-thumb">
                                    <img src="{{ asset('assets') }}/client/images/latest-post-2.jpg" alt="latest">
                                </div>
                                <div class="binduz-er-content">
                                    <span><i class="fal fa-calendar-alt"></i> Ngày 24 tháng 2 năm 2020</span>
                                    <h4 class="binduz-er-title"><a href="#">3 cách để tìm và hỗ trợ thân thiện với môi trường </a></h4>
                                </div>
                            </div>
                            <div class="binduz-er-sidebar-latest-post-item">
                                <div class="binduz-er-thumb">
                                    <img src="{{ asset('assets') }}/client/images/latest-post-3.jpg" alt="latest">
                                </div>
                                <div class="binduz-er-content">
                                    <span><i class="fal fa-calendar-alt"></i> 24th February 2020</span>
                                    <h4 class="binduz-er-title"><a href="#">How we’re minimizing AI’s carbon footprint</a></h4>
                                </div>
                            </div>
                            <div class="binduz-er-sidebar-latest-post-item">
                                <div class="binduz-er-thumb">
                                    <img src="{{ asset('assets') }}/client/images/latest-post-4.jpg" alt="latest">
                                </div>
                                <div class="binduz-er-content">
                                    <span><i class="fal fa-calendar-alt"></i> 24th February 2020</span>
                                    <h4 class="binduz-er-title"><a href="#">Your Chromebook gets a little more helpful</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
@endsection
