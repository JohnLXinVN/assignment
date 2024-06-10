@extends('layouts.master')

@section('menu')
    Danh sách User
@endsection

@section('content')
    <style>
        .store-pagination {
            float: right;
        }

        .store-pagination li {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            background-color: #fff;
            border: 1px solid #e4e7ed;
            -webkit-transition: 0.2s all;
            transition: 0.2s all;
        }

        .store-pagination li+li {
            margin-left: 5px;
        }

        .store-pagination li:hover {
            background-color: #e4e7ed;
            color: #d10024;
        }

        .store-pagination li.active {
            background-color: #d10024;
            border-color: #d10024;
            color: #fff;
            font-weight: 500;
            cursor: default;
        }

        .store-pagination li a {
            display: block;
        }

        .store-qty {
            margin-right: 30px;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 12px;
        }

        .store-filter {
            margin-top: 30px;
        }
    </style>

    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Users</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all the users
                in your account including
                their name, title, email and role.</p>
        </div>

        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">

            <a href="{{ url('admin/users/create') }}" type="button"
                class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Thêm mới</a>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-300">


                        <thead class="bg-gray-50">


                            <tr>


                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    User name</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Email</th>


                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Họ tên</th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Vai trò</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Hình</th>


                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">

                                    <span class="">Action</s pan>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">


                            @foreach ($users as $value)
                                <tr>
                                    <td class='whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6'>
                                        {{ $value['user_name'] }}</td>
                                    <td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>{{ $value['email'] }}</td>
                                    <td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>{{ $value['ho_ten'] }}
                                    </td>
                                    <td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>
                                        {{ $value['vai_tro'] == 1 ? 'Admin' : 'Khách hàng' }}</td>
                                    <td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'><img
                                            class='w-[50px] h-[50px]' src="{{ asset($value['image']) }}" /></td>
                                    <td>

                                        {{-- <a class="btn btn-info"
                                            href="{{ url('admin/users/' . $value['id'] . '/show') }}">Xem</a> --}}
                                        <a class="btn btn-warning"
                                            href="{{ url('admin/users/' . $value['id'] . '/edit') }}">Sửa</a>
                                        <a class="btn btn-danger"
                                            href="{{ url('admin/users/' . $value['id'] . '/delete') }}"
                                            onclick="return confirm('Chắc chắn xóa không?')">Xóa</a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div class="col-lg-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                @for ($i = 1; $i <= $totalPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active bg-blue-300' : '' }}">
                                        <a class="page-link"
                                            href="{{ url('admin/users?page=' . $i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
