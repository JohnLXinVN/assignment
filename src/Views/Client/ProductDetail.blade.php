@extends ('layouts.master')


@section('title')
Chi tiết
@endsection

@section('content')

<div class="binduz-er-breadcrumb-area">
    <div class=" container">
        <div class="row">
            <div class=" col-lg-12">
                <div class="binduz-er-breadcrumb-box">
                    <!-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                        </ol>
                    </nav> -->
                </div>
            </div>
        </div>
    </div>

</div>

<!--====== BINDUZ HEADER PART ENDS ======-->

<!--====== BINDUZ AUTHOR USER PART START ======-->
<div class="binduz-er-blog-bg-area"></div>
<section class="binduz-er-author-item-area binduz-er-author-item-layout-1 pb-20">
    <div class=" container">
        <div class="row">
            <div class=" col-lg-12">
                <div class="binduz-er-author-item mb-40">
                    <div class="binduz-er-content">
                        <div class="binduz-er-meta-item">
                            <div class="binduz-er-meta-categories">
                                <a href="#">Technology</a>
                            </div>
                            <div class="binduz-er-meta-date">
                                <span><i class="fal fa-calendar-alt"></i><?= $news['ngay_xuat_ban'] ?></span>
                            </div>
                        </div>
                        <h3 class="binduz-er-title"><?= $news['title'] ?></h3>
                        <div class="binduz-er-meta-author">
                            <div class="binduz-er-author">
                                <img src="assets/images/user-2.jpg" alt="">
                                <span>By <span><?= $news['tac_gia'] ?></span></span>
                            </div>
                            <div class="binduz-er-meta-list">
                                <ul>
                                    <li><i class="fal fa-eye"></i><?= $news['luot_xem'] ?></li>
                                    <!-- <li><i class="fal fa-heart"></i> 5k</li>
                                    <li><i class="fal fa-comments"></i> 5k</li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-lg-2">
                            <div class="binduz-er-blog-social-share">
                                <div class="binduz-er-item mb-10">
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                        <span>40</span>
                                        <p>Share</p>
                                    </a>
                                </div>
                                <div class="binduz-er-item mb-10">
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                        <span>05</span>
                                        <p>Tweet</p>
                                    </a>
                                </div>
                                <div class="binduz-er-item mb-10">
                                    <a href="#">
                                        <i class="fab fa-youtube"></i>
                                        <span>100k</span>
                                        <p>Subscriber</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-10">
                            <div class="binduz-er-blog-details-box">
                                <div class="binduz-er-text">
                                    <h5><?= $news['excerpt'] ?></h5>
                                </div>

                                <!-- <div class="binduz-er-quote-text">
                                    <span>By <span>Rosalina D.</span></span>

                                </div> -->
                                <div class="binduz-er-text mt-50">
                                    <p><?= $news['content'] ?></p>
                                </div>
                                <div class="row align-items-center pt-60">
                                    <div class=" col-lg-5">
                                        <div class="binduz-er-blog-details-thumb mr-30">
                                            <img src="assets/images/blog-details-thumb-3.jpg" alt="">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class=" col-lg-7">
                                        <div class="binduz-er-blog-details-thumb-text text pt-20 pb-20">
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

@endsection