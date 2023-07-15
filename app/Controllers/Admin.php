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

    public function editPesertaPage($id)
    {
        $d = [
            'title' => 'E-Course',
            'header' => 'Halaman Edit Peserta',
            'mbl' =>  model('MobilModel')->getAllMobil($id),
            'jns' =>  model('MobilModel')->getAllJenisMobil()
        ];
        return view('mobil/edit', $d);
    }

    public function editInstrukturPage($id)
    {
        return view('admin/instruktur_page/edit/', [
            'title' => 'E-Course',
            'header' => 'Halaman Edit Instruktur',
            'mbl' =>  model('MobilModel')->getAllMobil($id),
            'jns' =>  model('MobilModel')->getAllJenisMobil()
        ]);
    }

    public function editPelatihanPage($id)
    {
        return view('admin/pelatihan_page/edit/', [
            'title' => 'E-Course',
            'header' => 'Halaman Edit Pelatihan',
            'mbl' =>  model('MobilModel')->getAllMobil($id),
            'jns' =>  model('MobilModel')->getAllJenisMobil()
        ]);
    }

    public function updatePesertaProcess($id)
    {
        $user = new UserModel();
        $user->save([
            'id_mobil' => $id,
            'id_jenis' => $this->request->getVar('id_jenis'),
            'type_mobil' => $this->request->getVar('type_mobil'),
            'merk' => $this->request->getVar('merk'),
            'no_polisi' => $this->request->getVar('no_polisi'),
            'warna' => $this->request->getVar('warna'),
            'harga' => $this->request->getVar('harga'),
            'status' => $this->request->getvar('status')
        ]);
        return redirect()->redirect("admin/peserta_page");
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
