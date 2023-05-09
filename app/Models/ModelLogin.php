<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{

    public function cekLeader($email, $password)
    {
        return $this->db->table('leader')
            ->where([
                'email_leader' => $email,
                'password_leader' => $password
            ])->get()->getRowArray();
    }

    public function cekKaryawan($email, $password)
    {
        return $this->db->table('karyawan')
            ->where([
                'email_karyawan' => $email,
                'password_karyawan' => $password
            ])->get()->getRowArray();
    }
}
