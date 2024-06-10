<?php

namespace Ductong\XuongOop\Controllers\Admin;

use Ductong\XuongOop\Commons\Controller;
use Ductong\XuongOop\Commons\Helper;
use Ductong\XuongOop\Models\News;
use Ductong\XuongOop\Models\Category;
use Rakit\Validation\Validator;

class AnalyticsController extends Controller
{
    private News $news;
    private Category $category;



    public function __construct()
    {
        $this->news = new News();
        $this->category = new Category();
    }

    public function indexView()
    {
        $data = $this->news->getViewByCategory();

        $this->renderViewAdmin("analytic.view", [
            "data" => $data
        ]);

    }

    public function indexTotalPost()
    {
        $dateFrom = $_POST["dateFrom"];
        $dateTo = $_POST["dateTo"];

        

        if ($dateFrom && $dateTo) {
            $getTotalPostByTime = $this->news->getTotalPostByTimeFromTo($dateFrom, $dateTo);
        } else if ($dateFrom && !$dateTo) {
            $getTotalPostByTime = $this->news->getTotalPostByTimeFrom($dateFrom);
        } else if ($dateTo && !$dateFrom) {
            $getTotalPostByTime = $this->news->getTotalPostByTimeTo($dateTo);
        }

        $this->renderViewAdmin("analytic.post", [
            "getTotalPostByTime" => $getTotalPostByTime,
            "dateFrom" => $dateFrom,
            "dateTo" => $dateTo,
        ]);



    }


}
