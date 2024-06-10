@extends('layouts.master')

@section('menu')
    Danh sách User
@endsection

@section('content')
    <section aria-labelledby="applicant-information-title">
        <a href={{ url('admin/news') }}
            class="mt-4 rounded-md mb-4 bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Danh sách</a>
        <div class="bg-white shadow sm:rounded-lg mt-4">
            <div class="px-4 py-5 sm:px-6">
                <h2 id="applicant-information-title" class="text-lg font-medium leading-6 text-gray-900">Chi tiết bài viết
                </h2>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                <dl class="grid grid-cols-12 gap-x-4 gap-y-8 sm:grid-cols-2">
                    <div class="sm:col-span-8 grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Tiêu đề</dt>
                            <dd class="mt-1 text-sm text-gray-900"><?= $news['title'] ?></dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Tác giả</dt>
                            <dd class="mt-1 text-sm text-gray-900"><?= $news['tac_gia'] ?></dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Mô tả</dt>
                            <dd class="mt-1 text-sm text-gray-900"><?= $news['excerpt'] ?></dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Đề tài</dt>
                            <dd class="mt-1 text-sm text-gray-900"> <?php
                            foreach ($listCategory as $category) {
                                if ($category['id'] == $news['category_id']) {
                                    echo '<p>' . $category['name'] . '</p>';
                                }
                            }
                            ?></dd>
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <img class="w-[300px] h-fit" src={{ asset($news['image']) }} alt="">
                    </div>

                    <div class="sm:col-span-12">
                        <dt class="text-sm font-medium text-gray-500">Chi nội dung</dt>
                        <dd class="mt-1 text-sm text-gray-900"><?= $news['title'] ?></dd>
                    </div>

                </dl>
            </div>

        </div>
    </section>
@endsection
