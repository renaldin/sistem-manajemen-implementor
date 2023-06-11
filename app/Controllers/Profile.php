<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class Profile extends BaseController
{
    private $ModelUser;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Employee Assesment',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'isi'   => 'profile/v_profile'
        ];

        return view('layout/v_wrapper_admin', $data);
    }

    public function edit()
    {
        $validate = $this->validate([
            'nama_user' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[user.email,user.id_user,' . session()->get('id') . ']',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'valid_email' => '{field} tidak valid',
                    'is_unique' => '{field} sudah terpakai. Silahkan gunakan yang lain!.'
                ],
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
        ]);
        if (!$validate) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }

        $foto = $this->request->getFile('foto');

        if ($foto->getError() == 4) {
            $data = [
                'id_user'       => session()->get('id'),
                'nama_user'     => $this->request->getPost('nama_user'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'email'         => $this->request->getPost('email'),
            ];
            $this->ModelUser->update(session()->get('id'), $data);
        } else {
            $user = $this->ModelUser->find(session()->get('id'));
            if ($user['foto'] != null) {
                unlink('foto_profile/' . $user['foto']);
            }
            $namaFoto = $foto->getRandomName();
            $foto->move('foto_profile', $namaFoto);
            $data = [
                'id_user'       => session()->get('id'),
                'nama_user'     => $this->request->getPost('nama_user'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'email'         => $this->request->getPost('email'),
                'foto'          => $namaFoto
            ];
            $this->ModelUser->update(session()->get('id'), $data);
        }
        session()->setFlashdata('pesan', "Profile berhasil diedit!.");
        return redirect()->to(base_url('profile'));
    }

    public function change_password()
    {
        $validate = $this->validate([
            'password' => [
                'label' => 'Password Lama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'newpassword' => [
                'label' => 'Password Baru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ],
            ],
            'renewpassword' => [
                'label' => 'Password Ulang',
                'rules' => 'required|matches[newpassword]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'matches' => '{field} Tidak Sama.'
                ],
            ],
        ]);
        if (!$validate) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }

        $user = $this->ModelUser->find(session()->get('id'));
        if ($user['password'] != $this->request->getPost('password')) {
            session()->setFlashdata('info', "Password lama salah!.");
            return redirect()->to(base_url('profile'));
        }

        $data = [
            'id_user'   => $user['id_user'],
            'password'  => $this->request->getPost('newpassword')
        ];
        $this->ModelUser->update($user['id_user'], $data);
        session()->setFlashdata('pesan', "Password berhasil diubah!.");
        return redirect()->to(base_url('profile'));
    }
}
