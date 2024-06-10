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
                                @if (!empty($_SESSION['errors']))
                                <div class="alert alert-warning">
                                    <ul>
                                        @foreach ($_SESSION['errors'] as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>

                                    @php
                                    unset($_SESSION['errors']);
                                    @endphp
                                </div>
                                @endif

                                <form class="custom-form" method="POST" enctype="multipart/form-data" action="{{ url('account/' . $user['id'] . '/update') }}">
                                    <a href="{{url('account/'. $user['id'] . '/show') }}"><span class="material-symbols-outlined">
                                        arrow_back
                                    </span></a>
                                    <div class="text-center mb-3 pb-2">
                                        <h5 class="f-16 mt-3">Chỉnh sửa thông tin tài khoản</h5>
                                        <img src="{{ asset($user['image']) }}" width="30%" class="avatar-md rounded-circle img-thumbnail" alt="">
                                        <input id="image" name="image" type="file" class="">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="user_name">User Name</label>
                                        <input type="text" class="form-control" name="user_name" value="{{ $user['user_name'] }}" data-gtm-form-interact-field-id="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="ho_ten">Họ tên</label>
                                        <input type="text" class="form-control" name="ho_ten" value="{{ $user['ho_ten'] }}" data-gtm-form-interact-field-id="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ $user['email'] }}" data-gtm-form-interact-field-id="0">
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control" id="username" placeholder="Đổi mật khẩu" autocomplete="family-name">
                                    </div>

                                    <div class="mb-3">
                                        <input type="password" name="confirm_password" class="form-control" id="userpassword" placeholder="Nhập lại mật khẩu" autocomplete="family-name">
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-success rounded-3 w-100" type="submit">Lưu thông
                                            tin</button>
                                    </div>
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