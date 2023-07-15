<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function login()
    {
        return view(
            'login_page',
            [
                'title' => 'E-Course',
                'header' => 'Halaman Login'
            ]
        );
    }

    public function loginProcess()
    {

        $user = new  UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $cek = $user->login($email, $password);

        if ($email === "admin@gmail.com" && $password === 'admin123') {
            session()->set([
                'nama' => "Administrator",
                'email' => $email,
            ]);
            return redirect()->redirect("/admin");
        }

        if ($cek == 'NULL' || $cek == 'null' || $cek == null) {
            session()->setFlashdata('fail', 'Email atau Password Salah!');
            return redirect()->redirect("/");
        } else {
            session()->set([
                'nama' => $cek['nama'],
                'email' => $cek['email'],
            ]);
            session()->setFlashdata('success', 'Anda Berhasil Login!');
            return "Homepage";
        }
    }

    public function register()
    {
        return view('register_page', [
            'title' => 'E-Course',
            'header' => 'Halaman Register'
        ]);
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
            return redirect()->redirect("/");
        } else {
            session()->setFlashdata('fail', 'Data User Sudah Terdaftar!');
            return redirect()->redirect("/register");
        }
    }

    public function logout()
    {
        $array_items = ['nama', 'email'];
        session()->remove($array_items);
        session()->setFlashdata('success', 'Anda Berhasil Logout!');
        return redirect()->redirect("/");
    }
}
