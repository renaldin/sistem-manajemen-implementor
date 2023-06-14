<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLeader;

class Landingpage extends BaseController
{

    private $ModelLeader;

    public function __construct()
    {
        $this->ModelLeader = new ModelLeader();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'isi'   => 'v_landingpage.php',
            'count_rumahsakit' => $this->ModelLeader->countRumahSakit(),
            'count_implementor' => $this->ModelLeader->countImplementor(),
        ];
        return view('layout/v_wrapper', $data);
    }
}
