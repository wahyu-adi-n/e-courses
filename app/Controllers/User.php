<?php

namespace App\Controllers;

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

        // $user = new  UserModel();

        $cek = 0; #$user->login($email, $password);

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pwd');
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
            return redirect()->redirect("/koordinator/daftar_staf");
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
}
