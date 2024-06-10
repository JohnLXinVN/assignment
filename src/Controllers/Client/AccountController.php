<?php

namespace Ductong\XuongOop\Controllers\Client;

use Ductong\XuongOop\Commons\Controller;
use Ductong\XuongOop\Commons\Helper;
use Ductong\XuongOop\Models\User;
use Rakit\Validation\Validator;

class AccountController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    // public function index()
    // {
    //     $users = $this->user->all();

    //     Helper::debug($users);

    //     $this->renderViewClient('account', [
    //         'users' => $users

    //     ]);
    // }
    public function show($id)
    {
        $user = $this->user->findByID($id);
        // Helper::debug($user);

        $this->renderViewClient('account.profile', [
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = $this->user->findByID($id);

        $this->renderViewClient('account.edit', [
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

            header('Location: ' . url("account/{$user['id']}/edit"));
            exit;
        } else {
            $data = [
                'email' => $_POST["email"],
                'user_name' => $_POST["user_name"],
                'ho_ten' => $_POST["ho_ten"],
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

                    header('Location: ' . url("account/{$user['id']}/edit"));
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

            header('Location: ' . url("account/{$user['id']}/show"));
            exit;
        }
        // public function forgot($id)
        // {
        //     $user = $this->user->findByID($id);

        //     $this->renderViewClient('account.forgot', [
        //         'user' => $user
        //     ]);
        // }

        // public function confirm($id)
        // {
        //     $user = $this->user->findByID($id);

        //     $validator = new Validator;
        //     $validation = $validator->make($_POST, [
        //         'password' => 'required|min:6',
        //         'confirm_password' => 'required|same:password',
        //     ]);
        //     $validation->validate();
        //     // Helper::debug($user);
        //     if ($validation->fails()) {
        //         $_SESSION['errors'] = $validation->errors()->firstOfAll();

        //         header('Location: ' . url("account/{$user['id']}/forgot"));
        //         exit;
        //     } else {
        //         $data = [
        //             'password' => !empty($_POST['password'])
        //                 ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'],
        //         ];


        //         $this->user->update($id, $data);
        //         // Helper::debug($user);
        //         $_SESSION['status'] = true;
        //         $_SESSION['msg'] = 'Thao tác thành công';

        //         header('Location: ' . url("account/{$user['id']}/show"));
        //         exit;
        //     }
        // }

    }
}
