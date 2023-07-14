<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Instruktur extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'E-Course',
            'header' => 'Halaman Dashboard',
        ];
        return view('instruktur/index_page', $data);
    }

    public function viewCourse()
    {
        $data = [
            'title' => 'E-Course',
            'header' => 'Halaman Lihat Pelatihan',
        ];
        return view('instruktur/pelatihan_page', $data);
    }

    public function applyCourse()
    {
        $data = [
            'title' => 'E-Course',
            'header' => 'Halaman Daftar Pelatihan',
        ];
        return view('instruktur/index_page', $data);
    }

    public function cancelCourse()
    {
    }
}
