<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;

class Login extends BaseController
{

    private $ModelLogin;

    public function __construct()
    {
        helper('form');
        $this->ModelLogin = new ModelLogin;
    }

    public function index()
    {
        return view('login/v_login', [
            'title' => 'Login'
        ]);
    }

    public function cek_login()
    {
        // validasi
        $validasi = [
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} Wajib Diisi.',
                    'valid_email' => 'Silahkan Masukan {field} Valid',
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
        ];

        if ($this->validate($validasi)) {
            // jika valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            // cek pada tabel leader
            $cekLeader = $this->ModelLogin->cekLeader($email, $password);
            if ($cekLeader) {
                // jika benar sebagai leader
                session()->set('log', true);
                session()->set('id', $cekLeader['id_leader']);
                session()->set('nama', $cekLeader['nama_leader']);
                session()->set('jk', $cekLeader['jenis_kelamin']);
                session()->set('email', $cekLeader['email_leader']);
                session()->set('role', 'Leader');
                session()->setFlashdata('pesan', "Login $cekLeader[nama_leader] berhasil.");
                return redirect()->to(base_url('dashboard'));
            } else {
                // jika salah cek sebagai karyawan
                $cekKaryawan = $this->ModelLogin->cekKaryawan($email, $password);
                if ($cekKaryawan) {
                    session()->set('log', true);
                    session()->set('id', $cekKaryawan['id_karyawan']);
                    session()->set('nama', $cekKaryawan['nama_karyawan']);
                    session()->set('jk', $cekKaryawan['jenis_kelamin']);
                    session()->set('email', $cekKaryawan['email_karyawan']);
                    session()->set('role', 'Karyawan');
                    session()->setFlashdata('pesan', "Login $cekKaryawan[nama_karyawan] berhasil.");
                    return redirect()->to(base_url('liveLocation'));
                }
                // jika leader dan karyawan salah
                session()->setFlashdata('pesan', 'Login gagal! Email atau password salah.');
                return redirect()->to(base_url('login'));
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('login'))->withInput();
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('id');
        session()->remove('nama');
        session()->remove('jk');
        session()->remove('email');
        session()->remove('role');

        session()->setFlashdata('logout', 'Logout Berhasil!');
        return redirect()->to(base_url('login'));
    }
}
