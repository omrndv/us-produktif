<?php

namespace App\Controllers;

use App\Models\Data_Siswa;
use App\Models\Daftar_Jurnal;
use App\Models\Data_Absen;
use CodeIgniter\Controller;

class Landing extends BaseController
{
    public function index()
    {
        $mainView = view('landingpage');
        return $mainView;
    }
}
