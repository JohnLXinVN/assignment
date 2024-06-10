<?php

// CRUD bao gồm: Danh sách, thêm, sửa, xem, xóa
// User:
//      GET     -> USER/INDEX   -> INDEX    -> Danh sách
//      GET     -> USER/CREATE  -> CREATE   -> HIỂN THỊ FORM THÊM MỚI
//      POST    -> USER/STORE   -> STORE    -> LƯU DỮ LIỆU TỪ FORM THÊM MỚI VÀO DB
//      GET     -> USER/ID/SHOW         -> SHOW ($id)     -> XEM CHI TIẾT
//      GET     -> USER/ID/EDIT         -> EDIT ($id)     -> HIỂN THỊ FORM CẬP NHẬT
//      POST    -> USER/ID/UPDATE       -> UPDATE ($id)   -> LƯU DỮ LIỆU TỪ FORM CẬP NHẬT VÀO DB
//      GET     -> USER/ID/DELETE       -> DELETE ($id)   -> XÓA BẢN GHI TRONG DB

use Ductong\XuongOop\Controllers\Admin\AnalyticsController;
use Ductong\XuongOop\Controllers\Admin\CategoryController;
use Ductong\XuongOop\Controllers\Admin\CategotyController;
use Ductong\XuongOop\Controllers\Admin\DashboardController;
use Ductong\XuongOop\Controllers\Admin\NewsController;
use Ductong\XuongOop\Controllers\Admin\UserController;
use Ductong\XuongOop\Models\News;

$router->before('GET|POST', '/admin/*.*', function () {
    if (!isset($_SESSION['user'])) {
        header('location: ' . url('login'));
        exit();
    }
    if (isset($_SESSION['user']) && $_SESSION['user']["vai_tro"] == 0) {
        header('location: ' . url('/'));
        exit();
    }
});

$router->mount('/admin', function () use ($router) {

    $router->get('/', DashboardController::class . '@dashboard');

    // CRUD USER
    $router->mount('/users', function () use ($router) {
        $router->get('/', UserController::class . '@index');
        $router->get('/create', UserController::class . '@create');
        $router->post('/store', UserController::class . '@store');
        $router->get('/{id}/show', UserController::class . '@show');
        $router->get('/{id}/edit', UserController::class . '@edit');
        $router->post('/{id}/update', UserController::class . '@update');
        $router->get('/{id}/delete', UserController::class . '@delete');
    });

    $router->mount('/category', function () use ($router) {
        $router->get('/', CategoryController::class . '@index');
        $router->get('/create', CategoryController::class . '@create');
        $router->post('/store', CategoryController::class . '@store');
        $router->get('/{id}/show', CategoryController::class . '@show');
        $router->get('/{id}/edit', CategoryController::class . '@edit');
        $router->post('/{id}/update', CategoryController::class . '@update');
        $router->get('/{id}/delete', CategoryController::class . '@delete');
    });

    $router->mount('/news', function () use ($router) {
        $router->get('/', NewsController::class . '@index');
        $router->get('/create', NewsController::class . '@create');
        $router->post('/store', NewsController::class . '@store');
        $router->get('/{id}/show', NewsController::class . '@show');
        $router->get('/{id}/edit', NewsController::class . '@edit');
        $router->post('/{id}/update', NewsController::class . '@update');
        $router->get('/{id}/delete', NewsController::class . '@delete');
    });
    $router->mount('/analytics', function () use ($router) {
        $router->get('/view', AnalyticsController::class . '@indexView');
        $router->post('/total_post', AnalyticsController::class . '@indexTotalPost');
    });

});