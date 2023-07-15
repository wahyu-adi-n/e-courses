<?php

namespace App\Models;

use CodeIgniter\Model;

class InstrukturModel extends Model
{
    protected $table = 'instruktur';
    protected $primaryKey = 'kode_instruktur';
    protected $allowedFields = ['kode_instruktur', 'nama_instruktur',    'alamat',    'nohp', 'email',];

    public function cek($email)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE email ='$email'")->getRowArray();
    }

    public function getAllDataInstruktur($id = false)
    {
        if ($id === false) {
            return $this->db->query("SELECT * FROM $this->table ORDER BY kode_instruktur ASC ")->getResultArray();
        }
        return $this->db->query("SELECT * FROM $this->table WHERE kode_instruktur = $id")->getRowArray();
    }

    public function deleteInstruktur($id)
    {
        return $this->db->query("DELETE FROM $this->table WHERE kode_instruktur = '$id'");
    }

    public function getTotalInstruktur()
    {
        return $this->db->query("SELECT * FROM $this->table")->getNumRows();
    }

    public function getInstrukturByID($id)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE kode_instruktur = '$id'")->getRowArray();
    }
}
