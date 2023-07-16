<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';
    protected $allowedFields = [
        'kode_pendaftaran', 'kode_pelatihan', 'kode_user', 'status_pendaftaran'
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

    public function getDataPendaftaranByEmail($email)
    {
        return $this->db->query("SELECT * FROM $this->table LEFT JOIN pelatihan ON $this->table.kode_pelatihan = pelatihan.kode_pelatihan LEFT JOIN user ON $this->table.kode_user = user.kode_user WHERE email = '$email'")->getResultArray();
    }

    public function getTotalPendaftaran()
    {
        return $this->db->query("SELECT * FROM $this->table")->getNumRows();
    }
    public function getTotalPendaftaranByKodeUser($kode_user)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE kode_user=$kode_user")->getNumRows();
    }
}
