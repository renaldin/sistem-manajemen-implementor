<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAbsen;
use App\Models\ModelImplementor;
use App\Models\ModelLeader;
use App\Models\ModelNilai;
use App\Models\ModelPekerjaan;
use App\Models\ModelRumahSakit;
use App\Models\ModelUser;

class Leader extends BaseController
{

    private $ModelLeader, $ModelRumahSakit, $ModelImplementor, $ModelPekerjaan, $ModelUser, $ModelAbsen, $ModelNilai;

    public function __construct()
    {
        helper('form');
        $this->ModelLeader = new ModelLeader();
        $this->ModelRumahSakit = new ModelRumahSakit();
        $this->ModelImplementor = new ModelImplementor();
        $this->ModelPekerjaan = new ModelPekerjaan();
        $this->ModelUser = new ModelUser();
        $this->ModelAbsen = new ModelAbsen();
        $this->ModelNilai = new ModelNilai();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {

        $data = [
            'title' => 'Dashboard',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'count_rumahsakit' => $this->ModelLeader->countRumahSakit(),
            'count_implementor' => $this->ModelLeader->countImplementor(),
            'count_employe' => $this->ModelLeader->countEmploye(),
            'isi'   => 'leader/v_dashboard'
        ];

        return view('layout/v_wrapper_admin', $data);
    }

    // menu manage employe assesment

    public function m_employe_assesment()
    {
        $data = [
            'title' => 'Manage Employe Assesment',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'data'  => $this->ModelLeader->getAll(),
            'isi'   => 'leader/manage_employe/v_m_employe_assesment'
        ];

        return view('layout/v_wrapper_admin', $data);
    }

    public function nilai_employe($id)
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
        if ($this->request->getPost()) {
            if (!$validate) {
                session()->setFlashdata('errors', \config\Services::validation()->getErrors());
                return redirect()->to(base_url('m_employe_assesment/' . $id));
            }

            $ps = $this->request->getPost('public_speaking');
            $tj =  $this->request->getPost('tanya_jawab');
            $s = $this->request->getPost('soal');

            $data = [
                'id_user'       => $id,
                'nilai_leader'  => $ps + $tj + $s,
            ];

            $this->ModelUser->update($id, $data);
            $data_nilai = $this->ModelNilai->where('id_user', $id)->first();
            $this->ModelNilai->update($data_nilai['id_nilai'], [
                'leader_public_speaking' => $ps,
                'leader_tanya_jawab'    => $tj,
                'leader_soal'           => $s
            ]);
            session()->setFlashdata('pesan', "Input Nilai Berhasil!.");
            return redirect()->to(base_url('m_employe_assesment'));
            // $data = [
            //     'title' => 'Input Employe Values',
            //     'input_employe' => $input_employe,
            //     'data'  => $this->ModelLeader->getEmployeById($id),
            //     'isi'   => 'leader/manage_employe/v_nilai_hrd'
            // ];
        } else {
            $data = [
                'title' => 'Input Employe Values',
                'user'  => $this->ModelUser->find(session()->get('id')),
                'data'  => $this->ModelLeader->getEmployeById($id),
                'isi'   => 'leader/manage_employe/v_nilai_leader'
            ];
        }
        return view('layout/v_wrapper_admin', $data);
    }

    public function hasil($id)
    {
        // hitung jumlah nilai
        $user = $this->ModelUser->find($id);
        $hitung = $user['nilai_leader'] + $user['nilai_hrd'];
        $hasil = 'Tidak Diterima';
        if ($hitung >= 10) {
            $hasil = 'Diterima';
        }

        // update status
        $status = [
            'id_user' => $id,
            'status' => $hasil
        ];
        // $this->ModelLeader->updateStatusEmploye($status);

        // get email employe
        $getEmploye = $this->ModelLeader->getEmployeById($id);
        $data = [
            'title' => 'Hasil Employe Assesment',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'data'  => $this->ModelLeader->getAll(),
            'hasil' => [
                'nilai' => $hitung,
                'status' => $hasil,
                'employe' => $getEmploye
            ],
            'isi'   => 'leader/manage_employe/v_hasil_nilai'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function konfirmasi_employe()
    {
        $employe = $this->ModelUser->find($this->request->getPost('id_user'));
        if ($employe['approve_hrd'] == null) {
            session()->setFlashdata('info', "HRD Belum melakukan Approve Penilaian!.");
            return redirect()->back();
        }
        $this->ModelLeader->updateStatusEmploye(['id_user' => $this->request->getPost('id_user'), 'status' => $this->request->getPost('hasil')]);
        session()->setFlashdata('pesan', "Konfirmasi Berhasil!.");
        return redirect()->to(base_url('m_employe_assesment'));
    }

    public function insert_employe()
    {
        $cek_email_sama = $this->ModelUser->where('email', $this->request->getPost('email'))->first();
        $duplikat_email = 'Gaboleh';
        if ($cek_email_sama) {
            if ($cek_email_sama['status'] == 'Tidak Diterima') {
                $duplikat_email = 'Boleh';
            }
        }

        // var_dump($duplikat_email);
        // die();

        if ($duplikat_email == 'Boleh') {
            $validasi = [
                'nama_user' => [
                    'label' => 'Nama',
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required'      => '{field} Wajib Diisi.',
                        'alpha_space'   => '{field} Tidak Boleh Mengandung Angka.',
                    ],
                ],
                'jenis_kelamin' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'tempat_lahir' => [
                    'label' => 'Tempat Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'tgl_lahir' => [
                    'label' => 'Tanggal Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'agama' => [
                    'label' => 'Agama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'no_telp' => [
                    'label' => 'Nomor Telepon',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'pendidikan_terakhir' => [
                    'label' => 'Pendidikan Terakhir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'pengalaman_kerja' => [
                    'label' => 'Pengalaman Kerja',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'skill' => [
                    'label' => 'Skill',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.',
                        'is_unique' => '{field} sudah terpakai. Silahkan gunakan yang lain!.'
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
        } else {
            $validasi = [
                'nama_user' => [
                    'label' => 'Nama',
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required'      => '{field} Wajib Diisi.',
                        'alpha_space'   => '{field} Tidak Boleh Mengandung Angka.',
                    ],
                ],
                'jenis_kelamin' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'tempat_lahir' => [
                    'label' => 'Tempat Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'tgl_lahir' => [
                    'label' => 'Tanggal Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'agama' => [
                    'label' => 'Agama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'no_telp' => [
                    'label' => 'Nomor Telepon',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'pendidikan_terakhir' => [
                    'label' => 'Pendidikan Terakhir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'pengalaman_kerja' => [
                    'label' => 'Pengalaman Kerja',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'skill' => [
                    'label' => 'Skill',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|is_unique[user.email]',
                    'errors' => [
                        'required' => '{field} wajib diisi.',
                        'is_unique' => '{field} sudah terpakai. Silahkan gunakan yang lain!.'
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
        }
        if ($this->validate($validasi)) {
            $data = [
                'nama_user'             => $this->request->getPost('nama_user'),
                'jenis_kelamin'         => $this->request->getPost('jenis_kelamin'),
                'email'                 => $this->request->getPost('email'),
                'password'              => $this->request->getPost('password'),
                'role'                  => 'Karyawan',
                'alamat'                => $this->request->getPost('alamat'),
                'tempat_lahir'          => $this->request->getPost('tempat_lahir'),
                'tgl_lahir'             => $this->request->getPost('tgl_lahir'),
                'agama'                 => $this->request->getPost('agama'),
                'no_telp'               => $this->request->getPost('no_telp'),
                'pendidikan_terakhir'   => $this->request->getPost('pendidikan_terakhir'),
                'pengalaman_kerja'      => $this->request->getPost('pengalaman_kerja'),
                'skill'                 => $this->request->getPost('skill'),
            ];
            $this->ModelLeader->db->table('user')->insert($data);
            $data_terakhir = $this->ModelUser->orderBy('id_user', 'DESC')->first();
            $this->ModelNilai->insert(['id_user' => $data_terakhir['id_user']]);
            session()->setFlashdata('pesan', "Data Berhasil Tambah!.");
            return redirect()->to(base_url('m_employe_assesment'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('m_employe_assesment'))->withInput();
        }
    }

    public function kirim_email()
    {
        $validate = $this->validate([
            'pesan' => [
                'label' => 'Isi Pesan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi.',
                ],
            ],
        ]);
        if (!$validate) {
            session()->setFlashdata('info', "Isi Pesan Wajib diisi!.");
            return redirect()->back()->withInput();
        }
        $email = \Config\Services::email();

        $fromEmail = 'putrifitriani559@gmail.com';
        $email->setFrom($fromEmail);
        $emailUser = $this->request->getPost('email');
        $toFrom = $emailUser;
        $email->setTo($toFrom);
        $subject = $this->request->getPost('subject');
        $email->setSubject($subject);
        $pesan = $this->request->getPost('pesan');
        $body = "
            <h3>$pesan</h3>
            ";
        $message = $body;
        $email->setMessage($message);
        $email->send();
        $this->ModelUser->update($this->request->getPost('id_user'), ['send_email' => '1']);
        session()->setFlashdata('pesan', "Kirim Email Berhasil!.");
        return redirect()->to(base_url('m_employe_assesment'));
    }

    public function delete_employe($id)
    {
        $this->ModelUser->delete($id);
        session()->setFlashdata('pesan', "Employe Berhasil Dihapus!.");
        return redirect()->to(base_url('m_employe_assesment'));
    }

    public function history_employe()
    {
        $data = [
            'title' => 'History Employee',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'data'  => $this->ModelLeader->getAll(),
            'isi'   => 'leader/manage_employe/v_riwayat_employe'
        ];

        return view('layout/v_wrapper_admin', $data);
    }

    // menu manage work position

    public function m_work_position()
    {
        $data = [
            'title' => 'Manage Work Position',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'data'  => $this->ModelRumahSakit
                ->where([
                    'rumah_sakit.status' => null,
                ])
                ->findAll(),
            'implementor' => $this->ModelLeader->getAllImplementorWithRumahSakit(),
            'pagination' => $this->ModelRumahSakit->pager,
            'isi'   => 'leader/work_position/v_m_work_position'
        ];

        // echo '<pre>';
        // var_dump($data['data']);
        // // echo date('Y-m-d');
        // echo '</pre>';
        // die();

        return view('layout/v_wrapper_admin', $data);
    }

    public function insert_work_position()
    {
        $nama_rumah_sakit = $this->request->getPost('nama_rumah_sakit');
        $alamat_rumah_sakit = $this->request->getPost('alamat_rumah_sakit');
        $deskripsi_rumah_sakit = $this->request->getPost('deskripsi_rumah_sakit');

        $cek_nama_rs = $this->ModelRumahSakit->where([
            'nama_rumah_sakit' => $this->request->getPost('nama_rumah_sakit'),
            'status'    => 'Cancle'
        ])->first();

        if ($cek_nama_rs) {
            $validasi = [
                'nama_rumah_sakit' => [
                    'label' => 'Nama Rumah Sakit',
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => '{field} Wajib Diisi.',
                        'is_unique' => '{field} Tidak Diperbolehkan sama.',
                        'alpha_space' => '{field} Tidak Boleh Berisi Angka.',
                    ],
                ],
                'alamat_rumah_sakit' => [
                    'label' => 'Alamat Rumah Sakit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'deskripsi_rumah_sakit' => [
                    'label' => 'Deskripsi Rumah Sakit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
            ];
        } else {
            $validasi = [
                'nama_rumah_sakit' => [
                    'label' => 'Nama Rumah Sakit',
                    'rules' => 'required|is_unique[rumah_sakit.nama_rumah_sakit]|alpha_space',
                    'errors' => [
                        'required' => '{field} Wajib Diisi.',
                        'is_unique' => '{field} Tidak Diperbolehkan sama.',
                        'alpha_space' => '{field} Tidak Boleh Berisi Angka.',
                    ],
                ],
                'alamat_rumah_sakit' => [
                    'label' => 'Alamat Rumah Sakit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'deskripsi_rumah_sakit' => [
                    'label' => 'Deskripsi Rumah Sakit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
            ];
        }


        if ($this->validate($validasi)) {
            $data = [
                'nama_rumah_sakit' => $nama_rumah_sakit,
                'alamat_rumah_sakit' => $alamat_rumah_sakit,
                'deskripsi_rumah_sakit' => $deskripsi_rumah_sakit,
            ];
            $this->ModelLeader->insertRumahSakit($data);
            session()->setFlashdata('pesan', "Data Berhasil Ditambah!.");
            return redirect()->to(base_url('m_work_position'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('m_work_position'))->withInput();
        }
    }

    public function edit_work_position()
    {
        $id_rumah_sakit = $this->request->getPost('id_rumah_sakit');
        $nama_rumah_sakit = $this->request->getPost('nama_rumah_sakit');
        $alamat_rumah_sakit = $this->request->getPost('alamat_rumah_sakit');
        $deskripsi_rumah_sakit = $this->request->getPost('deskripsi_rumah_sakit');

        $validasi = [
            'nama_rumah_sakit' => [
                'label' => 'Nama Rumah Sakit',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi.',
                ],
            ],
            'alamat_rumah_sakit' => [
                'label' => 'Alamat Rumah Sakit',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'deskripsi_rumah_sakit' => [
                'label' => 'Deskripsi Rumah Sakit',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
        ];
        if ($this->validate($validasi)) {
            $data = [
                'id_rumah_sakit' => $id_rumah_sakit,
                'nama_rumah_sakit' => $nama_rumah_sakit,
                'alamat_rumah_sakit' => $alamat_rumah_sakit,
                'deskripsi_rumah_sakit' => $deskripsi_rumah_sakit,
            ];
            $this->ModelLeader->editRumahSakit($data);
            session()->setFlashdata('pesan', "Data Berhasil Diedit!.");
            return redirect()->to(base_url('m_work_position'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('m_work_position'))->withInput();
        }
    }

    public function tambah_implementor_rs($id_rumah_sakit)
    {
        if ($this->ModelLeader->cekImplementorInRumahSakit($id_rumah_sakit)) {
            // jika rumah sakit sudah ada implementor, redirect back
            session()->setFlashdata('info', "Implementor sudah ada!.");
            return redirect()->back();
        }

        if ($this->request->getPost()) {
            $validate = $this->validate([
                'id_user' => [
                    'label' => 'Implementor 1',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ],
                ],
                'email' => [
                    'label' => 'Email',
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

            if ($this->request->getPost('tanggal_mulai') > $this->request->getPost('tanggal_selesai')) {
                session()->setFlashdata('info', "Tanggal Selesai Harus Melewati Tanggal Mulai!.");
                return redirect()->back()->withInput();
            }

            if ($this->request->getPost('tanggal_mulai') < date('Y-m-d')) {
                session()->setFlashdata('info', "Tanggal Mulai Sudah Terlewat!.");
                return redirect()->back()->withInput();
            }

            if ($this->request->getPost('tanggal_selesai') < date('Y-m-d')) {
                session()->setFlashdata('info', "Tanggal Selesai Sudah Terlewat!.");
                return redirect()->back()->withInput();
            }

            $data = [
                'title' => 'Add Implementor Rumah Sakit',
                'user'  => $this->ModelUser->find(session()->get('id')),
                'data'  => $this->ModelLeader->getRumahSakitById($id_rumah_sakit),
                'data_input' => [
                    'id_user' => $this->request->getPost('id_user'),
                    'email' => $this->request->getPost('email'),
                    'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
                    'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
                ],
                'karyawan' => $this->ModelLeader->getAllEmploye(),
                'isi'   => 'leader/work_position/v_tambah_implementor2'
            ];
        } else {
            $data = [
                'title' => 'Add Implementor Rumah Sakit',
                'user'  => $this->ModelUser->find(session()->get('id')),
                'data'  => $this->ModelLeader->getRumahSakitById($id_rumah_sakit),
                'karyawan' => $this->ModelLeader->getAllEmploye(),
                'isi'   => 'leader/work_position/v_tambah_implementor'
            ];
        }

        return view('layout/v_wrapper_admin', $data);
    }

    public function simpan_implementor($id_rumah_sakit)
    {
        $validate = $this->validate([
            'id_user2' => [
                'label' => 'Implementor 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'email_user2' => [
                'label' => 'Email',
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

        if ($this->request->getPost('tanggal_mulai2') > $this->request->getPost('tanggal_selesai2')) {
            session()->setFlashdata('info', "Tanggal Selesai Harus Melewati Tanggal Mulai!.");
            return redirect()->back()->withInput();
        }

        if ($this->request->getPost('tanggal_mulai2') < date('Y-m-d')) {
            session()->setFlashdata('info', "Tanggal Mulai Sudah Terlewat!.");
            return redirect()->back()->withInput();
        }

        if ($this->request->getPost('tanggal_selesai2') < date('Y-m-d')) {
            session()->setFlashdata('info', "Tanggal Selesai Sudah Terlewat!.");
            return redirect()->back()->withInput();
        }

        $data = [
            [
                'id_rumah_sakit'    => $id_rumah_sakit,
                'id_user'           => $this->request->getPost('id_user1'),
                'email'             => $this->request->getPost('email_user1'),
                'tanggal_mulai'     => $this->request->getPost('tanggal_mulai1'),
                'tanggal_selesai'   => $this->request->getPost('tanggal_selesai1'),
            ],
            [
                'id_rumah_sakit'    => $id_rumah_sakit,
                'id_user'           => $this->request->getPost('id_user2'),
                'email'             => $this->request->getPost('email_user2'),
                'tanggal_mulai'     => $this->request->getPost('tanggal_mulai2'),
                'tanggal_selesai'   => $this->request->getPost('tanggal_selesai2'),
            ],
        ];

        // insert to implementor dan update status user menjadi implementor
        foreach ($data as $value) {
            $this->ModelLeader->db->table('user')->where('id_user', $value['id_user'])->update(['status' => 'Implementor']);
            $cek_implementor = $this->ModelImplementor->where('id_user', $value['id_user'])->first();
            if ($cek_implementor) {
                $this->ModelLeader->update_implementor($value);
            } else {
                $this->ModelLeader->insertImpelementor($value);
            }
        }

        // update tanggal mulai dan akhir kerja sama di tabel rumah sakit
        $this->ModelRumahSakit->update($id_rumah_sakit, [
            'tgl_mulai_kerjasama' => $this->request->getPost('tanggal_mulai1'),
            'tgl_akhir_kerjasama' => $this->request->getPost('tanggal_selesai1'),
        ]);

        $email = \Config\Services::email();

        $emailUser1 = $this->request->getPost('email_user1');
        $emailUser2 = $this->request->getPost('email_user2');

        $fromEmail = 'putrifitriani559@gmail.com';
        $email->setFrom($fromEmail);
        $toFrom = $emailUser1;
        $email->setTo($toFrom);
        $subject = $this->request->getPost('subject');
        $email->setSubject($subject);
        $pesan = $this->request->getPost('pesan');
        $body = "
            <h3>$pesan</h3>
            ";
        $message = $body;
        $email->setMessage($message);
        $email->send();

        $fromEmail = 'putrifitriani559@gmail.com';
        $email->setFrom($fromEmail);
        $toFrom = $emailUser2;
        $email->setTo($toFrom);
        $subject = $this->request->getPost('subject');
        $email->setSubject($subject);
        $pesan = $this->request->getPost('pesan');
        $body = "
            <h3>$pesan</h3>
            ";
        $message = $body;
        $email->setMessage($message);
        $email->send();

        session()->setFlashdata('pesan', "Implementor Berhasil ditambahkan!.");
        return redirect()->to(base_url('m_work_position'));
    }

    // public function kirim_email_implementor($id1, $id2)
    // {

    //     $data = [
    //         'title' => 'Kirim Email Implementor',
    //         'data1'  =>  $this->ModelImplementor->where('id_user', $id1)->first(),
    //         'data2'  =>  $this->ModelImplementor->where('id_user', $id2)->first(),
    //         'isi'   => 'leader/work_position/v_kirim_email_imp'
    //     ];
    //     return view('layout/v_wrapper_admin', $data);
    // }

    public function cancle_rumah_sakit($id_rumah_sakit)
    {
        $data = [
            'id_rumah_sakit' => $id_rumah_sakit,
            'status'        => 'Cancle'
        ];
        $this->ModelLeader->editRumahSakit($data);
        session()->setFlashdata('pesan', "Berhasil Cancle Rumah Sakit!.");
        return redirect()->to(base_url('m_work_position'));
    }

    public function riwayat_rumah_sakit()
    {
        $data = [
            'title' => 'History Rumah Sakit',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'data'  => $this->ModelRumahSakit->where('status', 'Cancle')->orWhere('tgl_akhir_kerjasama <', date('Y-m-d'))->paginate(8, 'rumah_sakit'),
            'pagination' => $this->ModelRumahSakit->pager,
            'implementor' => $this->ModelLeader->getAllImplementorWithRumahSakit(),
            'isi'   => 'leader/work_position/v_riwayat_rumah_sakit'
        ];

        return view('layout/v_wrapper_admin', $data);
    }

    public function uncancle_rumah_sakit($id_rumah_sakit)
    {
        $data = [
            'id_rumah_sakit' => $id_rumah_sakit,
            'status'        => null
        ];
        $this->ModelLeader->editRumahSakit($data);
        session()->setFlashdata('pesan', "Berhasil Kembali Melakukan Kerja Sama Rumah Sakit!.");
        return redirect()->to(base_url('m_work_position/riwayat_rumah_sakit'));
    }

    public function getEmail($id_user)
    {
        $user = $this->ModelUser->find($id_user);
        echo $user['email'];
    }

    // menu manage live location

    public function m_live_location()
    {
        $data = [
            'title' => 'Manage Live Location',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'data'  => $this->ModelLeader->getAllAbsen(),
            'isi'   => 'leader/manage_live_location/v_m_live_location'
        ];

        return view('layout/v_wrapper_admin', $data);
    }

    public function detail_absen($id)
    {
        // $cekHadir = $this->ModelLeader->getAbsenById($id);
        $absen = $this->ModelAbsen
            // ->join('user', 'user.id_user = absen.id_user')
            // ->where('id_absen', $id)
            ->find($id);
        $user = $this->ModelUser->find($absen['id_user']);
        // echo '<pre>';
        // var_dump($user);
        // echo '</pre>';
        // die();
        if ($absen['keterangan'] == null) {
            $data = [
                'title' => 'Detail Live Location',
                'user'  => $this->ModelUser->find(session()->get('id')),
                'absen'  => $absen,
                'user'  => $user,
                'isi'   => 'leader/manage_live_location/v_detail_hadir'
            ];
        } else {
            $data = [
                'title' => 'Detail Live Location',
                'user'  => $this->ModelUser->find(session()->get('id')),
                'absen'  => $absen,
                'user'  => $user,
                'isi'   => 'leader/manage_live_location/v_detail_tidakhadir'
            ];
        }

        return view('layout/v_wrapper_admin', $data);
    }

    public function selesaiAbsen($id)
    {
        $data = [
            'id_absen' => $id,
            'status'   => 'Selesai'
        ];
        $this->ModelLeader->updateAbsen($data);
        session()->setFlashdata('pesan', "Berhasil Menyelesaikan Absensi!.");
        return redirect()->to(base_url('m_live_location'));
    }

    public function riwayat_live_location()
    {
        $data = [
            'title' => 'History Live Location',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'data'  => $this->ModelLeader->getRiwayatAbsen(),
            'isi'   => 'leader/manage_live_location/v_riwayat'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function finish_absen()
    {
        // var_dump($this->request->getPost());
        // die();
        if (!$this->request->getPost()) {
            session()->setFlashdata('info', "Mohon Centang Pada Checkbox Implementor!.");
            return redirect()->to(base_url('m_live_location'));
        }

        foreach ($this->request->getPost() as $row) {
            $dt_absen = $this->ModelAbsen->where('id_user', $row)->first();
            $this->ModelAbsen->update($dt_absen['id_absen'], ['status' => 'Selesai']);
        }
        session()->setFlashdata('pesan', "Berhasil Menyelesaikan Absensi!.");
        return redirect()->to(base_url('m_live_location'));
    }

    // menu manage task management

    public function m_task_management()
    {
        $data = [
            'title' => 'Manage Task Management',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'implementor'  => $this->ModelLeader->getImplementor(),
            'data'  => $this->ModelPekerjaan
                ->join('implementor', 'implementor.id_implementor = pekerjaan.id_implementor')
                ->join('user', 'user.id_user = implementor.id_user')
                ->where('status_pekerjaan !=', 'Done')
                ->orderBy('id_pekerjaan', 'DESC')
                ->findAll(),
            'isi'   => 'leader/manage_task_management/v_m_task_management'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function get_RS_ajax($id)
    {
        $rs = $this->ModelImplementor->join('rumah_sakit', 'rumah_sakit.id_rumah_sakit = implementor.id_rumah_sakit')->find($id);
        echo $rs['nama_rumah_sakit'];
    }

    public function insert_task()
    {
        $validasi = [
            'nama_implementor' => [
                'label' => 'Nama Implementor',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi.',
                ],
            ],
            'batas_tgl_pekerjaan' => [
                'label' => 'Batas Tanggal Pekerjaan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ],
            ],
        ];
        if ($this->validate($validasi)) {

            $implementor = $this->ModelImplementor->find($this->request->getPost('nama_implementor'));

            if ($this->request->getPost('batas_tgl_pekerjaan') < $implementor['tanggal_mulai'] || $this->request->getPost('batas_tgl_pekerjaan') > $implementor['tanggal_selesai']) {
                session()->setFlashdata('info', "Tanggal Batas Pekerjaan Tidak Boleh Kurang dari $implementor[tanggal_mulai] dan lebih dari $implementor[tanggal_selesai]!.");
                return redirect()->back()->withInput();
            }

            $data = [
                'deskripsi' => $this->request->getPost('deskripsi'),
                'batas_tgl_pekerjaan' => $this->request->getPost('batas_tgl_pekerjaan'),
                'id_implementor' => $this->request->getPost('nama_implementor'),
                'status_pekerjaan' => 'On Progress',
            ];
            $this->ModelPekerjaan->insert($data);
            session()->setFlashdata('pesan', "Pekerjaan Berhasil Ditambahkan!.");
            return redirect()->to(base_url('m_task_management'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('m_task_management'))->withInput();
        }
    }

    public function detail($id, $return = null)
    {
        $data = [
            'title'     => 'Detail Task Management',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'subtitle'  => 'Detail Pekerjaan',
            'return'    => $return,
            'data'      => $this->ModelPekerjaan
                ->join('implementor', 'implementor.id_implementor = pekerjaan.id_implementor')
                ->join('user', 'user.id_user = implementor.id_user')
                ->join('rumah_sakit', 'rumah_sakit.id_rumah_sakit = implementor.id_rumah_sakit')
                ->find($id),
            'isi'       => 'leader/manage_task_management/v_detail'
        ];
        // var_dump($data['data']);
        // die();
        return view('layout/v_wrapper_admin', $data);
    }

    public function ubah_batas_tgl_pekerjaan()
    {
        $data = [
            'id_pekerjaan'  => $this->request->getPost('id_pekerjaan'),
            'batas_tgl_pekerjaan'  => $this->request->getPost('batas_tgl_pekerjaan'),
        ];
        $this->ModelPekerjaan->update($this->request->getPost('id_pekerjaan'), $data);
        session()->setFlashdata('pesan', "Batas Tanggal Pekerjaan Berhasil Diedit!.");
        return redirect()->to(base_url('m_task_management'));
    }

    public function selesai_task($id)
    {
        $pekerjaan = $this->ModelPekerjaan->find($id);
        if ($pekerjaan['status_pekerjaan'] != 'Uploaded') {
            session()->setFlashdata('info', "Task Masih Dalam Progress!.");
            return redirect()->to(base_url('m_task_management'));
        }
        $data = [
            'id_pekerjaan'      => $id,
            'status_pekerjaan'  => 'Done'
        ];
        $this->ModelPekerjaan->update($id, $data);
        session()->setFlashdata('pesan', "Berhasil Menyelesaikan Task!.");
        return redirect()->to(base_url('m_task_management'));
    }

    public function riwayat_task()
    {
        $data = [
            'title' => 'History Task Management',
            'user'  => $this->ModelUser->find(session()->get('id')),
            'implementor'  => $this->ModelLeader->getImplementor(),
            'data'  => $this->ModelPekerjaan
                ->join('implementor', 'implementor.id_implementor = pekerjaan.id_implementor')
                ->join('user', 'user.id_user = implementor.id_user')
                ->where('status_pekerjaan', 'Done')
                ->orderBy('id_pekerjaan', 'DESC')
                ->findAll(),
            'isi'   => 'leader/manage_task_management/v_riwayat'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function finish_task()
    {
        if (!$this->request->getPost()) {
            session()->setFlashdata('info', "Mohon Centang Pada Checkbox Implementor!.");
            return redirect()->to(base_url('m_task_management'));
        }

        foreach ($this->request->getPost() as $row) {
            $this->ModelPekerjaan->update($row, ['status_pekerjaan' => 'Done']);
        }
        session()->setFlashdata('pesan', "Berhasil Menyelesaikan Pekerjaan!.");
        return redirect()->to(base_url('m_task_management'));
    }
}
