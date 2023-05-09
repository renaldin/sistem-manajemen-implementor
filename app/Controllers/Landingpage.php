<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Landingpage extends BaseController
{
    public function index()
    {
        return view('v_landingpage');
    }
}
