<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLeader extends Model
{
    public function getAll()
    {
        return $this->db->table('user')
            ->where([
                'role' => 'Karyawan',
                'status' => null
            ])
            ->get()->getResultArray();
    }

    public function getEmployeById($id)
    {
        return $this->db->table('user')->where('id_user', $id)->get()->getRowArray();
    }

    public function getAllRumahSakit()
    {
        return $this->db->table('rumah_sakit')->get()->getResultArray();
    }

    public function getRumahSakitById($id_rumah_sakit)
    {
        return $this->db->table('rumah_sakit')->where('id_rumah_sakit', $id_rumah_sakit)->get()->getRowArray();
    }

    public function insertRumahSakit($data)
    {
        $this->db->table('rumah_sakit')->insert($data);
    }

    public function editRumahSakit($data)
    {
        $this->db->table('rumah_sakit')->where('id_rumah_sakit', $data['id_rumah_sakit'])->update($data);
    }

    public function getAllEmploye()
    {
        return $this->db->table('user')
            ->where('role', 'Karyawan')
            ->get()->getResultArray();
    }

    public function insertImpelementor($data)
    {
        $this->db->table('implementor')->insert($data);
    }

    public function getAllImplementorWithRumahSakit()
    {
        return $this->db->table('implementor')
            ->join('rumah_sakit', 'rumah_sakit.id_rumah_sakit = implementor.id_rumah_sakit', 'left')
            ->join('user', 'user.id_user = implementor.id_user', 'left')
            ->get()->getResultArray();
    }
}
