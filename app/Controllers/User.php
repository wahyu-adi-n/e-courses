<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class User extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'Aplikasi Pelatihan | E-Course',
            'header' => 'Halaman Login'

        ];
        return view('login', $data);
    }

    public function loginProcess()
    {

        $user = new  UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $cek = $user->login($email, $password);

        if ($email === "admin@gmail.com" && $password === 'admin123') {
            return 'Halaman Admin';

            if ($cek == 'NULL' || $cek == 'null' || $cek == null) {
                session()->setFlashdata('fail', 'Email atau Password Salah!');
                return redirect()->redirect("/login");
            }
        } else {
            session()->set([
                'kode_user' => $cek['kode_user'],
                'nama' => $cek['nama'],
                'email' => $cek['email'],
                'username' => $cek['username'],
                'password' => $cek['password'],
            ]);
            session()->setFlashdata('success', 'Anda Berhasil Login!');
            return "Sukses Bang!";
            // return redirect()->redirect("/koordinator/daftar_staf");
        }
    }

    public function register()
    {

        $data = [
            'title' => 'Aplikasi Pelatihan | E-Course',
            'header' => 'Halaman Register'

        ];
        return view('register', $data);
    }

    public function registerProcess()
    {

        $user = new  UserModel();
        $email = $this->request->getVar('email');

        $cek =  $user->cek($email);

        if ($cek == 'NULL' || $cek == 'null' || $cek == null) {
            $user->save([
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
            ]);
            session()->setFlashdata('success', 'Data User Berhasil Didaftarkan!');
            return redirect()->redirect("/login");
        } else {
            session()->setFlashdata('fail', 'Data User Sudah Terdaftar!');
            return redirect()->redirect("/register");
        }
    }
}
