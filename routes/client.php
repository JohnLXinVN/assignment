<?php

// Website có các trang là:
//      Trang chủ
//      Giới thiệu
//      Sản phẩm
//      Chi tiết sản phẩm
//      Liên hệ

// Để định nghĩa được, điều đầu tiên làm là phải tạo Controller trước
// Tiếp theo, khai function tương ứng để xử lý
// Bước cuối, định nghĩa đường dẫn

// HTTP Method: get, post, put (path), delete, option, head

use Ductong\XuongOop\Controllers\Client\AccountController;
use Ductong\XuongOop\Controllers\Client\CategoryController;
use Ductong\XuongOop\Controllers\Client\AboutController;
use Ductong\XuongOop\Controllers\Client\ContactController;
use Ductong\XuongOop\Controllers\Client\HomeController;
use Ductong\XuongOop\Controllers\Client\LoginController;
use Ductong\XuongOop\Controllers\Client\ProductController;

$router->get('/', HomeController::class . '@index');
$router->get('/about', AboutController::class . '@index');

$router->get('/contact', ContactController::class . '@index');
$router->post('/contact/store', ContactController::class . '@store');

$router->get('/products', ProductController::class . '@index');
$router->get('/products/{id}', ProductController::class . '@detail');

$router->get('/category', CategoryController::class . '@category');
$router->get('/category/{id}', CategoryController::class . '@show');


$router->get('/login', LoginController::class . '@showFormLogin');
$router->post('/handle-login', LoginController::class . '@login');
$router->get('/logup', LoginController::class . '@showFormLogup');
$router->post('/handle-logup', LoginController::class . '@logup');
$router->get('/logout', LoginController::class . '@logout');

$router->mount('/account', function () use ($router) {
    $router->get('/', AccountController::class . '@index');
    $router->get('/{id}/show', AccountController::class . '@show');
    $router->get('/{id}/edit', AccountController::class . '@edit');
    $router->post('/{id}/update', AccountController::class . '@update');
    $router->get('/{id}/forgot', AccountController::class . '@forgot');
    $router->get('/{id}/confirm', AccountController::class . '@confirm');
    $router->get('/{id}/delete', AccountController::class . '@delete');

});