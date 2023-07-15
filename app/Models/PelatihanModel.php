<?php

namespace App\Models;

use CodeIgniter\Model;

class PelatihanModel extends Model
{
    protected $table = 'pelatihan';
    protected $primaryKey = 'kode_pelatihan';
    protected $allowedFields = [
        'kode_pelatihan', 'nama_pelatihan', 'deskripsi', 'tgl_mulai',
        'tgl_selesai', 'lokasi', 'kode_instruktur'
    ];


    public function cek($id)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE kode_pelatihan ='$id'")->getRowArray();
    }


    public function getAllDataPelatihan($id = false)
    {
        if ($id === false) {
            return $this->db->query("SELECT * FROM $this->table LEFT JOIN instruktur ON $this->table.kode_instruktur = instruktur.kode_instruktur ORDER BY kode_pelatihan ASC ")->getResultArray();
        }
        return $this->db->query("SELECT * FROM $this->table LEFT JOIN instruktur ON $this->table.kode_instruktur = instruktur.kode_instruktur WHERE kode_pelatihan = $id")->getRowArray();
    }

    public function deletePelatihan($id)
    {
        return $this->db->query("DELETE FROM $this->table WHERE kode_pelatihan = '$id'");
    }

    public function getTotalPelatihan()
    {
        return $this->db->query("SELECT * FROM $this->table")->getNumRows();
    }

    public function getPelatihanByID($id)
    {
        return $this->db->query("SELECT * FROM $this->table LEFT JOIN instruktur ON $this->table.kode_instruktur = instruktur.kode_instruktur WHERE kode_pelatihan = '$id'")->getRowArray();
    }
}
