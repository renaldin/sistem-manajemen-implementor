<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class Login extends BaseController
{

    private $ModelLogin, $ModelUser;

    public function __construct()
    {
        helper('form');
        $this->ModelUser = new ModelUser();
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
            $cekEmail = $this->ModelUser->where('email', $email)->get()->getRowArray();


            // var_dump($cekEmail[0]['password']);
            if ($cekEmail) {
                // jika username benar, cek password
                // $cekPassword = $this->ModelUser->where('password', $password)->find();
                if ($cekEmail['password'] == $password) {

                    if ($cekEmail['role'] == 'Karyawan') {
                        if ($cekEmail['status'] == null || $cekEmail['status'] == 'Tidak Diterima') {
                            session()->setFlashdata('pesan', "Akun anda belum Diterima atau belum menjadi Implementor!.");
                            return redirect()->back()->withInput();
                        }
                    }

                    session()->set('log', true);
                    session()->set('id', $cekEmail['id_user']);
                    session()->set('nama', $cekEmail['nama_user']);
                    session()->set('jk', $cekEmail['jenis_kelamin']);
                    session()->set('email', $cekEmail['email']);
                    session()->set('role', $cekEmail['role']);
                    session()->setFlashdata('pesan', "Login $cekEmail[nama_user] berhasil.");
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
