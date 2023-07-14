<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelImplementor;
use App\Models\ModelKaryawan;
use App\Models\ModelPekerjaan;
use App\Models\ModelUser;

class Karyawan extends BaseController
{

    private $ModelKaryawan, $ModelPekerjaan, $ModelImplementor, $ModelUser;

    public function __construct()
    {
        $this->ModelKaryawan = new ModelKaryawan();
        $this->ModelPekerjaan = new ModelPekerjaan();
        $this->ModelImplementor = new ModelImplementor();
        $this->ModelUser = new ModelUser();
    }

    public function live_location()
    {
        date_default_timezone_set('Asia/Jakarta');
        $jam = date('H:i');

        $data = [
            'title'     => 'Live Location',
            'ucapan'    => $this->getUcapan($jam),
            'tanggal'   => date('d/m/Y'),
            'user'      => $this->ModelUser->find(session()->get('id')),
            'waktu'     => $jam,
            'absen'     => $this->ModelKaryawan->cekAbsen(session()->get('id'), date('Y-m-d')),
            'isi'       => 'karyawan/v_liveLocation'
        ];

        return view('layout/v_wrapper_admin', $data);
    }

    public function getUcapan($jam)
    {

        if ($jam >= '05:00' && $jam <= '09:59') return 'Morning';
        if ($jam >= '10:00' && $jam <= '14:59') return 'Evening';
        if ($jam >= '15:00' && $jam <= '17:59') return 'Afternoon';
        return 'Night';
    }

    public function absen($ket)
    {
        date_default_timezone_set('Asia/Jakarta');
        $jam = date('H:i');
        if ($ket == 'hadir') {
            $data = [
                'title'     => 'Absen Hadir',
                'tanggal'   => date('d-m-Y'),
                'user'      => $this->ModelUser->find(session()->get('id')),
                'waktu'     => $jam,
                'date'      => date('Y-m-d'),
                'isi'       => 'karyawan/absen/v_hadir'
            ];
            return view('layout/v_wrapper_admin', $data);
        } else {
            $data = [
                'title'     => 'Absen Tidak Hadir',
                'tanggal'   => date('d-m-Y'),
                'user'      => $this->ModelUser->find(session()->get('id')),
                'waktu'     => $jam,
                'date'      => date('Y-m-d'),
                'isi'       => 'karyawan/absen/v_tidakhadir'
            ];
            return view('layout/v_wrapper_admin', $data);
        }
    }

    public function insert_hadir()
    {
        $foto = $this->request->getPost('captured_image_data');
        $folderPath = 'foto_absensi/';
        $image_parts = explode(";base64,", $foto);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $nama_gambar = uniqid() . '.jpg';

        $file = $folderPath . $nama_gambar;
        file_put_contents($file, $image_base64);

        $data = [
            'tgl_absen' => $this->request->getPost('tgl_absen'),
            'koordinat' => $this->request->getPost('koordinat'),
            'jam'       => $this->request->getPost('jam'),
            'foto'      => $nama_gambar,
            'id_user'   => session()->get('id')
        ];

        $this->ModelKaryawan->insertAbsen($data);
        session()->setFlashdata('pesan', "Berhasil melakukan absensi!.");
        return redirect()->to(base_url('liveLocation'));
    }

    public function insert_tidakhadir()
    {
        $validasi = [
            'keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi.',
                ],
            ],
        ];

        if ($this->validate($validasi)) {
            $foto = $this->request->getPost('captured_image_data');
            $folderPath = 'foto_absensi/';
            $image_parts = explode(";base64,", $foto);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            $nama_gambar = uniqid() . '.jpg';

            $file = $folderPath . $nama_gambar;
            file_put_contents($file, $image_base64);
            $data = [
                'tgl_absen' => $this->request->getPost('tgl_absen'),
                'koordinat' => $this->request->getPost('koordinat'),
                'jam'       => $this->request->getPost('jam'),
                'foto'      => $nama_gambar,
                'keterangan' => $this->request->getPost('keterangan'),
                'id_user'   => session()->get('id')
            ];

            $this->ModelKaryawan->insertAbsen($data);
            session()->setFlashdata('pesan', "Berhasil melakukan absensi!.");
            return redirect()->to(base_url('liveLocation'));
        } else {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }
    }

    public function task_management()
    {
        $implementor = $this->ModelImplementor->where('id_user', session()->get('id'))->get()->getRowArray();

        if ($implementor == null) {
            session()->setFlashdata('info', "Anda Belum Menjadi Implementor!.");
            return redirect()->back();
        }

        // var_dump(session()->get('id'));
        // die();
        $data = [
            'title'     => 'Task Management',
            'user'      => $this->ModelUser->find(session()->get('id')),
            'data'      => $this->ModelPekerjaan
                ->join('implementor', 'implementor.id_implementor = pekerjaan.id_implementor')
                ->join('rumah_sakit', 'rumah_sakit.id_rumah_sakit = implementor.id_rumah_sakit')
                ->where('pekerjaan.id_implementor', $implementor['id_implementor'])
                ->orderBy('id_pekerjaan', 'DESC')
                ->findAll(),
            'isi'       => 'karyawan/task_management/v_index'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function detail_task_management($id)
    {
        $data = [
            'title'     => 'Task Management',
            'subtitle'     => 'Detail Task Management',
            'user'      => $this->ModelUser->find(session()->get('id')),
            'data'      => $this->ModelPekerjaan
                ->join('implementor', 'implementor.id_implementor = pekerjaan.id_implementor')
                ->join('rumah_sakit', 'rumah_sakit.id_rumah_sakit = implementor.id_rumah_sakit')
                ->find($id),
            'isi'       => 'karyawan/task_management/v_detail'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function upload_task()
    {
        $batas = $this->ModelPekerjaan->find($this->request->getPost('id_pekerjaan'));
        if (date('Y-m-d') > $batas['batas_tgl_pekerjaan']) {
            session()->setFlashdata('info', "Waktu sudah melewati batas pengumpulan!.");
            return redirect()->to(base_url('task_management'));
        }
        $validasi = [
            'link' => [
                'label' => 'Link Upload',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi.',
                ],
            ],
        ];

        if ($this->validate($validasi)) {
            $data = [
                'tgl_pengumpulan'   => $this->request->getPost('tgl_pengumpulan'),
                'link'              => $this->request->getPost('link'),
                'status_pekerjaan'  => 'Uploaded'
            ];
            $this->ModelPekerjaan->update($this->request->getPost('id_pekerjaan'), $data);
            session()->setFlashdata('pesan', "Berhasil mengupload tugas!.");
            return redirect()->to(base_url('task_management'));
        } else {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }
    }
}
