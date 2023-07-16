<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran';
    protected $primaryKey = 'kode_pendaftaran';
    protected $allowedFields = [
        'kode_pendaftaran', 'kode_pelatihan', 'kode_user', 'tgl_mulai_pendaftaran',
        'tgl_selesai_pendaftaran', 'status_pendaftaran'
    ];


    public function cek($id)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE kode_pendaftaran ='$id'")->getRowArray();
    }


    public function getAllDataPendaftaran($id = false)
    {
        if ($id === false) {
            return $this->db->query("SELECT * FROM $this->table LEFT JOIN pelatihan ON $this->table.kode_pelatihan = pelatihan.kode_pelatihan LEFT JOIN user ON $this->table.kode_user = user.kode_user ORDER BY kode_pendaftaran ASC ")->getResultArray();
        }
        return $this->db->query("SELECT * FROM $this->table LEFT JOIN pelatihan ON $this->table.kode_pelatihan = pelatihan.kode_pelatihan LEFT JOIN user ON $this->table.kode_user = user.kode_user WHERE kode_pendaftaran = $id")->getRowArray();
    }

    public function deletePendaftaran($id)
    {
        return $this->db->query("DELETE FROM $this->table WHERE kode_pelatihan = '$id'");
    }

    public function getTotalPendaftaran()
    {
        return $this->db->query("SELECT * FROM $this->table")->getNumRows();
    }

    public function getPendaftaranByID($id)
    {
        return $this->db->query("SELECT * FROM $this->table LEFT JOIN instruktur ON $this->table.kode_instruktur = instruktur.kode_instruktur WHERE kode_pelatihan = '$id'")->getRowArray();
    }
}
