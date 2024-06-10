<?php

namespace Ductong\XuongOop\Controllers\Client;

use Ductong\XuongOop\Commons\Controller;
use Ductong\XuongOop\Commons\Helper;
use Ductong\XuongOop\Models\User;
use Rakit\Validation\Validator;

class LoginController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function showFormLogin()
    {
        auth_check();

        $this->renderViewClient('login');

    }

    public function login()
    {
        auth_check();

        try {
            $user = $this->user->findByEmail($_POST['email']);

            if (empty($user)) {
                throw new \Exception('Không tồn tại email: ' . $_POST['email']);
            }

            $flag = password_verify($_POST['password'], $user['password']);
            if ($flag) {

                $_SESSION['user'] = $user;
                // if ($user['vai_tro'] == 'admin') {
                //     header('Location: ' . url('admin/'));
                //     exit;
                // }

                header('Location: ' . url());
                exit;
                // header('Location: ' . url('admin/'));
                // exit;
            }

            throw new \Exception('Password không đúng');
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();

            header('Location: ' . url('login'));
            exit;
        }
    }
    public function showFormLogup()
    {
        auth_check();
        $this->renderViewClient('register');

    }
    public function logup()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'user_name' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            // Helper::debug($_SESSION['errors']);
            header('Location: ' . url('logup'));
            exit;
        } else {
            $data = [
                'user_name' => $_POST['user_name'],
                'email' => $_POST['email'],
                'vai_tro' => "0",
                'kich_hoat' => "1",
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ];
            // Helper::debug($data);
            $this->user->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url('login'));
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);

        header('Location: ' . url());
        exit;
    }
}
