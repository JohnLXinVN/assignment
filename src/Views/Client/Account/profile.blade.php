@extends('layouts.master')
@section('title')
Thông tin tài khoản
@endsection

@section('content')

<body>
    <!-- START -->
    @php
    $user = $_SESSION['user'];

    @endphp
    <div class="mt-5 text-center">
    </div>
    <div class="account-pages">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="custom-form" method="POST" enctype="multipart/form-data">
                                    <div class="text-center mb-3 pb-2">

                                        <h5 class="f-16 mt-3">Thông tin tài khoản</h5>
                                        <img src="{{ asset($user['image']) }}" width="30%" height="30%" class="avatar-md rounded-circle img-thumbnail" alt="">
                                    </div>

                                    <div class="alert alert-success  mb-4" role="alert">
                                        <div class="mt-3">
                                            <p>Tên tài khoản: {{ $user['user_name'] }}</p>
                                            <p></p>
                                        </div>
                                        <div class="mt-3">
                                            <p>Tên người dùng: {{ $user['ho_ten'] }}</p>

                                        </div>
                                        <div class="mt-3">
                                            <p>Email: {{ $user['email'] }}</p>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <a class="btn btn-success rounded-3 w-100" href="{{ url('account/' . $user['id'] . '/edit') }}">Chỉnh sửa thông tin</a>
                                    </div>
                                    <?php
                                    if ($user['vai_tro'] == 1) : ?>
                                        <div class="mt-3">
                                            <a class="btn btn-success rounded-3 w-100" href="{{ url('admin/analytics/view') }}">Đăng nhập
                                                Admin</a>
                                        </div>


                                    <?php endif ?>


                                </form>

                                <!-- end form -->
                            </div>
                        </div>
                        <!-- end cardbody -->
                    </div>
                    <!-- end card -->

                    <div class="mt-5 text-center">

                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
    @endsection