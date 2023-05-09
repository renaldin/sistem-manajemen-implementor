<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Karyawan extends BaseController
{

    public function live_location()
    {
        date_default_timezone_set('Asia/Jakarta');
        $jam = date('H:i');

        $data = [
            'title'     => 'Live Location',
            'ucapan'    => $this->getUcapan($jam),
            'tanggal'   => date('d/m/Y'),
            'waktu'     => $jam,
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
}
