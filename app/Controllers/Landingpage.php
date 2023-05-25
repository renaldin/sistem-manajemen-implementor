<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Landingpage extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'isi'   => 'v_landingpage.php'
        ];
        return view('layout/v_wrapper', $data);
    }
}
