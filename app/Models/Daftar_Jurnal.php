<?php

namespace App\Models;

use CodeIgniter\Model;

class Daftar_Jurnal extends Model
{
    protected $table = 'dafjur';
    protected $primaryKey = 'id_dafjur';
    protected $allowedFields = ['nama', 'mapel', 'kelas', 'tanggal', 'materi_kegiatan', 'waktu_input'];

    public function insertdata($data)
    {
        return $this->insert($data);
    }

    public function getJurnalsByKelas($kelas)
    {
        return $this->where('kelas', $kelas)->findAll();
    }

    public function getMapelById($id)
    {
        return $this->select('mapel')->find($id)['mapel'];
    }

    public function getJurnalsByNama($nama)
    {
        return $this->where('nama', $nama)->findAll();
    }

    public function deleteJurnals($selectedIds)
    {
        return $this->whereIn('id_dafjur', $selectedIds)->delete();
    }
}
