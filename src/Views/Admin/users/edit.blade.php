@extends('layouts.master')

@section('menu')
    Danh sách User
@endsection

@section('content')
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">User</h1>
            <p class="mt-2 text-sm text-gray-700">Thêm người dùng mới</p>
        </div>

    </div>
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
    <form class="mt-4 sm:mt-4 sm:flex-none" method="POST" enctype="multipart/form-data"
        action="{{ url('admin/users/' . $user['id'] . '/update') }}">


        <div class="mt-10 border-t border-gray-200 pt-10">

            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">User
                        name</label>
                    <div class="mt-1">
                        <input type="text" id="user_name" value="<?= $user['user_name'] ?>" name="user_name"
                            autocomplete="given-name"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">

                    </div>
                </div>
                <div class="">
                    <label class="block text-sm font-medium text-gray-700">Họ
                        tên</label>
                    <div class="mt-1">
                        <input type="text" name="ho_ten" id="ho_ten" value="<?= $user['ho_ten'] ?>"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">

                    </div>
                </div>

                <div class="sm:col-span-1">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mật
                            khẩu</label>
                        <div class="mt-1">
                            <input type="password" id="password" name="password" autocomplete="family-name"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">

                        </div>
                    </div>
                    <div class="mt-1">
                        <label class="block text-sm font-medium text-gray-700">Nhập lại mật khẩu</label>
                        <div class="mt-1">
                            <input type="password" id="confirm_password" name="confirm_password" autocomplete="family-name"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">

                        </div>
                    </div>
                </div>




                <div class="">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input type="text" name="email" id="email" value="<?= $user['email'] ?>"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">

                    </div>
                </div>
                <div class="mt-4 sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Chọn tệp hình:</label>

                    <input id="image" name="image" type="file" class="">

                    <div class="w-[200px] mt-5 h-[100px] object-fit">
                        <img src="{{ asset($user['image']) }}" alt="">
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Role</label>
                    <div class="mt-1">
                        <select id="vai_tro" name="vai_tro" autocomplete="country-name"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                            <option <?php echo $user['vai_tro'] == 1 ? 'selected' : ''; ?> value="1">Admin</option>
                            <option <?php echo $user['vai_tro'] == 0 ? 'selected' : ''; ?> value="0">User</option>
                        </select>
                    </div>
                </div>



                <div>
                    <label class="block text-sm font-medium text-gray-700">Kích
                        hoạt</label>
                    <div class="mt-1">
                        <select id="kich_hoat" name="kich_hoat" autocomplete="country-name"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                            <option <?php echo $user['kich_hoat'] == 1 ? 'selected' : ''; ?> value="1">Kích hoạt</option>
                            <option <?php echo $user['kich_hoat'] == 1 ? 'selected' : ''; ?> value="0">Khóa</option>
                        </select>
                    </div>
                </div>


            </div>
            <button type="submit" name=""
                class="mt-4 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Sửa</button>
            <a href={{ url('admin/users') }}
                class="mt-4 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Danh sách</a>
    </form>
@endsection
