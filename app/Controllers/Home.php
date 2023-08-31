<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Lokasi Unwira';
        if (session()->has('admin_log'))
            // return view('dashboard', $data);
            return redirect()->to('lokasi');
        else
            return redirect()->to('login');
    }
}
