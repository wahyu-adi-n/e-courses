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
                'header' => 'Halaman Intsruktur',
            ]);
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect('/');
    }
}
