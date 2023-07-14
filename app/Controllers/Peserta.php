<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Peserta extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'E-Course',
            'header' => 'Halaman Dashboard',
        ];
        return view('peserta/index_page', $data);
    }

    public function viewCourse()
    {
        $data = [
            'title' => 'E-Course',
            'header' => 'Halaman Lihat Pelatihan',
        ];
        return view('peserta/pelatihan_page', $data);
    }

    public function applyCourse()
    {
        $data = [
            'title' => 'E-Course',
            'header' => 'Halaman Daftar Pelatihan',
        ];
        return view('peserta/apply_course_page', $data);
    }

    public function cancelCourse()
    {
    }
}
