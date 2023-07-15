<?php

namespace App\Models;

use CodeIgniter\Model;

class PelatihanModel extends Model
{
    protected $table = 'pelatihan';
    protected $primaryKey = 'kode_pelatihan';
    protected $allowedFields = [
        'nama_pelatihan', 'deskripsi', 'tgl_mulai',
        'tgl_selesai', 'durasi_pelatihan',
        'lokasi', 'kode_instruktur'
    ];

    public function getAllDataPelatihan($id = false)
    {
        if ($id === false) {
            return $this->db->query("SELECT * FROM $this->table ORDER BY kode_pelatihan ASC ")->getResultArray();
        }
        return $this->db->query("SELECT * FROM $this->table WHERE kode_pelatihan = $id")->getRowArray();
    }


    // public function deleteUserById($kode)
    // {
    //     return $this->db->query("DELETE FROM $this->table WHERE kode_user = '$kode'");
    // }

    public function getTotalPelatihan()
    {
        return $this->db->query("SELECT * FROM $this->table")->getNumRows();
    }

    // public function getUserByEmail($email)
    // {
    //     return $this->db->query("SELECT * FROM $this->table WHERE email = '$email'")->getRowArray();
    // }
}
