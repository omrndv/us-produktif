<?php
namespace App\Models;

use CodeIgniter\Model;

class Data_Siswa extends Model
{
    protected $table = 'datsis';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'kelas', 'tipe', 'poin', 'username', 'password', 'mapel', 'ttl', 'alamat'];

    public function getuserbyusername($username)
    {
        return $this->where('username', $username)
            ->orWhere('nama', $username)
            ->first();
    }

    public function getDistinctClasses()
    {
        return $this->distinct()->select('kelas')->findAll();
    }

    public function getStudentNames()
    {
        return $this->select('nama')->findAll();
    }

    public function getKelasByNama($nama)
    {
        $model = new Data_Siswa();
        $result = $model->select('kelas')->where('nama', $nama)->first();

        return $this->response->setJSON(['kelas' => $result['kelas']]);
    }
    
    public function getStudentsWithPointsGreaterThan40()
    {
        $builder = $this->db->table('datsis');
        $builder->where('poin >', 74);
        return $builder->get()->getResultArray();
    }

    public function getStudentsByTypeAndSort()
    {
        return $this->where('tipe', 'Siswa')
            ->orderBy('kelas', 'ASC')
            ->orderBy('nama', 'ASC')
            ->findAll();
    }

    public function deleteSiswa($id)
    {
        return $this->delete($id);
    }

    public function getStudentsByClassAndType($kelas)
    {
        return $this->where('kelas', $kelas)
            ->where('tipe', 'Siswa')
            ->findAll();
    }

    public function updateProfile($id, $data)
    {
        return $this->update($id, $data);
    }
}