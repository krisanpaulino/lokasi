<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'lokasi';
    protected $primaryKey       = 'lokasi_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['lokasi_token', 'lokasi_nama', 'lokasi_latitude', 'lokasi_longitude', 'lokasi_created_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'lokasi_token' => 'required',
        'lokasi_nama' => 'required',
        'lokasi_latitude' => 'required',
        'lokasi_longitude' => 'required',
        'lokasi_created_at' => 'required'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function byUser($user_token)
    {
        $this->where('lokasi_token', $user_token);
        $this->orderBy('lokasi_created_at', 'desc');
        return $this->findAll();
    }
}
