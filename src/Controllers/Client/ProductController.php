<?php

namespace Ductong\XuongOop\Controllers\Client;

use Ductong\XuongOop\Commons\Controller;
use Ductong\XuongOop\Commons\Helper;
use Ductong\XuongOop\Models\Category;
use Ductong\XuongOop\Models\News;

class ProductController extends Controller
{
    private News $news;

    private Category $category;

    public function __construct()
    {

        $this->news = new News();
        $this->category = new Category();
    }
    public function index()
    {
        [$news, $totalPage] = $this->news->paginate($_GET['page'] ?? 1);

        $this->renderViewClient('Product', [

            'news' => $news,
            'totalPage' => $totalPage
        ]);
    }
    public function showByCategory()
    {
    }
    // public function index()
    // {
    //     $category_id = isset($_GET['category']) ? $_GET['category'] : null;
    //     $page = isset($_GET['page']) ? $_GET['page'] : 1;

    //     [$news, $totalPage] = $this->news->paginate2($category_id, $page);
    //     $this->renderViewClient('Product', [
    //         'news' => $news,

    //         'totalPage' => $totalPage
    //     ]);
    // }

    public function detail($id)
    {
        $news = $this->news->findByID($id);
        $newsfor = $this->news->fornew();
        $listCategory = $this->category->all();

        $this->renderViewClient('ProductDetail', [
            'news' => $news,
            'listCategory' => $listCategory,
            'newsFor' => $newsfor
        ]);
    }
}
