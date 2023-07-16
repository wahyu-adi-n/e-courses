<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\InstrukturModel;
use App\Models\PelatihanModel;
use App\Models\PendaftaranModel;

class Admin extends BaseController
{

    public function index()
    {
        $user = new  UserModel();
        $instruktur = new  InstrukturModel();
        $pelatihan = new  PelatihanModel();
        $pendaftaran = new  PendaftaranModel();

        if (session()->get('nama') !== null) {
            if (session()->get('level') == 'admin') {
                return view('/admin/index_page', [
                    'title' => 'E-Course',
                    'header' => 'Halaman Dashboard',
                    'total_user' => $user->getTotalUser(),
                    'total_instruktur' => $instruktur->getTotalInstruktur(),
                    'total_pelatihan' => $pelatihan->getTotalPelatihan(),
                    'total_pendaftaran' => $pendaftaran->getTotalPendaftaran(),
                ]);
            } else {
                session()->setFlashdata('gagal', 'Anda Tidak Bisa Mengakses Halaman Ini!');
                return redirect()->redirect("/peserta");
            }
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect("/");
    }

    public function pesertaPage()
    {
        $user = new  UserModel();
        if (session()->get('nama') !== null) {
            if (session()->get('level') == 'admin') {
                return view('admin/peserta_page', [
                    'title' => 'E-Course',
                    'header' => 'Halaman Peserta',
                    'peserta' => $user->getAllDataPeserta(),
                ]);
            } else {
                session()->setFlashdata('gagal', 'Anda Tidak Bisa Mengakses Halaman Ini!');
                return redirect()->redirect("/peserta");
            }
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect("/");
    }

    public function instrukturPage()
    {
        $instruktur = new  InstrukturModel();
        if (session()->get('nama') !== null) {
            if (session()->get('level') == 'admin') {
                return view('admin/instruktur_page', [
                    'title' => 'E-Course',
                    'header' => 'Halaman Instruktur',
                    'instruktur' => $instruktur->getAllDataInstruktur(),
                ]);
            } else {
                session()->setFlashdata('gagal', 'Anda Tidak Bisa Mengakses Halaman Ini!');
                return redirect()->redirect("/peserta");
            }
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect("/");
    }

    public function pelatihanPage()
    {
        $pelatihan = new  PelatihanModel();

        if (session()->get('nama') !== null) {
            if (session()->get('level') == 'admin') {
                return view('admin/pelatihan_page', [
                    'title' => 'E-Course',
                    'header' => 'Halaman Pelatihan',
                    'pelatihan' => $pelatihan->getAllDataPelatihan(),
                ]);
            } else {
                session()->setFlashdata('gagal', 'Anda Tidak Bisa Mengakses Halaman Ini!');
                return redirect()->redirect("/peserta");
            }
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect("/");
    }

    public function pendaftaranPage()
    {
        $pendaftaran = new  PendaftaranModel();
        if (session()->get('nama') !== null) {
            if (session()->get('level') == 'admin') {
                return view('admin/pendaftaran_page', [
                    'title' => 'E-Course',
                    'header' => 'Halaman Pendaftaran',
                    'pendaftaran' => $pendaftaran->getAllDataPendaftaran(),
                ]);
            } else {
                session()->setFlashdata('gagal', 'Anda Tidak Bisa Mengakses Halaman Ini!');
                return redirect()->redirect("/peserta");
            }
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect("/");
    }

    public function addPesertaPage()
    {
        if (session()->get('nama') !== null) {
            if (session()->get('level') == 'admin') {
                return view('admin/tambah_peserta_page', [
                    'title' => 'E-Course',
                    'header' => 'Halaman Tambah Peserta',
                ]);
            } else {
                session()->setFlashdata('gagal', 'Anda Tidak Bisa Mengakses Halaman Ini!');
                return redirect()->redirect("/peserta");
            }
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect("/");
    }

    public function addPesertaProcess()
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
            session()->setFlashdata('success', 'Data Peserta Berhasil Didaftarkan!');
            return redirect()->redirect("/admin/peserta");
        } else {
            session()->setFlashdata('fail', 'Data Peserta Sudah Terdaftar!');
            return redirect()->redirect("/admin/peserta/tambah");
        }
    }

    public function addInstrukturPage()
    {
        if (session()->get('nama') !== null) {
            if (session()->get('level') == 'admin') {
                return view('admin/tambah_instruktur_page', [
                    'title' => 'E-Course',
                    'header' => 'Halaman Tambah Instruktur',
                ]);
            } else {
                session()->setFlashdata('gagal', 'Anda Tidak Bisa Mengakses Halaman Ini!');
                return redirect()->redirect("/peserta");
            }
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect("/");
    }

    public function addInstrukturProcess()
    {
        $instruktur = new  InstrukturModel();
        $email = $this->request->getVar('email');
        $cek =  $instruktur->cek($email);
        if ($cek == 'NULL' || $cek == 'null' || $cek == null) {
            $instruktur->save([
                'nama_instruktur' => $this->request->getVar('nama_instruktur'),
                'alamat' => $this->request->getVar('alamat'),
                'nohp' => $this->request->getVar('nohp'),
                'email' => $this->request->getVar('email'),
            ]);
            session()->setFlashdata('success', 'Data Instruktur Berhasil Didaftarkan!');
            return redirect()->redirect("/admin/instruktur");
        } else {
            session()->setFlashdata('fail', 'Data Instruktur Sudah Terdaftar!');
            return redirect()->redirect("/admin/instruktur/tambah");
        }
    }

    public function addPelatihanPage()
    {
        $instruktur = new InstrukturModel();
        if (session()->get('nama') !== null && session()->get('level') == 'admin') {
            return view('admin/tambah_pelatihan_page', [
                'title' => 'E-Course',
                'header' => 'Halaman Tambah Pelatihan',
                'instruktur' => $instruktur->getAllDataInstruktur(),
            ]);
        }
        session()->setFlashdata('fail', 'Anda Belum Login!');
        return redirect()->redirect("/");
    }

    public function addPelatihanProcess()
    {
        $pelatihan = new  PelatihanModel();
        $kode_pelatihan = $this->request->getVar('kode_pelatihan');
        $cek =  $pelatihan->cek($kode_pelatihan);
        if ($cek == 'NULL' || $cek == 'null' || $cek == null) {
            $pelatihan->save([
                'nama_pelatihan' => $this->request->getVar('nama_pelatihan'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'tgl_mulai' => $this->request->getVar('tgl_mulai'),
                'tgl_selesai' => $this->request->getVar('tgl_selesai'),
                'lokasi' => $this->request->getVar('lokasi'),
                'kode_instruktur' => $this->request->getVar('kode_instruktur'),
            ]);
            session()->setFlashdata('success', 'Data Pelatihan Berhasil Didaftarkan!');
            return redirect()->redirect("/admin/pelatihan");
        } else {
            session()->setFlashdata('fail', 'Data Pelatihan Sudah Terdaftar!');
            return redirect()->redirect("/admin/pelatihan/tambah");
        }
    }

    public function editPesertaPage($id)
    {
        $user = new UserModel();

        return view('admin/edit_peserta_page', [
            'title' => 'E-Course',
            'header' => 'Halaman Edit Peserta',
            'kode_user' =>  $id,
            'peserta' => $user->getUserByID($id),
        ]);
    }

    public function editInstrukturPage($id)
    {
        $instruktur = new InstrukturModel();
        return view('admin/edit_instruktur_page', [
            'title' => 'E-Course',
            'header' => 'Halaman Edit Instruktur',
            'kode_instruktur' =>  $id,
            'instruktur' => $instruktur->getInstrukturByID($id),
        ]);
    }

    public function editPelatihanPage($id)
    {
        $pelatihan = new PelatihanModel();
        $instruktur =  new InstrukturModel();
        return view('admin/edit_pelatihan_page', [
            'title' => 'E-Course',
            'header' => 'Halaman Edit Pelatihan',
            'kode_pelatihan' =>  $id,
            'pelatihan' => $pelatihan->getPelatihanByID($id),
            'instruktur' => $instruktur->getAllDataInstruktur(),
        ]);
    }

    public function updatePesertaProcess($id)
    {
        $user = new UserModel();
        $user->save([
            'kode_user' => $id,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
        ]);
        return redirect()->redirect("/admin/peserta");
    }

    public function updateInstrukturProcess($id)
    {
        $instruktur = new instrukturModel();
        $instruktur->save([
            'kode_instruktur' => $id,
            'nama_instruktur' => $this->request->getVar('nama_instruktur'),
            'alamat' => $this->request->getVar('alamat'),
            'nohp' => $this->request->getVar('nohp'),
            'email' => $this->request->getVar('email'),
        ]);
        return redirect()->redirect("/admin/instruktur");
    }

    public function updatePelatihanProcess($id)
    {
        $pelatihan = new PelatihanModel();
        $pelatihan->save([
            'kode_pelatihan' => $id,
            'nama_pelatihan' => $this->request->getVar('nama_pelatihan'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tgl_mulai' => $this->request->getVar('tgl_mulai'),
            'tgl_selesai' => $this->request->getVar('tgl_selesai'),
            'lokasi' => $this->request->getVar('lokasi'),
            'kode_instruktur' => $this->request->getVar('kode_instruktur'),
        ]);
        return redirect()->redirect("/admin/pelatihan");
    }

    public function approvePendaftaranProcess($id)
    {
        $pendaftaran = new PendaftaranModel();
        $pendaftaran->save([
            'id_pendaftaran' => $id,
            'status_pendaftaran' => 1,
        ]);
        return redirect()->redirect("/admin/pendaftaran");
    }

    public function rejectPendaftaranProcess($id)
    {
        $pendaftaran = new PendaftaranModel();
        $pendaftaran->save([
            'id_pendaftaran' => $id,
            'status_pendaftaran' => 2,
        ]);
        return redirect()->redirect("/admin/pendaftaran");
    }

    public function deletePeserta($id)
    {
        $user = new UserModel();
        $user->deletePeserta($id);
        return redirect()->redirect("/admin/peserta");
    }

    public function deleteInstruktur($id)
    {
        $instruktur = new InstrukturModel();
        $instruktur->deleteInstruktur($id);
        return redirect()->redirect("/admin/instruktur");
    }

    public function deletePelatihan($id)
    {
        $pelatihan = new PelatihanModel();
        $pelatihan->deletePelatihan($id);
        return redirect()->redirect("/admin/pelatihan");
    }
}
