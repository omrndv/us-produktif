<?php

namespace App\Controllers;

class Siswa extends BaseController
{
    public function index()
    {
        $session = session();

        if (!$session->get('logged_in') || $session->get('tipe') !== 'Siswa') {
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
            'tanggal' => $tanggal,
        ];

        $sidebarHeader = view('template-siswa', $data);
        $mainView = view('siswa/dashboard');
        return $sidebarHeader . $mainView;
    }

    public function history()
    {
        $data = [
            'activePage' => 'history' // Set halaman history aktif
        ];

        $sidebarHeader = view('template-siswa', $data);
        $mainView = view('siswa/history');
        return $sidebarHeader . $mainView;
    }
    public function poin()
    {
        $data = [
            'activePage' => 'poin' // Set halaman history aktif
        ];

        $sidebarHeader = view('template-siswa', $data);
        $mainView = view('siswa/poin');
        return $sidebarHeader . $mainView;
    }
    public function bootcamp()
    {
        $data = [
            'activePage' => 'bootcamp' // Set halaman history aktif
        ];

        $sidebarHeader = view('template-siswa', $data);
        $mainView = view('siswa/bootcamp');
        return $sidebarHeader . $mainView;
    }
    public function setting()
    {
        $data = [
            'activePage' => 'setting' // Set halaman history aktif
        ];

        $sidebarHeader = view('template-siswa', $data);
        $mainView = view('siswa/setting');
        return $sidebarHeader . $mainView;
    }

    public function postaduan()
    {
        $session = session();

        if (!$session->get('logged_in')) {
            return redirect()->to('/login-siswa');
        }

        $postData = $this->request->getPost();
        $model = new \App\Models\Data_Aduan();

        $inserted = $model->insertdata($postData);

        if ($inserted) {
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil dikirim!'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data gagal dikirim!'
            ];
        }

        return $this->response->setJSON($response);
    }
}

