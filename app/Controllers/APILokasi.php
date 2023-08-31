<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class APILokasi extends ResourceController
{
    protected $modelName = 'App\Models\LokasiModel';
    protected $format    = 'json';



    public function lokasi()
    {
        // $this->modelName = 'aaaaa';
        // $this->modelName = 'App\Models\LokasiModel';
        $token = $this->request->getPost('_token');
        if ($token == 'aa4EbIOVYafrj6GbH3Ut-;?ytUU-1') {
            $input = $this->request->getPost();
            $date = strtotime($input['lokasi_created_at']);
            $newdate = date('Y-m-d H:i:s', $date);
            $input['lokasi_created_at'] = $newdate;
            if ($this->model->insert($input)) {
                $data = [
                    'status' => 200,
                    'message' => 'record added successfully!',
                ];
                return $this->respond($data, 200);
            } else {
                $data = [
                    'status' => 400,
                    'message' => 'failed',
                    'errors' => json_encode($this->model->errors())
                ];
                return $this->respond($data, 400);
            }
        } else {
            $data = [
                'status' => 400,
                'message' => 'failed',
                'errors' => 'token salah'
            ];
            return $this->respond($data, 400);
        }
    }
}
