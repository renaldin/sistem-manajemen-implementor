<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{

    public function cekEmail($email)
    {
        return $this->db->table('user')
            ->where('email', $email)->get()->getRowArray();
    }

    public function cekPassword($password)
    {
        return $this->db->table('user')
            ->where('password', $password)->get()->getRowArray();
    }
}
