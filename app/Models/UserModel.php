<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'kode_user';
    protected $allowedFields = [
        'nama',
        'email',
        'username',
        'password',
    ];

    public function login($email, $password)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE email ='$email' AND password='$password' ")->getRowArray();
    }

    public function cek($email)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE email ='$email'")->getRowArray();
    }

    // public function getAllDataStaff()
    // {
    //     return $this->db->query("SELECT * FROM $this->table WHERE level='staf'
    //     ORDER BY id ASC ")->getResultArray();
    // }

    // public function getAllDataUsers($id = false)
    // {
    //     if ($id === false) {
    //         return $this->db->query("SELECT * FROM $this->table ORDER BY id ASC ")->getResultArray();
    //     }
    //     return $this->db->query("SELECT * FROM $this->table WHERE id = $id")->getRowArray();
    // }


    // public function deleteUserById($kode)
    // {
    //     return $this->db->query("DELETE FROM $this->table WHERE kode_user = '$kode'");
    // }

    // public function getTotalUser()
    // {
    //     return $this->db->query("SELECT * FROM $this->table")->getNumRows();
    // }

    // public function getUserByEmail($email)
    // {
    //     return $this->db->query("SELECT * FROM $this->table WHERE email = '$email'")->getRowArray();
    // }
}
