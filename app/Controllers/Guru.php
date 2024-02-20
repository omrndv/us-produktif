<?php

namespace App\Controllers;

use App\Models\Data_Siswa;
use CodeIgniter\Controller;

class Guru extends BaseController
{
    public function index()
    {
        $data = [
            'activePage' => 'dashboard' // Set halaman history aktif
        ];

        $sidebarHeader = view('template-siswa', $data);
        $mainView = view('guru/dashboard');
        return $sidebarHeader . $mainView;
    }

}
