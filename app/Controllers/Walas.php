<?php

namespace App\Controllers;

use App\Models\Data_Siswa;
use App\Models\Daftar_Jurnal;
use App\Models\Data_Absen;
use CodeIgniter\Controller;

class Walas extends BaseController
{
    public function index()
    {
        $session = session();

        if (!$session->get('logged_in') || $session->get('tipe') !== 'Guru') {
            return redirect()->to('/login-siswa');
        }

        date_default_timezone_set('Asia/Jakarta');

        $day = date('l');
        $date = date('j F Y');

        switch ($day) {
            case 'Monday':
                $dayName = 'Senin';
                break;
            case 'Tuesday':
                $dayName = 'Selasa';
                break;
            case 'Wednesday':
                $dayName = 'Rabu';
                break;
            case 'Thursday':
                $dayName = 'Kamis';
                break;
            case 'Friday':
                $dayName = 'Jumat';
                break;
            case 'Saturday':
                $dayName = 'Sabtu';
                break;
            case 'Sunday':
                $dayName = 'Minggu';
                break;
        }

        $bulanIndonesia = array(
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        );

        $parts = explode(' ', $date);
        $monthEnglish = $parts[1];
        $monthIndonesian = $bulanIndonesia[$monthEnglish];

        $tanggal = $dayName . ', ' . $parts[0] . ' ' . $monthIndonesian . ' ' . $parts[2];
        $data = [
            'activePage' => 'dashboard',
            'tanggal' => $tanggal
        ];

        $sidebarHeader = view('template-walas', $data);
        $mainView = view('walas/dashboard-walas');
        return $sidebarHeader . $mainView;
    }

    public function rekap()
    {
        $kelas = session()->get('kelas');
        $siswaModel = new Data_Siswa();
        $siswaByKelas = $siswaModel->getStudentsByClassAndType($kelas);
        $data = [
            'siswaByKelas' => $siswaByKelas,
            'kelas' => $kelas
        ];

        $sidebarHeader = view('template-walas', $data);
        $mainView = view('walas/rekapitulasi');
        return $sidebarHeader . $mainView;
    }
}