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

    public function addPesertaPage()
    {
        if (session()->get('nama') !== null) {
            return view('admin/tambah_peserta_page', [
                'title' => 'E-Course',
                'header' => 'Halaman Tambah Peserta',
            ]);
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
            return view('admin/tambah_instruktur_page', [
                'title' => 'E-Course',
                'header' => 'Halaman Tambah Instruktur',
            ]);
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
                'alamat' => $this->request->getVar('alamt'),
                'nohp' => $this->request->getVar('nohp'),
                'email' => $this->request->getVar('email'),
            ]);
            session()->setFlashdata('success', 'Data Instruktur Berhasil Didaftarkan!');
            return redirect()->redirect("/admin/instruktur/tambah");
        } else {
            session()->setFlashdata('fail', 'Data Instruktur Sudah Terdaftar!');
            return redirect()->redirect("/admin/instruktur/tambah");
        }
    }

    public function addPelatihanPage()
    {
        if (session()->get('nama') !== null) {
            return view('admin/tambah_pelatihan_page', [
                'title' => 'E-Course',
                'header' => 'Halaman Tambah Pelatihan',
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
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
            ]);
            session()->setFlashdata('success', 'Data Pelatihan Berhasil Didaftarkan!');
            return redirect()->redirect("/admin/pelatihan/tambah");
        } else {
            session()->setFlashdata('fail', 'Data Pelatihan Sudah Terdaftar!');
            return redirect()->redirect("/admin/pelatihan/tambah");
        }
    }

    public function editPesertaPage($id)
    {
        $user = new UserModel();
        // var_dump($user->getUserByID($id));

        return view('admin/edit_peserta_page', [
            'title' => 'E-Course',
            'header' => 'Halaman Edit Peserta',
            'kode_user' =>  $id,
            'peserta' => $user->getUserByID($id),
        ]);
    }

    public function editInstrukturPage($id)
    {
        return view('admin/edit_instruktur_page', [
            'title' => 'E-Course',
            'header' => 'Halaman Edit Instruktur',
            'kode_instruktur' =>  $id,
        ]);
    }

    public function editPelatihanPage($id)
    {
        return view('admin/edit_pelatihan_page', [
            'title' => 'E-Course',
            'header' => 'Halaman Edit Pelatihan',
            'kode_pelatihan' =>  $id,
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
        $instruktur = new InstrukturModel();
        $instruktur->save([
            'id_mobil' => $id,
            'id_jenis' => $this->request->getVar('id_jenis'),
            'type_mobil' => $this->request->getVar('type_mobil'),
            'merk' => $this->request->getVar('merk'),
            'no_polisi' => $this->request->getVar('no_polisi'),
            'warna' => $this->request->getVar('warna'),
            'harga' => $this->request->getVar('harga'),
            'status' => $this->request->getvar('status')
        ]);
        return redirect()->redirect("admin/instruktur_page");
    }

    public function updatePelatihanProcess($id)
    {
        $pelatihan = new PelatihanModel();
        $pelatihan->save([
            'id_mobil' => $id,
            'id_jenis' => $this->request->getVar('id_jenis'),
            'type_mobil' => $this->request->getVar('type_mobil'),
            'merk' => $this->request->getVar('merk'),
            'no_polisi' => $this->request->getVar('no_polisi'),
            'warna' => $this->request->getVar('warna'),
            'harga' => $this->request->getVar('harga'),
            'status' => $this->request->getvar('status')
        ]);
        return redirect()->redirect("admin/pelatihan_page");
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
