<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKaryawan;

class Karyawan extends BaseController
{

    private $ModelKaryawan;

    public function __construct()
    {
        $this->ModelKaryawan = new ModelKaryawan();
    }

    public function live_location()
    {
        date_default_timezone_set('Asia/Jakarta');
        $jam = date('H:i');

        $data = [
            'title'     => 'Live Location',
            'ucapan'    => $this->getUcapan($jam),
            'tanggal'   => date('d/m/Y'),
            'waktu'     => $jam,
            'absen'     => $this->ModelKaryawan->cekAbsen(session()->get('id'), date('Y-m-d')),
            'isi'       => 'karyawan/v_liveLocation'
        ];

        return view('layout/v_wrapper_admin', $data);
    }

    public function getUcapan($jam)
    {

        if ($jam >= '05:00' && $jam <= '09:59') return 'Pagi';
        if ($jam >= '10:00' && $jam <= '14:59') return 'Siang';
        if ($jam >= '15:00' && $jam <= '17:59') return 'Sore';
        return 'Malam';
    }

    public function absen($ket)
    {
        date_default_timezone_set('Asia/Jakarta');
        $jam = date('H:i');
        if ($ket == 'hadir') {
            $data = [
                'title'     => 'Absen Hadir',
                'tanggal'   => date('d-m-Y'),
                'waktu'     => $jam,
                'date'      => date('Y-m-d'),
                'isi'       => 'karyawan/absen/v_hadir'
            ];
            return view('layout/v_wrapper_admin', $data);
        } else {
            $data = [
                'title'     => 'Absen Tidak Hadir',
                'tanggal'   => date('d-m-Y'),
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
        $data = [
            'tgl_absen' => $this->request->getPost('tgl_absen'),
            'jam'       => $this->request->getPost('jam'),
            'keterangan' => $this->request->getPost('keterangan'),
            'id_user'   => session()->get('id')
        ];

        $this->ModelKaryawan->insertAbsen($data);
        session()->setFlashdata('pesan', "Berhasil melakukan absensi!.");
        return redirect()->to(base_url('liveLocation'));
    }
}
