<?php

namespace Ductong\XuongOop\Controllers\Client;

use Ductong\XuongOop\Commons\Controller;
use Ductong\XuongOop\Commons\Helper;
use Ductong\XuongOop\Models\Category;
use Ductong\XuongOop\Models\News;

class CategoryController extends Controller
{
    protected $News;
    private Category $category;

    public function __construct()
    {
        $this->News = new News;
    }

    public function show($category_id)
    {
        $getPostsByCategory = $this->News->getProductsByCategory($category_id);
        // Helper::debug($getPostsByCategory);
        $this->renderViewClient(
            'product', // Tên view cần render
            [
                'getPostsByCategory' => $getPostsByCategory // Truyền dữ liệu cho view
            ]
        );
    }

    public function category()
    {
        [$news, $totalPage] = $this->News->paginate($_GET['page'] ?? 1);

        $listCategory = $this->News->all();

        $this->renderViewClient('category', [
            'news' => $news,
            'listCategory' => $listCategory,
            'totalPage' => $totalPage
        ]);
    }
}
