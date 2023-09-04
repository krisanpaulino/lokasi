<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LokasiModel;
use App\Models\UserModel;

class Lokasi extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $user = $model->findAll();

        $data = [
            'title' => 'Lokasi User',
            'user' => $user
        ];

        return view('lokasi/daftar-user', $data);
    }

    public function detailLokasi()
    {
        $user_token = $this->request->getPost('user_token');
        // dd($user_token);
        $model = new LokasiModel();
        $lokasi = $model->byUser($user_token);

        $model = new UserModel();
        $model->where('user_token', $user_token);
        $user = $model->first();

        $data = [
            'title' => 'Detail Lokasi',
            'user' => $user,
            'lokasi' => $lokasi
        ];

        return view('lokasi/detail', $data);
    }

    public function maps()
    {
        $user_token = $this->request->getPost('user_token');
        // dd($user_token);
        $model = new LokasiModel();
        $lokasi = $model->byUser($user_token);

        $model = new UserModel();
        $model->where('user_token', $user_token);
        $user = $model->first();

        $data = [
            'title' => 'Peta user',
            'user' => $user,
            'lokasi' => $lokasi
        ];

        return view('lokasi/maps', $data);
    }
}
