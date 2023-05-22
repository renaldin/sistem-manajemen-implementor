<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{

    public function cekUser($email, $password)
    {
        return $this->db->table('user')
            ->where([
                'email' => $email,
                'password' => $password
            ])->get()->getRowArray();
    }
}
