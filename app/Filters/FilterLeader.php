<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterLeader implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('role') == '') {
            session()->setFlashdata('pesan', 'Anda belum login. Silahkan login terlebih dahulu!!');
            return redirect()->to(base_url('login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('role') == 'Leader') {
            return redirect()->to(base_url('/dashboard'));
        }
    }
}
