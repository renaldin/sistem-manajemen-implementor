<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRumahSakit extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'rumah_sakit';
    protected $primaryKey       = 'id_rumah_sakit';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_rumah_sakit', 'nama_rumah_sakit', 'alamat_rumah_sakit', 'deskripsi_rumah_sakit', 'tgl_mulai_kerjasama', 'tgl_akhir_kerjasama', 'status'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
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
}
