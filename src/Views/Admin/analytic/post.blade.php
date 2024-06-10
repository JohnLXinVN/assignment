@extends('layouts.master')

@section('menu')
    Danh sách User
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="flex">

        <div class="sm:col-span-2">
            <a href={{ url('admin/analytics/view') }}
                class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><i
                    class="fa-solid fa-magnifying-glass"></i>Thống kê view</a>
        </div>

    </div>
    <form action={{ url('admin/analytics/total_post') }} method="POST"
        class="mt-5 grid grid-cols-1 items-end gap-x-6 gap-y-8 sm:grid-cols-12">
        <div class="sm:col-span-5">
            <div class="relative">
                <label for="name"
                    class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-900">Date
                    from</label>
                <input type="date" name="dateFrom" id="dateFrom" value="<?php echo $dateFrom; ?>"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div class="sm:col-span-5">
            <div class="relative">
                <label for="name"
                    class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-900">Date
                    To</label>
                <input type="date" name="dateTo" id="dateTo" value
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="sm:col-span-2">
            <button type="submit"
                class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><i
                    class="fa-solid fa-magnifying-glass"></i>Lọc</button>
        </div>
    </form>

    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="flex w-full justify-center">
                <div class="w-[400px] h-[400px] ">
                    <h1 class="pl-[23px]">Biểu đồ thống kê theo bài viết</h1>
                    <canvas id="myChart" class="w-[400px] h-[400px]"></canvas>
                </div>
            </div>

            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    Tên danh mục</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Tổng số bài viết</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <?php
                            foreach ($getTotalPostByTime as $key => $value) {
                                echo '<tr>';
                                echo "<td class='whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6'>" . $value['name'] . '</td>';
                                echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . $value['count'] . '</td>';
                            
                                echo '</tr>';
                            }
                            
                            ?>


                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Mã PHP để tạo dữ liệu cho biểu đồ
    $labels = [];
    $dataView = [];
    $backgroundColor = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(0, 128, 0, 0.8)', 'rgba(255, 0, 0, 0.7)', 'rgba(0, 0, 255, 0.3)', 'rgba(255, 255, 0, 0.4)', 'rgba(0, 255, 255, 0.6)', 'rgba(128, 128, 0, 0.9)', 'rgba(255, 0, 255, 0.1)', 'rgba(0, 128, 128, 0.7)', 'rgba(128, 0, 0, 0.4)', 'rgba(0, 0, 128, 0.2)', 'rgba(128, 128, 128, 0.6)', 'rgba(255, 255, 255, 0.8)', 'rgba(0, 255, 0, 0.3)', 'rgba(192, 192, 192, 0.5)', 'rgba(255, 0, 0, 0.2)'];
    
    foreach ($getTotalPostByTime as $value) {
        array_push($labels, $value['name']);
        array_push($dataView, $value['count']);
    }
    
    ?>


    <script>
        // Lấy ngày hôm nay

        var today = new Date();

        // Định dạng ngày tháng
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        // Gán giá trị mặc định cho trường ngày
        var dateToField = document.getElementById("dateTo");
        dateToField.value = yyyy + '-' + mm + '-' + dd;

        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        label: <?php echo json_encode($labels); ?>,
                        data: <?php echo json_encode($dataView); ?>,
                        backgroundColor: <?php echo json_encode($backgroundColor); ?>,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: true,
                            position: 'right'
                        }
                    }
                }
            });
        });
    </script>
@endsection
