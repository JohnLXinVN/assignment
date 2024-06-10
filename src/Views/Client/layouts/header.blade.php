<header class="binduz-er-header-area">
    <div class="binduz-er-header-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navigation">
                        <nav class="navbar navbar-expand-lg">
                            <div class="navbar-brand logo"><a href="index.html"><img src="assets/images/logo.png"
                                        alt=""></a></div> <!-- logo -->
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{url('')}}">Trang Chủ</a>
                                    </li>
                                    @php
                                        $categories = (new \Ductong\XuongOop\Models\Category())->getForMenu();
                                    @endphp
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('category')}}">Danh Mục<i
                                                class="fa fa-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            @foreach ($categories as $category)
                                                <li><a
                                                        href="{{ url('category/' . $category['id']) }}">{{ $category['name'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{url('')}}">Về chúng tôi</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{url('')}}">Liên Hệ</a>
                                    </li>

                                </ul>
                            </div> <!-- navbar collapse -->


                            <div class="binduz-er-navbar-btn d-flex">

                                <div class="binduz-er-widget d-flex">
                                    <a class="binduz-er-news-search-open" href="#"><span
                                            class="material-symbols-outlined">search</span></a>
                                    @if (!isset($_SESSION['user']))
                                        <a href="{{ url('login') }}"><span class="material-symbols-outlined">login</span></a>
                                    @else
                                        @php
                                            $user = $_SESSION['user'];
                                        @endphp
                                        <a href="{{url('account/'. $user['id'] . '/show') }} "><span class="material-symbols-outlined">person</span></a>
                                        {{ $user['user_name'] }}
                                        
                                        <a href="{{ url('logout') }}"><span class="material-symbols-outlined">logout</span></a>
                                    @endif
                                </div>
                                <span class="binduz-er-toggle-btn binduz-er-news-canvas_open d-block d-lg-none">
                                    <i class="fal fa-bars"></i>
                                </span>
                            </div>
                        </nav>
                    </div> <!-- navigation -->
                </div>
            </div> <!-- row -->
        </div>
    </div>
</header>