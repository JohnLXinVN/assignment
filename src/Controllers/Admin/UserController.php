<?php

namespace Ductong\XuongOop\Controllers\Admin;

use Ductong\XuongOop\Commons\Controller;
use Ductong\XuongOop\Commons\Helper;
use Ductong\XuongOop\Models\User;
use Rakit\Validation\Validator;

class UserController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

        [$users, $totalPage] = $this->user->paginate($_GET['page'] ?? 1);

        // Helper::debug($users);

        $this->renderViewAdmin('users.index', [
            'users' => $users,
            'totalPage' => $totalPage,
            "currentPage" => $currentPage
        ]);
    }

    public function create()
    {
        $this->renderViewAdmin('users.create');
    }

    public function store()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'user_name' => 'required|max:50',
            'ho_ten' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'image' => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            // Helper::debug($_SESSION['errors']);
            header('Location: ' . url('admin/users/create'));
            exit;
        } else {
            $data = [
                'user_name' => $_POST['user_name'],
                'email' => $_POST['email'],
                'ho_ten' => $_POST['ho_ten'],
                'kich_hoat' => $_POST['kich_hoat'],
                'vai_tro' => $_POST['vai_tro'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ];
            // Helper::debug($data);
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

                $from = $_FILES['image']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['image']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['image'] = $to;
                } else {
                    $_SESSION['errors']['image'] = 'Upload Không thành công';

                    header('Location: ' . url('admin/users/create'));
                    exit;
                }
            }

            $this->user->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url('admin/users'));
            exit;
        }
    }

    public function show($id)
    {
        $user = $this->user->findByID($id);

        $this->renderViewAdmin('users.show', [
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = $this->user->findByID($id);

        $this->renderViewAdmin('users.edit', [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        
        $user = $this->user->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'email' => 'required|email',
            'user_name' => 'required|max:50',
            'ho_ten' => 'required|max:50',
            'password' => 'nullable|min:6',
            'confirm_password' => 'nullable|same:password',
            'image' => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/users/{$user['id']}/edit"));
            exit;
        } else {
            $data = [
                'email' => $_POST["email"],
                'user_name' => $_POST["user_name"],
                'ho_ten' => $_POST["ho_ten"],
                'kich_hoat'=> $_POST["kich_hoat"],
                'vai_tro' => $_POST["vai_tro"],
                'password' => !empty($_POST['password'])
                    ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'],
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

                    header('Location: ' . url("admin/users/{$user['id']}/edit"));
                    exit;
                }
            }

            $this->user->update($id, $data);

            if (
                $flagUpload
                && $user['image']
                && file_exists(PATH_ROOT . $user['image'])
            ) {
                unlink(PATH_ROOT . $user['image']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url("admin/users"));
            exit;
        }
    }

    public function delete($id)
    {
        $user = $this->user->findByID($id);

        $this->user->delete($id);

        if (
            $user['image']
            && file_exists(PATH_ROOT . $user['image'])
        ) {
            unlink(PATH_ROOT . $user['image']);
        }

        header('Location: ' . url('admin/users'));
        exit();
    }
}
