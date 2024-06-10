<?php


namespace Ductong\XuongOop\Controllers\Admin;

use Ductong\XuongOop\Commons\Controller;
use Ductong\XuongOop\Commons\Helper;
use Ductong\XuongOop\Models\Category;
use Ductong\XuongOop\Models\News;
use Rakit\Validation\Validator;

class CategoryController extends Controller
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
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        [$category, $totalPage] = $this->category->paginate($_GET['page'] ?? 1);

        // Helper::debug($categorys);

        $this->renderViewAdmin('category.index', [
            'category' => $category,
            'totalPage' => $totalPage,
            "currentPage" => $currentPage
        ]);


    }

    public function create()
    {
        $this->renderViewAdmin('category.create');
    }

    public function store()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST, [
            'name' => 'required|max:60',

        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            // Helper::debug($_SESSION['errors']);
            header('Location: ' . url('admin/category/create'));
            exit;
        } else {
            $data = [
                'name' => $_POST['name'],

            ];
            // Helper::debug($data);


            $this->category->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url('admin/category'));
            exit;
        }
    }

    public function update($id)
    {
        $category = $this->category->findByID($id);
        $validator = new Validator;
        $validation = $validator->make($_POST, [
            'name' => 'required|max:60',

        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            // Helper::debug($_SESSION['errors']);
            header('Location: ' . url("admin/category/" . $category['id'] . "/edit"));
            exit;
        } else {
            $data = [
                'name' => $_POST['name'],

            ];
            // Helper::debug($data);


            $this->category->update($id, $data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url('admin/category'));
            exit;
        }

    }

    public function edit($id)
    {
        $category = $this->category->findByID($id);

        // Helper::debug($category);
        $this->renderViewAdmin('category.edit', [
            'category' => $category
        ]);
    }
    public function delete($id)
    {
        $category = $this->category->findByID($id);

        $data = [
            'category_id' => 13,
        ];
        // Helper::debug($data);


        $this->news->updateByCategory($id, $data);

        $this->category->delete($id);


        header('Location: ' . url('admin/category'));
        exit();
    }

}

