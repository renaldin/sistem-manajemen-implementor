<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKaryawan extends Model
{

    public function insertAbsen($data)
    {
        $this->db->table('absen')->insert($data);
    }

    public function cekAbsen($id, $tanggal_sekarang)
    {
        return $this->db->table('absen')->where([
            'id_user' => $id,
            'tgl_absen' => $tanggal_sekarang
        ])->get()->getRowArray();
    }
}
