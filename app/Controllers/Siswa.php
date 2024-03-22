<?php

namespace App\Controllers;

use App\Models\Data_Siswa;
use App\Models\Data_Absen;
use App\Models\Daftar_Jurnal;
use CodeIgniter\Controller;

class Siswa extends BaseController
{
    public function index()
    {
        $session = session();

        $kelas = $session->get('kelas');

        $daftarJurnalModel = new Daftar_Jurnal();
        $data['jurnals'] = $daftarJurnalModel->getJurnalsByKelas($kelas);

        $data['activePage'] = 'dashboard';

        $sidebarHeader = view('template-siswa', $data);
        $mainView = view('siswa/dashboard', $data);
        return $sidebarHeader . $mainView;
    }


    public function history()
    {
        $session = session();

        if (!$session->get('logged_in') || $session->get('tipe') !== 'Siswa') {
            return redirect()->to('/login-siswa');
        }

        $nama_pengguna = session()->get('nama');

        $model = new Data_Absen();

        $data['data_absensi'] = $model->getDataByNama($nama_pengguna);

        $data = [
            'activePage' => 'history',
            'data_absensi' => $data['data_absensi']
        ];

        $sidebarHeader = view('template-siswa', $data);
        $mainView = view('siswa/history', $data);
        return $sidebarHeader . $mainView;
    }

    public function getDataByTanggal($tanggal)
    {
        $session = session();

        if (!$session->get('logged_in') || $session->get('tipe') !== 'Siswa') {
            return redirect()->to('/login-siswa');
        }

        $model = new Data_Absen();

        $data_absensi = $model->getDataByTanggal($tanggal);

        return json_encode($data_absensi);
    }

    public function poin()
    {
        $session = session();

        if (!$session->get('logged_in') || $session->get('tipe') !== 'Siswa') {
            return redirect()->to('/login-siswa');
        }

        $data = [
            'activePage' => 'poin'
        ];

        $sidebarHeader = view('template-siswa', $data);
        $mainView = view('siswa/poin');
        return $sidebarHeader . $mainView;
    }

    public function bootcamp()
    {
        $session = session();

        if (!$session->get('logged_in') || $session->get('tipe') !== 'Siswa') {
            return redirect()->to('/login-siswa');
        }

        $model = new Data_Siswa();
        $students = $model->getStudentsWithPointsGreaterThan40();

        $data = [
            'activePage' => 'bootcamp',
            'students' => $students,
        ];

        $sidebarHeader = view('template-siswa', $data);
        $mainView = view('siswa/bootcamp');
        return $sidebarHeader . $mainView;
    }

    public function setting()
    {
        $session = session();

        if (!$session->get('logged_in') || $session->get('tipe') !== 'Siswa') {
            return redirect()->to('/login-siswa');
        }

        $dataSiswaModel = new Data_Siswa();
        $username = session()->get('username');
        $siswa = $dataSiswaModel->getuserbyusername($username);

        $data = [
            'activePage' => 'setting',
            'siswa' => $siswa
        ];

        $sidebarHeader = view('template-siswa', $data);
        $mainView = view('siswa/setting', $data);
        return $sidebarHeader . $mainView;
    }

    public function absen($id)
    {
        $session = session();

        if (!$session->get('logged_in') || $session->get('tipe') !== 'Siswa') {
            return redirect()->to('/login-siswa');
        }

        date_default_timezone_set('Asia/Jakarta');
        session()->set('id_dafjur', $id);

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

        $daftarJurnalModel = new Daftar_Jurnal();
        $mapel = $daftarJurnalModel->getMapelById($id);

        $data = [
            'tanggal' => $tanggal,
            'mapel' => $mapel,
            'id' => $id,
        ];

        $sidebarHeader = view('template-siswa', $data);
        $mainView = view('siswa/absen');
        return $sidebarHeader . $mainView;
    }

    public function postaduan()
    {
        $session = session();

        if (!$session->get('logged_in') || $session->get('tipe') !== 'Siswa') {
            return redirect()->to('/login-siswa');
        }

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

    public function postabsen()
    {
        $session = session();

        if (!$session->get('logged_in') || $session->get('tipe') !== 'Siswa') {
            return redirect()->to('/login-siswa');
        }

        $session = session();

        if (!$session->get('logged_in')) {
            return redirect()->to('/login-siswa');
        }

        $postData = $this->request->getPost();
        $model = new \App\Models\Data_Absen();

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

    public function update()
    {
        $session = session();

        if (!$session->get('logged_in') || $session->get('tipe') !== 'Siswa') {
            return redirect()->to('/login-siswa');
        }
        
        $id = session()->get('id');

        $ttl = $this->request->getPost('ttl');
        $alamat = $this->request->getPost('alamat');

        $model = new Data_Siswa();

        $data =
            [
                'ttl' => $ttl,
                'alamat' => $alamat
            ];

        $model->updateProfile($id, $data);

        return redirect()->to('/setting-siswa')->with('success', 'Profile updated successfully');
    }
}