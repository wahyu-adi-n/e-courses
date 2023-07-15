<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\InstrukturModel;
use App\Models\PelatihanModel;

class Admin extends BaseController
{

    public function index()
    {
        $user = new  UserModel();
        $instruktur = new  InstrukturModel();
        $pelatihan = new  PelatihanModel();

        if (session()->get('nama') !== null) {
            return view('/admin/index_page', [
                'title' => 'E-Course',
                'header' => 'Halaman Dashboard',
                'total_user' => $user->getTotalUser(),
                'total_instruktur' => $instruktur->getTotalInstruktur(),
                'total_pelatihan' => $pelatihan->getTotalPelatihan(),
            ]);
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect("/");
    }

    public function pesertaPage()
    {
        $user = new  UserModel();
        if (session()->get('nama') !== null) {
            return view('admin/peserta_page', [
                'title' => 'E-Course',
                'header' => 'Halaman Peserta',
                'peserta' => $user->getAllDataPeserta(),
            ]);
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect("/");
    }

    public function pelatihanPage()
    {
        $pelatihan = new  PelatihanModel();
        if (session()->get('nama') !== null) {
            return view('admin/pelatihan_page', [
                'title' => 'E-Course',
                'header' => 'Halaman Pelatihan',
                'pelatihan' => $pelatihan->getAllDataPelatihan(),
            ]);
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect("/");
    }

    public function instrukturPage()
    {
        $instruktur = new  InstrukturModel();
        if (session()->get('nama') !== null) {
            return view('admin/instruktur_page', [
                'title' => 'E-Course',
                'header' => 'Halaman Instruktur',
                'instruktur' => $instruktur->getAllDataInstruktur(),
            ]);
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect("/");
    }
}
