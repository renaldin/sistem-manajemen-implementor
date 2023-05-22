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
            $cekEmail = $this->ModelLogin->cekEmail($email);
            if ($cekEmail) {
                // jika username benar, cek password
                $cekPassword = $this->ModelLogin->cekPassword($password);
                if ($cekPassword) {
                    session()->set('log', true);
                    session()->set('id', $cekPassword['id_user']);
                    session()->set('nama', $cekPassword['nama_user']);
                    session()->set('jk', $cekPassword['jenis_kelamin']);
                    session()->set('email', $cekPassword['email']);
                    session()->set('role', $cekPassword['role']);
                    session()->setFlashdata('pesan', "Login $cekPassword[nama_user] berhasil.");
                    return redirect()->to(base_url('dashboard'));
                } else {
                    // jika salah
                    session()->setFlashdata('pesan', 'Login gagal! Password salah.');
                    return redirect()->back()->withInput();
                }
            } else {
                // jika salah
                session()->setFlashdata('pesan', 'Login gagal! Email salah.');
                return redirect()->back()->withInput();
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
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
