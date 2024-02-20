<?php

namespace App\Controllers;

use App\Models\Data_Siswa;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function index()
    {
        return view('login-siswa');
    }

    public function prosesloginsiswa()
    {
        $model = new Data_Siswa();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (empty($username) || empty($password)) {
            $alertMessage = "Data tidak boleh ada yang kosong!";
            return redirect()->to('/login-siswa')->with('alert', $alertMessage);
        }

        $user = $model->getuserbyusername($username);

        if ($user) {
            if ($user['password'] === $password) {
                $session = session();
                $session->set('logged_in', true);
                $session->set('user_id', $user['id']);
                $session->set('tipe', $user['tipe']);
                $session->set('nama', $user['nama']);
                $session->set('kelas', $user['kelas']);
                $session->set('poin', $user['poin']);

                $pesanSelamatDatang = "Selamat datang, " . $user['nama'] . "!";
                $session->setFlashdata('pesan_selamat_datang', $pesanSelamatDatang);

                // Redirect user to appropriate dashboard based on user type
                if ($user['tipe'] === 'Siswa') {
                    return redirect()->to('/dashboard-siswa');
                } elseif ($user['tipe'] === 'Guru') {
                    return redirect()->to('/dashboard-guru');
                } else {
                    // Handle other user types if needed
                    return redirect()->to('/');
                }

            } else {
                $alertMessage = "Password salah!";
                return redirect()->to('/login-siswa')->with('alert', $alertMessage);
            }
        } else {
            $alertMessage = "Username atau Email tidak ditemukan!";
            return redirect()->to('/login-siswa')->with('alert', $alertMessage);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
