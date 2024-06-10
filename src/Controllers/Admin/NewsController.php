<?php

namespace Ductong\XuongOop\Controllers\Admin;

use Ductong\XuongOop\Commons\Controller;
use Ductong\XuongOop\Commons\Helper;
use Ductong\XuongOop\Models\News;
use Ductong\XuongOop\Models\Category;
use Rakit\Validation\Validator;

class NewsController extends Controller
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
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

        [$news, $totalPage] = $this->news->paginate($_GET['page'] ?? 1);

        $listCategory = $this->category->all();
        // Helper::debug($listCategory);

        $this->renderViewAdmin('news.index', [
            'news' => $news,
            'listCategory' => $listCategory,
            'totalPage' => $totalPage,
            "currentPage" => $currentPage
        ]);
    }

    public function create()
    {
        $listCategory = $this->category->all();

        $this->renderViewAdmin('news.create', [
            'ds_dm' => $listCategory
        ]);
    }

    public function store()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'tieu_de' => 'required|max:100',
            'mo_ta' => 'required|max:500',
            'noi_dung' => 'required',
            'ngay_xuat_ban' => 'required',
            'tac_gia' => 'required',
            'category_id' => 'required',
            'image' => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            // Helper::debug($_SESSION['errors']);
            header('Location: ' . url('admin/news/create'));
            exit;
        } else {
            $data = [
                'title' => $_POST['tieu_de'],
                'excerpt' => $_POST['mo_ta'],
                'content' => $_POST['noi_dung'],
                'ngay_xuat_ban' => $_POST['ngay_xuat_ban'],
                'category_id' => $_POST['category_id'],
                'tac_gia' => $_POST['tac_gia'],
            ];
            // Helper::debug($data);
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

                $from = $_FILES['image']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['image']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['image'] = $to;
                } else {
                    $_SESSION['errors']['image'] = 'Upload Không thành công';

                    header('Location: ' . url('admin/news/create'));
                    exit;
                }
            }

            $this->news->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url('admin/news'));
            exit;
        }
    }

    public function show($id)
    {
        $news = $this->news->findByID($id);
        $listCategory = $this->category->all();

        $this->renderViewAdmin('news.show', [
            'news' => $news,
            'listCategory' => $listCategory,

        ]);
    }

    public function edit($id)
    {
        $news = $this->news->findByID($id);
        $listCategory = $this->category->all();

        $this->renderViewAdmin('news.edit', [
            'news' => $news,
            'listCategory' => $listCategory,

        ]);
    }

    public function update($id)
    {
        $news = $this->news->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'tieu_de' => 'required|max:100',
            'mo_ta' => 'required|max:500',
            'noi_dung' => 'required',
            'ngay_xuat_ban' => 'required',
            'tac_gia' => 'required',
            'category_id' => 'required',
            'image' => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/news/{$news['id']}/edit"));
            exit;
        } else {
            $data = [
                'title' => $_POST['tieu_de'],
                'excerpt' => $_POST['mo_ta'],
                'content' => $_POST['noi_dung'],
                'ngay_xuat_ban' => $_POST['ngay_xuat_ban'],
                'category_id' => $_POST['category_id'],
                'tac_gia' => $_POST['tac_gia'],
            ];

            $flagUpload = false;
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

                $flagUpload = true;

                $from = $_FILES['image']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['image']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['image'] = $to;
                } else {
                    $_SESSION['errors']['image'] = 'Upload Không thành công';

                    header('Location: ' . url("admin/news/{$news['id']}/edit"));
                    exit;
                }
            }

            $this->news->update($id, $data);

            if (
                $flagUpload
                && $news['image']
                && file_exists(PATH_ROOT . $news['image'])
            ) {
                unlink(PATH_ROOT . $news['image']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url("admin/news"));
            exit;
        }
    }

    public function delete($id)
    {
        $user = $this->news->findByID($id);

        $this->news->delete($id);

        if (
            $user['image']
            && file_exists(PATH_ROOT . $user['image'])
        ) {
            unlink(PATH_ROOT . $user['image']);
        }

        header('Location: ' . url('admin/news'));
        exit();
    }
}
