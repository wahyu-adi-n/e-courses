<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelatihanModel;
use App\Models\PendaftaranModel;
use App\Models\UserModel;

class Peserta extends BaseController
{
    public function index()
    {
        if (session()->get('nama') !== null) {
            if (session()->get('level') == 'user') {
                $pelatihan = new  PelatihanModel();
                $pendaftaran = new  PendaftaranModel();
                $kode_user = session()->get('kode_user');

                return view('peserta/index_page', [
                    'title' => 'E-Course',
                    'header' => 'Halaman Dashboard',
                    'total_pelatihan' => $pelatihan->getTotalPelatihan(),
                    'total_pendaftaran' => $pendaftaran->getTotalPendaftaranByKodeUser($kode_user),
                ]);
            } else {
                session()->setFlashdata('gagal', 'Anda Tidak Bisa Mengakses Halaman Ini!');
                return redirect()->redirect("/admin");
            }
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect('/');
    }

    public function viewCoursePage()
    {
        $pelatihan = new PelatihanModel();
        if (session()->get('nama') !== null) {
            if (session()->get('level') == 'user') {
                return view('peserta/pelatihan_page', [
                    'title' => 'E-Course',
                    'header' => 'Halaman Lihat Pelatihan',
                    'pelatihan' => $pelatihan->getAllDataPelatihan(),
                ]);
            } else {
                session()->setFlashdata('gagal', 'Anda Tidak Bisa Mengakses Halaman Ini!');
                return redirect()->redirect("/admin");
            }
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect('/');
    }

    public function viewRegistrationPage()
    {
        if (session()->get('nama') !== null) {
            if (session()->get('level') == 'user') {
                $pendaftaran = new  PendaftaranModel();
                $email = session()->get('email');
                return view('peserta/pendaftaran_page', [
                    'title' => 'E-Course',
                    'header' => 'Halaman Lihat Pendaftaran',
                    'pendaftaran' =>
                    $pendaftaran->getDataPendaftaranByEmail($email),
                ]);
            } else {
                session()->setFlashdata('gagal', 'Anda Tidak Bisa Mengakses Halaman Ini!');
                return redirect()->redirect("/admin");
            }
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect('/');
    }

    public function applyCourseProcess($id)
    {
        $pendaftaran = new PendaftaranModel();
        $pendaftaran->save([
            'kode_pendaftaran' => str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT),
            'kode_pelatihan' => $id,
            'kode_user' => session()->get('kode_user'),
            'status_pendaftaran' => 0,
        ]);
        return redirect()->redirect("/peserta/pendaftaran");
    }

    public function cancelApplyCourseProcess($id)
    {
        $pendaftaran = new PendaftaranModel();
        $pendaftaran->save([
            'id_pendaftaran' => $id,
            'status_pendaftaran' => -1,
        ]);
        return redirect()->redirect("/peserta/pendaftaran");
    }
}
