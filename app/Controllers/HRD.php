<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelImplementor;
use App\Models\ModelKaryawan;
use App\Models\ModelPekerjaan;
use App\Models\ModelLeader;
use App\Models\ModelUser;

class HRD extends BaseController
{
    private $ModelKaryawan, $ModelPekerjaan, $ModelImplementor, $ModelLeader, $ModelUser;

    public function __construct()
    {
        helper('form');
        $this->ModelLeader = new ModelLeader();
        $this->ModelKaryawan = new ModelKaryawan();
        $this->ModelPekerjaan = new ModelPekerjaan();
        $this->ModelImplementor = new ModelImplementor();
        $this->ModelUser = new ModelUser();
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
        session()->setFlashdata('pesan', "Input Nilai Berhasil!.");
        return redirect()->to(base_url('hrd'));
    }
}
