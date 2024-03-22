<?php

namespace App\Models;

use CodeIgniter\Model;

class Data_Absen extends Model
{
    protected $table = 'dafsen';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'absen', 'kelas', 'mapel', 'deskripsi', 'id_dafjur', 'tanggal'];

    public function insertdata($data)
    {
        return $this->insert($data);
    }

    public function getDataByDafjurId($id_dafjur)
    {
        return $this->where('id_dafjur', $id_dafjur)->findAll();
    }

    public function getDataByNama($nama)
    {
        return $this->where('nama', $nama)->orderBy('id', 'DESC')->findAll();
    }
    
    public function getDataByTanggal($tanggal)
    {
        return $this->where('tanggal', $tanggal)->orderBy('id', 'DESC')->findAll();
    }
    
    public function hapusDataById($ids)
    {
        return $this->whereIn('id', $ids)->delete();
    }
}
