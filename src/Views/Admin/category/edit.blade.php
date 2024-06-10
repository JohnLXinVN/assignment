@extends('layouts.master')


@section('content')

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
    <form class="mt-4 sm:mt-4 sm:flex-none" method="POST" id="add_danh_muc"
        action={{ url('admin/category/' . $category['id'] . '/update') }}>
        <span>Thêm mới</span>
        <div class="flex flex-col">
            <div class="flex">
                <input type="text" name="name" id="name" value="{{ $category['name'] }}"
                    class="block w-full rounded-md border-0  mr-3 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm pl-2 " />

                <button name="btn_add_danh_muc"
                    class="min-w-[100px]  rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Sửa</button>
                <a href={{ url('admin/category') }}
                    class="min-w-[100px] ml-2 block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Danh sách</a>
            </div>
        </div>


    </form>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
@endsection
