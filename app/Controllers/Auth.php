<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->has('admin_log')) {
            return redirect()->to('lokasi');
        }
        // dd(session('user'));
        return view('login');
    }

    public function login()
    {
        $model = new AdminModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->getLoginData($username);
        // dd($user->user_password);
        if ($user == null) {
            return redirect()->to(previous_url())
                ->with('danger', 'Username tidak ditemukan!');
        }

        if (!password_verify($password, $user->password)) {
            return redirect()->to(previous_url())
                ->with('danger', 'Password Salah!');
        }

        $data = [
            'user' => $user,
            'admin_log' => 1,
        ];
        session()->set($data);
        // dd(session('user'));
        return redirect()->to('/');
    }

    public function logout()
    {
        session()->destroy();
        // dd('here');
        return redirect()->to('/login');
    }
}
