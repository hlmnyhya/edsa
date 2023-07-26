<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Unit;
use App\Models\Dokumentasi;

class DokumentasiController extends BaseController
{
    protected $dokumentasi;
    protected $unit;

    public function __construct()
    {
        $this->dokumentasi = new Dokumentasi();
        $this->unit = new Unit();
    }

    public function index()
    {
        $data = [
            'tampilData' => $this->dokumentasi->tampilData(),
            'title_meta' => view('partials/title-meta', ['title' => 'Dokumentasi']),
            'page_title' => view('partials/page-title', ['title' => 'Dokumentasi', 'pagetitle' => 'Data Dokumentasi Kegiatan'])
        ];

        return view('dokumentasi/dokumentasi', $data);
    }

    public function create()
    {
        $data = [
            'unit' => $this->unit->tampilData(),
            'title_meta' => view('partials/title-meta', ['title' => 'Tambah Data Dokumentasi Kegiatan']),
            'page_title' => view('partials/page-title', ['title' => 'Dokumentasi', 'pagetitle' => 'Tambah Data Dokumentasi Kegiatan'])
        ];
        return view('dokumentasi/tambah_dokumentasi', $data);
    }

    public function save()
    {
        $fotoFiles = $this->request->getFiles('foto');

        if ($fotoFiles) {
            foreach ($fotoFiles as $foto) {
                foreach ($foto as $singleFoto) {
                    if ($singleFoto->isValid() && !$singleFoto->hasMoved()) {
                        $newName = $singleFoto->getRandomName();
                        $singleFoto->move(ROOTPATH . 'public/uploads/images/', $newName);

                        $data = [
                            'foto' => $newName,
                            'judul' => $this->request->getPost('judul'),
                            'jenis' => $this->request->getPost('jenis'),
                            'tgl' => $this->request->getPost('tgl'),
                            'ket' => $this->request->getPost('ket'),
                            'id_unit' => $this->request->getPost('id_unit'),
                        ];

                        $this->dokumentasi->inputData($data);
                    }
                }
            }
        }

        return redirect()->to('/dokumentasi')->with('success', 'Data Dokumentasi Kegiatan berhasil disimpan.');
    }

    public function edit($id)
    {
        $data = [
            'dokumentasi' => $this->dokumentasi->getDokumentasiById($id),
            'unit' => $this->unit->tampilData(),
            'title_meta' => view('partials/title-meta', ['title' => 'Ubah Data Dokumentasi Kegiatan']),
            'page_title' => view('partials/page-title', ['title' => 'Dokumentasi', 'pagetitle' => 'Ubah Data Dokumentasi Kegiatan'])
        ];

        return view('dokumentasi/ubah_dokumentasi', $data);
    }

    public function update($id)
    {
        $fotoFiles = $this->request->getFiles('foto');

        if ($fotoFiles) {
            foreach ($fotoFiles as $foto) {
                foreach ($foto as $singleFoto) {
                    if ($singleFoto->isValid() && !$singleFoto->hasMoved()) {
                        $newName = $singleFoto->getRandomName();
                        $singleFoto->move(ROOTPATH . 'public/uploads/images/', $newName);

                        $data = [
                            'foto' => $newName,
                            'judul' => $this->request->getPost('judul'),
                            'jenis' => $this->request->getPost('jenis'),
                            'tgl' => $this->request->getPost('tgl'),
                            'ket' => $this->request->getPost('ket'),
                            'id_unit' => $this->request->getPost('id_unit'),
                        ];

                        $this->dokumentasi->ubahData($id, $data);
                    }
                }
            }
        }

        return redirect()->to('/dokumentasi')->with('success', 'Data Dokumentasi Kegiatan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->dokumentasi->delete($id);

        session()->setFlashdata('success', 'Data Dokumentasi Berhasil Dihapus');
        return redirect()->back();
    }

    public function detail($id)
    {
        $data = [
            'dokumentasi' => $this->dokumentasi->getDokumentasiById($id),
            'title_meta' => view('partials/title-meta', ['title' => 'Detail Dokumentasi']),
            'page_title' => view('partials/page-title', ['title' => 'Dokumentasi', 'pagetitle' => 'Detail Dokumentasi Kegiatan'])
        ];

        return view('dokumentasi/detail', $data);
    }
}
