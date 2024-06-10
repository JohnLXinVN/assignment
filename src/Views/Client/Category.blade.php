@extends('layouts.master')

@section('title')
Bài viết
@endsection

@section('content')

<section class="binduz-er-trending-today-area">
    <div class="binduz-er-bg-cover"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="binduz-er-trending-today-topbar">
                    <div class="binduz-er-trending-today-title">
                        <h3 class="binduz-er-title">Tất cả bài viết </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <!-- FOREACH -->
            @foreach ($news as $post)
            <div class="col-lg-3 col-md-6">
                <div class="binduz-er-trending-today-item">
                    <div class="binduz-er-trending-news-list-box">
                        <div class="binduz-er-thumb">
                            <img src="{{ asset($post['image']) }}" height="250px;">
                        </div>
                        <div class="binduz-er-content">
                            <div class="binduz-er-meta-item">
                                <div class="binduz-er-meta-categories">
                                    <a href="#">{{ $post['category_name'] }}</a>
                                </div>
                                <div class="binduz-er-meta-date">
                                    <span><i class="fal fa-calendar-alt">{{ $post['ngay_xuat_ban'] }}</i> </span>
                                </div>
                            </div>
                            <div class="binduz-er-trending-news-list-title">
                                <h4 class="binduz-er-title"><a href="{{ url('products/' . $post['id']) }}">{{ $post['title'] }}</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- FOREACH -->

            <!-- PHÂN TRANG -->
            <div class="col-lg-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        @for ($i = 1; $i <= $totalPage; $i++) <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                            <a class="page-link" href="{{ url('/category?page=' . $i) }}">{{ $i }}</a>
                            </li>
                            @endfor
                    </ul>
                </nav>
            </div>
            <!-- PHÂN TRANG -->

        </div>
    </div>
</section>

@endsection