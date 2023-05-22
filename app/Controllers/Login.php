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

            // cek user
            $cek = $this->ModelLogin->cekUser($email, $password);
            if ($cek) {
                // jika benar
                session()->set('log', true);
                session()->set('id', $cek['id_user']);
                session()->set('nama', $cek['nama_user']);
                session()->set('jk', $cek['jenis_kelamin']);
                session()->set('email', $cek['email']);
                session()->set('role', $cek['role']);
                session()->setFlashdata('pesan', "Login $cek[nama_user] berhasil.");
                return redirect()->to(base_url('dashboard'));
            } else {
                // jika salah
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
