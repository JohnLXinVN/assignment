<?php

namespace Ductong\XuongOop\Controllers\Client;

use Ductong\XuongOop\Commons\Controller;
use Ductong\XuongOop\Commons\Helper;
use Ductong\XuongOop\Models\Category;
use Ductong\XuongOop\Models\News;

class HomeController extends Controller
{
    private Category $category;
    private News $news;

    public function __construct()
    {
        $this->category = new Category();
        $this->news = new News();
    }

    public function index()
    {
        $category = $this->category->all();
        $news = $this->news->fornew(); // 4 bài viết nhiều lượt xem
        $one = $this->news->onenew(); // top 1
        $sixnew = $this->news->sixnew(); // 6 bài mới nhất
        $postsrandom = $this->news->getRandom();  // lấy ngẫu nhiên
        // Helper::debug($news);
        $this->renderViewClient('Home', [
            'category' => $category,
            'news' => $news,
            'one' => $one,
            'sixnew' => $sixnew,
            'postsrandom' => $postsrandom
        ]);
    }
}
