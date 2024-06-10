@extends('layouts.master')

@section('menu')
    Danh sách User
@endsection

@section('content')
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Tin Tức</h1>
            <p class="mt-2 text-sm text-gray-700">Thêm Tin Tức</p>
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

    <form class="mt-4 sm:mt-4 sm:flex-none" method="POST" id="addTT" enctype="multipart/form-data"
        action={{ url('admin/news/store') }}>


        <div class="mt-10 border-t border-gray-200 pt-10">

            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tiêu Đề</label>
                    <div class="mt-1">
                        <input type="text" id="ten_hh" name="tieu_de" autocomplete="given-name"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                    </div>
                </div>
                <div class="">
                    <label class="block text-sm font-medium text-gray-700">Mô Tả</label>
                    <div class="mt-1">
                        <input type="text" name="mo_ta" id="mo_ta"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Nội Dung</label>
                    <div class="mt-1">
                        <textarea type="text" rows="4" name="noi_dung" id="noi_dung"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm"></textarea>
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Hình:</label>

                    <input id="image" name="image" type="file" class="">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Ngày Xuất Bản</label>
                    <div class="mt-1">
                        <input type="date" id="ngay_xuat_ban" name="ngay_xuat_ban" autocomplete="given-name"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Tác Giả</label>
                    <div class="mt-1">
                        <input type="text" id="tac_gia" name="tac_gia" autocomplete="family-name"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Danh Mục</label>
                    <div class="mt-1">
                        <select id="category_id" name="category_id" autocomplete="country-name"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                            <?php
                            foreach ($ds_dm as $dm) { ?>
                            <option value="<?= $dm['id'] ?>">
                                <?= $dm['name'] ?>
                            </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>


            </div>
            <button type="submit" name="btn_add_tin_tuc"
                class="mt-4 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Thêm</button>
            <a href={{ url('admin/news') }}
                class="mt-4 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Danh sách</a>
    </form>

@endsection
