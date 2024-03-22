<?php

namespace App\Controllers;

use App\Models\Data_Siswa;
use App\Models\Daftar_Jurnal;
use App\Models\Data_Absen;
use CodeIgniter\Controller;

class Guru extends BaseController
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

        $sidebarHeader = view('template-guru', $data);
        $mainView = view('guru/dashboard');
        return $sidebarHeader . $mainView;
    }

    public function bootcamp()
    {
        $session = session();

        if (!$session->get('logged_in') || $session->get('tipe') !== 'Guru') {
            return redirect()->to('/login-siswa');
        }

        $model = new Data_Siswa();
        $students = $model->getStudentsWithPointsGreaterThan40();

        $data = [
            'activePage' => 'bootcamp',
            'students' => $students,
        ];

        $sidebarHeader = view('template-guru', $data);
        $mainView = view('siswa/bootcamp');
        return $sidebarHeader . $mainView;
    }

    public function history()
    {
        if (!session()->has('nama') || session()->get('tipe') !== 'Guru') {
            return redirect()->to('/login-guru');
        }

        $nama = session()->get('nama');
        $daftarJurnalModel = new Daftar_Jurnal();
        $jurnals = $daftarJurnalModel->getJurnalsByNama($nama);

        $data = [
            'activePage' => 'history',
            'jurnals' => $jurnals
        ];

        $sidebarHeader = view('template-guru', $data);
        $mainView = view('guru/history', $data);
        return $sidebarHeader . $mainView;
    }

    public function setting()
    {
        $data = [
            'activePage' => 'setting'
        ];

        $sidebarHeader = view('template-guru', $data);
        $mainView = view('guru/setting');
        return $sidebarHeader . $mainView;
    }

    public function poin()
    {
        $model = new Data_Siswa();
        $siswa = $model->getStudentsByTypeAndSort();

        $data = [
            'activePage' => 'poin',
            'siswa' => $siswa
        ];

        $sidebarHeader = view('template-guru', $data);
        $mainView = view('guru/input-poin', $data);
        return $sidebarHeader . $mainView;
    }

    public function tambahdata()
    {
        $session = session();
        $mapel = session()->get('mapel');

        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        $id_dafjur = $this->request->uri->getSegment(2);
        $daftar_jurnal_model = new Daftar_Jurnal();
        $jurnal = $daftar_jurnal_model->find($id_dafjur);
        $kelas = $jurnal ? $jurnal['kelas'] : 'Jurnal tidak ditemukan';
        $data_siswa_model = new \App\Models\Data_Siswa();
        $siswa_by_kelas = $data_siswa_model->where('kelas', $kelas)->where('tipe', 'Siswa')->findAll();
        $siswa_options = [];
        foreach ($siswa_by_kelas as $siswa) {
            $siswa_options[$siswa['nama']] = $siswa['nama'];
        }
        $data = [
            'activePage' => '',
            'mapel' => $mapel,
            'kelas' => $kelas,
            'siswa_options' => $siswa_options,
            'id_dafjur' => $id_dafjur
        ];

        $sidebarHeader = view('template-guru', $data);
        $mainView = view('guru/tambah-data', $data);
        return $sidebarHeader . $mainView;
    }

    public function detailsiswa()
    {
        $session = session();

        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        $nama = $this->request->getGet('nama');
        $kelas = $this->request->getGet('kelas');
        $poin = $this->request->getGet('poin');

        $data = [
            'activePage' => 'poin',
            'nama' => $nama,
            'kelas' => $kelas,
            'poin' => $poin
        ];

        $sidebarHeader = view('template-guru', $data);
        $mainView = view('guru/post-poin', $data);
        return $sidebarHeader . $mainView;
    }

    public function postjurnal()
    {
        date_default_timezone_set('Asia/Jakarta');

        $nama_guru = $this->request->getPost('nama');
        $mapel = $this->request->getPost('mapel');
        $kelas = $this->request->getPost('kelas');
        $tanggal = $this->request->getPost('tanggal');
        $status = $this->request->getPost('status');
        $materi_kegiatan = $this->request->getPost('materi_kegiatan');
        $waktu_input = date('Y-m-d H:i:s');

        $daftarJurnalModel = new Daftar_Jurnal();
        $daftarJurnalModel->insertdata([
            'nama' => $nama_guru,
            'mapel' => $mapel,
            'kelas' => $kelas,
            'tanggal' => $tanggal,
            'materi_kegiatan' => $materi_kegiatan,
            'waktu_input' => $waktu_input
        ]);

        return redirect()->to('/dashboard-guru');
    }

    public function detailhistory($id_dafjur)
    {
        $model = new Data_Absen();

        $jurnal = $model->getDataByDafjurId($id_dafjur);
        $id_dafjur = $this->request->uri->getSegment(2);

        $data = [
            'activePage' => 'setting',
            'absenData' => $jurnal,
            'id_dafjur' => $id_dafjur
        ];

        $sidebarHeader = view('template-guru', $data);
        $mainView = view('guru/detail-history', $data);
        return $sidebarHeader . $mainView;
    }

    public function hapusterpilih()
    {
        $selectedIds = $this->request->getVar('selectedIds');

        if (!empty ($selectedIds)) {
            $daftarJurnalModel = new Daftar_Jurnal();

            $daftarJurnalModel->deleteJurnals($selectedIds);

            return redirect()->to('/history-guru')->with('pesan_sukses', 'Data terpilih berhasil dihapus.');
        } else {
            return redirect()->to('/history-guru')->with('pesan_error', 'Pilih setidaknya satu data untuk dihapus.');
        }
    }

    public function hapusData()
    {
        $ids = $this->request->getPost('selectedIds');

        if (empty ($ids)) {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Tidak ada data yang dipilih untuk dihapus']);
        }

        $model = new Data_Absen();
        $hapus = $model->hapusDataById($ids);

        if ($hapus) {
            return $this->response->setStatusCode(200)->setJSON(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Gagal menghapus data']);
        }
    }

    public function updatepoin()
    {
        $session = session();

        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        $nama = $this->request->getPost('nama');
        $kelas = $this->request->getPost('kelas');
        $poinArray = $this->request->getPost('poin');

        if (empty ($nama) || empty ($kelas) || empty ($poinArray)) {
            $errorMessage = "Data tidak boleh kosong!";
            return redirect()->to('/detailsiswa?nama=' . urlencode($nama) . '&kelas=' . urlencode($kelas) . '&poin=' . urlencode($poin))->with('alert', $errorMessage);
        }

        $totalPoin = 0;
        foreach ($poinArray as $poin) {
            $totalPoin += (int) $poin;
        }

        $dataSiswaModel = new Data_Siswa();
        $siswa = $dataSiswaModel->where(['nama' => $nama, 'kelas' => $kelas])->first();

        if ($siswa) {
            $currentPoin = (int) $siswa['poin'];
            $newPoin = $currentPoin + $totalPoin;

            $dataSiswaModel->update($siswa['id'], ['poin' => $newPoin]);

            $successMessage = "Data Siswa Berhasil Diperbarui!";
            return redirect()->to('/detailsiswa?nama=' . urlencode($nama) . '&kelas=' . urlencode($kelas) . '&poin=' . urlencode($newPoin))->with('alert', $successMessage);
        } else {
            $errorMessage = "Data tidak ditemukan.";
            return redirect()->to('/detailsiswa?nama=' . urlencode($nama) . '&kelas=' . urlencode($kelas) . '&poin=' . urlencode($poin))->with('alert', $errorMessage);
        }
    }

    public function postabsen()
    {
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
}
