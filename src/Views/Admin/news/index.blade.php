@extends('layouts.master')

@section('menu')
    Danh sách User
@endsection

@section('content')
    <style>
        p {

            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;

        }
    </style>

    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Tin Tức</h1>
            <p class="mt-2 text-sm text-gray-700">Quản lý Tin Tức</p>
        </div>

        <form class="mt-4 sm:mt-4 sm:flex-none" action="loai_hang.php" method="POST">
            <div class="flex">
                <a href={{ url('admin/news/create') }} type="button"
                    class="min-w-[100px]  rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Thêm mới</a>
            </div>
        </form>
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
                                    Tên Tin Tức</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Tác Giả</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">

                                    Mô Tả</th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Nội Dung</th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Ngày Xuất Bản</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Danh Mục Tin Tức</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Hình</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Lượt xem</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="">Action</s pan>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <?php
                        foreach ($news as $tin_tuc) { ?>

                            <tr>
                                <td class=' py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6'>
                                    <p><?php echo $tin_tuc['title']; ?></p>
                                </td>
                                <td class=' px-3 py-4 text-sm text-gray-500'>
                                    <p> <?php echo $tin_tuc['tac_gia']; ?></p>
                                </td>
                                <td class=' px-3 py-4 text-sm text-gray-500'>
                                    <p> <?php echo $tin_tuc['excerpt']; ?></p>
                                </td>
                                <td class=' px-3 py-4 text-sm text-gray-500 w-[250px]'>
                                    <p class='text-gray-500 w-[250px]'>
                                        <?php echo $tin_tuc['content']; ?></p>
                                    </p>
                                </td>
                                <td class=' px-3 py-4 text-sm text-gray-500'>
                                    <p> <?php echo $tin_tuc['ngay_xuat_ban']; ?></p>
                                </td>
                                <td class=" px-3 py-4 text-sm text-gray-500">
                                    <?php
                                    foreach ($listCategory as $category) {
                                        if ($category['id'] == $tin_tuc['category_id']) {
                                            echo '<p>' . $category['name'] . '</p>';
                                        }
                                    }
                                    ?>
                                </td>
                                <td class=' px-3 py-4 text-sm text-gray-500'><img class='w-[50px] h-[50px]'
                                        src="{{ asset($tin_tuc['image']) }}" /></td>

                                <td class=' px-3 py-4 text-sm text-gray-500'>
                                    <p> <?php echo $tin_tuc['luot_xem']; ?></p>
                                </td>
                                <td class='relative  py-4 pl-3 flex flex-row pr-4 text-right text-sm font-medium sm:pr-6'>
                                    <a href={{ url('admin/news/' . $tin_tuc['id'] . '/show') }} type='button'
                                        class='mb-1 inline-flex items-center gap-x-1.5 rounded-md bg-yellow-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>
                                        <i class='fa-solid fa-pencil'></i>
                                        Xem
                                    </a>
                                    <a href={{ url('admin/news/' . $tin_tuc['id'] . '/edit') }} type='button'
                                        class='mb-1 ml-2 inline-flex items-center gap-x-1.5 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>
                                        <i class='fa-solid fa-pencil'></i>
                                        Sửa
                                    </a>
                                    <a href={{ url('admin/news/' . $tin_tuc['id'] . '/delete') }} type='button'
                                        onclick='return confirmDelete()'
                                        class=' ml-2 mb-1 inline-flex items-center gap-x-1.5 rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>
                                        <i class='fa-solid fa-trash-can'></i>
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>


                            <!-- More people... -->
                        </tbody>
                    </table>
                    <div class="col-lg-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                @for ($i = 1; $i <= $totalPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link"
                                            href="{{ url('admin/news?page=' . $i) }}">{{ $i }}</a>
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
