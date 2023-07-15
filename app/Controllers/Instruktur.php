<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Instruktur extends BaseController
{
    public function index()
    {
        if (session()->get('nama') !== null) {
            return view('instruktur/index_page', [
                'title' => 'E-Course',
                'header' => 'Halaman Dashboard',
            ]);
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect('/');
    }

    public function viewCourse()
    {
        if (session()->get('nama') !== null) {
            return view('instruktur/pelatihan_page', [
                'title' => 'E-Course',
                'header' => 'Halaman Lihat Pelatihan',
            ]);
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect('/');
    }

    public function applyCourse()
    {
    }

    public function cancelCourse()
    {
    }
}
