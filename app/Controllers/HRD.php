<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelImplementor;
use App\Models\ModelKaryawan;
use App\Models\ModelPekerjaan;
use App\Models\ModelLeader;
use App\Models\ModelNilai;
use App\Models\ModelUser;

class HRD extends BaseController
{
    private $ModelKaryawan, $ModelPekerjaan, $ModelImplementor, $ModelLeader, $ModelUser, $ModelNilai;

    public function __construct()
    {
        helper('form');
        $this->ModelLeader = new ModelLeader();
        $this->ModelKaryawan = new ModelKaryawan();
        $this->ModelPekerjaan = new ModelPekerjaan();
        $this->ModelImplementor = new ModelImplementor();
        $this->ModelUser = new ModelUser();
        $this->ModelNilai = new ModelNilai();
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Employee Assesment',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'data'  => $this->ModelLeader->getAll(),
            'isi'   => 'hrd/v_index'
        ];

        return view('layout/v_wrapper_admin', $data);
    }

    public function input_nilai($id)
    {
        $data = [
            'title' => 'Input Nilai Employee',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'data'  => $this->ModelLeader->getEmployeById($id),
            'isi'   => 'hrd/v_nilai_hrd'
        ];

        return view('layout/v_wrapper_admin', $data);
    }

    public function save_nilai()
    {
        $validate = $this->validate([
            'public_speaking' => [
                'label' => 'Public Speaking',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai {field} Wajib Diisi.',
                ],
            ],
            'tanya_jawab' => [
                'label' => 'Tanya Jawab',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai {field} wajib diisi.'
                ],
            ],
            'soal' => [
                'label' => 'Soal',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai {field} wajib diisi.'
                ],
            ],
        ]);
        if (!$validate) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }

        $ps = $this->request->getPost('public_speaking');
        $tj =  $this->request->getPost('tanya_jawab');
        $s = $this->request->getPost('soal');

        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'nilai_hrd' => $ps + $tj + $s,
        ];

        $this->ModelUser->update($this->request->getPost('id_user'), $data);
        $data_nilai = $this->ModelNilai->where('id_user', $this->request->getPost('id_user'))->first();
        $this->ModelNilai->update($data_nilai['id_nilai'], [
            'hrd_public_speaking' => $ps,
            'hrd_tanya_jawab'    => $tj,
            'hrd_soal'           => $s
        ]);
        session()->setFlashdata('pesan', "Input Nilai Berhasil!.");
        return redirect()->to(base_url('hrd'));
    }

    public function detail($id_user)
    {
        $karyawan = $this->ModelLeader->getEmployeById($id_user);

        if ($karyawan['status'] == null) {
            session()->setFlashdata('info', "Leader Belum Menghitung Hasil!.");
            return redirect()->to(base_url('hrd'));
        }

        $data = [
            'title' => 'Detail Nilai Karyawan',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'data'  => $karyawan,
            'isi'   => 'hrd/v_detail_nilai'
        ];

        return view('layout/v_wrapper_admin', $data);
    }

    public function riwayat_employee()
    {
        $data = [
            'title' => 'History Employee',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'data'  => $this->ModelUser->join('nilai', 'nilai.id_user = user.id_user')->where('send_email', '1')->orderBy('user.id_user', 'DESC')->findAll(),
            'isi'   => 'hrd/v_riwayat'
        ];

        return view('layout/v_wrapper_admin', $data);
    }
}
