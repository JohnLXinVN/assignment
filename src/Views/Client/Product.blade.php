@extends ('layouts.master')

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

            <!-- FORECH TÙY THÍCH -->
            @foreach ($getPostsByCategory as $all)
            <div class="col-lg-3 col-md-6">

                <div class="binduz-er-trending-today-item">
                    <div class="binduz-er-trending-news-list-box">
                        <div class="binduz-er-thumb">
                            <img src="{{asset($all['image'])}}" height="250px;">
                        </div>
                        <div class="binduz-er-content">
                            <div class="binduz-er-meta-item">
                                <div class="binduz-er-meta-categories">
                                    <a href="#">{{$all['category_name']}}</a>
                                </div>
                                <div class="binduz-er-meta-date">
                                    <span><i class="fal fa-calendar-alt">{{$all['ngay_xuat_ban']}}</i> </span>
                                </div>
                            </div>
                            <div class="binduz-er-trending-news-list-title">
                                <h4 class="binduz-er-title"><a href="{{ url('products/' . $all['id']) }}">{{$all['title']}}</a></h4>

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

@endsection