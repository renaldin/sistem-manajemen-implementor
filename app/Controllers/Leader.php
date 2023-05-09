<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Leader extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Dashboard',
            'isi'   => 'leader/v_dashboard'
        ];

        return view('layout/v_wrapper_admin', $data);
    }
}
