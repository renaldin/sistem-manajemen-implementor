<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLeader extends Model
{
    public function getAll()
    {
        return $this->db->table('user')
            ->join('nilai', 'nilai.id_user = user.id_user')
            ->where([
                'role' => 'Karyawan',
                // 'status' => null
            ])
            ->orderBy('user.id_user', 'DESC')
            ->get()->getResultArray();
    }

    public function getAllHistory()
    {
        return $this->db->table('user')
            ->join('nilai', 'nilai.id_user = user.id_user')
            ->where([
                'role' => 'Karyawan',
                // 'status' => null
            ])
            ->orderBy('user.id_user', 'DESC')
            ->get()->getResultArray();
    }

    public function getAllForHRD()
    {
        return $this->db->table('user')
            ->join('nilai', 'nilai.id_user = user.id_user')
            ->where([
                'role' => 'Karyawan',
                'nilai_leader !='  => null,
                // 'status' => null
            ])
            ->orderBy('user.id_user', 'DESC')
            ->get()->getResultArray();
    }

    public function countRumahSakit()
    {
        return $this->db->table('rumah_sakit')->where('status', null)->countAllResults();
    }

    public function countImplementor()
    {
        return $this->db->table('implementor')->countAllResults();
    }

    public function countEmploye()
    {
        return $this->db->table('user')->where('status !=', null)->countAllResults();
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
        // echo '<pre>';
        return $this->db->table('user')
            ->select(['user.*', 'implementor.tanggal_selesai', 'rumah_sakit.status as status_rumah_sakit'])
            ->join('implementor', 'implementor.id_user = user.id_user', 'left')
            ->join('rumah_sakit', 'rumah_sakit.id_rumah_sakit = implementor.id_rumah_sakit', 'left')
            ->where([
                'role' => 'Karyawan',
                'user.status !='   => null,
                'user.status !='    => 'Tidak Diterima'
            ])
            ->get()->getResultArray();
        // echo '</pre>';
        // die();
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

    public function updateStatusEmploye($data)
    {
        $this->db->table('user')->where('id_user', $data['id_user'])->update($data);
    }

    public function cekImplementorInRumahSakit($id_rumah_sakit)
    {
        return $this->db->table('implementor')->where('id_rumah_sakit', $id_rumah_sakit)->get()->getRowArray();
    }

    public function getAllAbsen()
    {
        return $this->db->table('absen')
            ->join('user', 'user.id_user = absen.id_user')
            ->where('absen.status', null)->get()->getResultArray();
    }

    public function getRiwayatAbsen()
    {
        return $this->db->table('absen')
            ->join('user', 'user.id_user = absen.id_user')
            ->where('absen.status !=', null)->get()->getResultArray();
    }

    public function getAbsenById($id)
    {
        return $this->db->table('absen')
            ->join('user', 'user.id_user = absen.id_user')
            ->where('absen.id_absen', $id)->get()->getRowArray();
    }

    public function updateAbsen($data)
    {
        $this->db->table('absen')->where('id_absen', $data['id_absen'])->update($data);
    }

    public function getImplementor()
    {
        return $this->db->table('implementor')
            ->select(['implementor.id_implementor', 'implementor.tanggal_mulai', 'implementor.tanggal_selesai', 'user.nama_user', 'rumah_sakit.status'])
            ->join('user', 'user.id_user = implementor.id_user')
            ->join('rumah_sakit', 'rumah_sakit.id_rumah_sakit = implementor.id_rumah_sakit')
            ->where([
                'user.status' => 'Implementor',
                'rumah_sakit.status' => null
            ])
            ->get()->getResultArray();
    }

    public function update_implementor($data)
    {
        $this->db->table('implementor')->where('id_user', $data['id_user'])->update($data);
    }
}
