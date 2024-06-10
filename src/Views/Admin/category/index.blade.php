@extends('layouts.master')


@section('content')
    <style>
        .example_text {

            white-space: nowrap;
            /* Ngăn văn bản xuống dòng */
            overflow: hidden;
            /* Ẩn phần văn bản vượt qua khung */
            text-overflow: ellipsis;
            /* Hiển thị dấu ba chấm */

        }

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
            <h1 class="text-base font-semibold leading-6 text-gray-900">Danh Mục Tin Tức</h1>
            <p class="mt-2 text-sm text-gray-700">Quản lý Danh Mục Tin Tức</p>
        </div>

        <form class="mt-4 sm:mt-4 sm:flex-none" action="loai_hang.php" method="POST">
            <div class="flex">
                <a href={{ url('admin/category/create') }} type="button"
                    class="min-w-[100px]  rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Thêm mới</a>
            </div>
        </form>
    </div>
    <div class="mt-8 flex justify-center items-center">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 w-[1000px]">
            <div class="inline-block min-w-full py-2 align-middle w-[300px] sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-300 w-[50px]">


                        <thead class="bg-gray-50">


                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-lg   sm:pl-6">
                                    Id Danh Mục</th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-lg   sm:pl-6">
                                    Tên Danh Mục</th>
                                <th scope="col" class="relative text-lg py-3.5 pl-3 pr-4 sm:pr-6">

                                    <span class="">Action</s pan>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($category as $dm)
                                <tr>
                                    <td class="whitespace-nowrap px-3.5 py-4 text-sm text-gray-500 w-[0px]"><?= $dm['id'] ?>
                                    </td>
                                    <td class="whitespace-nowrap px-3.5 py-4 text-sm text-gray-500 w-[0px]">
                                        <?= $dm['name'] ?>
                                    </td>

                                    <td class=" px-3.5 py-4 text-sm text-gray-500 !w-[0px]">
                                        <a href={{ url('admin/category/' . $dm['id'] . '/edit') }} type="button"
                                            {{ $dm['id'] == 13 ? 'disabled' : '' }}
                                            onclick="{{ $dm['id'] == 13 ? 'return false;' : '' }}"
                                            class="mb-1 inline-flex items-center gap-x-1.5 rounded-md  {{ $dm['id'] == 13 ? 'bg-gray-200' : 'bg-green-600' }}  px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                            <i class="fa-solid fa-pencil"></i>
                                            Sửa
                                        </a>
                                        <a href={{ url('admin/category/' . $dm['id'] . '/delete') }} type="button"
                                            {{ $dm['id'] == 13 ? 'disabled' : '' }}
                                            onclick="{{ $dm['id'] == 13 ? 'return false;' : 'return confirmDelete()' }}"
                                            class="ml-2 mb-1 inline-flex items-center {{ $dm['id'] == 13 ? 'bg-gray-200' : 'bg-red-600' }}
                                            gap-x-1.5 rounded-md  px-3 py-2 text-sm font-semibold text-white
                                            shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                                            focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                            <i class="fa-solid fa-trash-can"></i>
                                            Xóa
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- More people... -->
                        </tbody>
                    </table>
                    <div class="col-lg-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                @for ($i = 1; $i <= $totalPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link"
                                            href="{{ url('admin/category?page=' . $i) }}">{{ $i }}</a>
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
