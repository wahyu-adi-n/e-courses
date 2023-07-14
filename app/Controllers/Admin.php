<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'E-Course',
            'header' => 'Halaman Dashboard',

        ];
        return view('admin/index_page', $data);
    }

    public function pesertaPage()
    {
        $data = [
            'title' => 'E-Course',
            'header' => 'Halaman Admin',

        ];
        return view('admin/peserta_page', $data);
    }

    public function pelatihanPage()
    {
        $data = [
            'title' => 'E-Course',
            'header' => 'Halaman Pelatihan',

        ];
        return view('admin/pelatihan_page', $data);
    }

    public function instrukturPage()
    {
        $data = [
            'title' => 'E-Course',
            'header' => 'Halaman Instruktur',

        ];
        return view('admin/instruktur_page', $data);
    }
}
