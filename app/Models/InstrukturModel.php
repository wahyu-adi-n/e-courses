<?php

namespace App\Models;

use CodeIgniter\Model;

class InstrukturModel extends Model
{
    protected $table = 'instruktur';
    protected $primaryKey = 'kode_instruktur';
    protected $allowedFields = ['nama_instruktur',    'alamat',    'nohp', 'email',];

    public function getAllDataInstruktur($id = false)
    {
        if ($id === false) {
            return $this->db->query("SELECT * FROM $this->table ORDER BY kode_instruktur ASC ")->getResultArray();
        }
        return $this->db->query("SELECT * FROM $this->table WHERE kode_instruktur = $id")->getRowArray();
    }


    // public function deleteUserById($kode)
    // {
    //     return $this->db->query("DELETE FROM $this->table WHERE kode_user = '$kode'");
    // }

    public function getTotalInstruktur()
    {
        return $this->db->query("SELECT * FROM $this->table")->getNumRows();
    }

    // public function getUserByEmail($email)
    // {
    //     return $this->db->query("SELECT * FROM $this->table WHERE email = '$email'")->getRowArray();
    // }
}
