<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Unit;
use App\Models\Berkas;
use CodeIgniter\Config\View;
use CodeIgniter\Exceptions\PageNotFoundException;

class BerkasController extends BaseController
{
    protected $berkas, $unit;

    public function __construct()
    {
        $this->berkas = new Berkas();
        $this->unit = new Unit();
    }

    public function index()
    {
        $data = [
            'tampilData' => $this->berkas->tampilData(),
            'title_meta' => view('partials/title-meta', ['title' => 'Berkas']),
            'page_title' => view('partials/page-title', ['title' => 'Berkas', 'pagetitle' => 'Data Berkas Arsip'])
        ];

        echo view('berkas/berkas', $data);
    }

    public function create()
    {
        $data = [
            'unit' => $this->unit->tampilData(),
            'title_meta' => view('partials/title-meta', ['title' => 'Tambah Data Berkas Arsip']),
            'page_title' => view('partials/page-title', ['title' => 'Berkas', 'pagetitle' => 'Tambah Data Berkas Arsip'])
        ];
        return view('berkas/tambah_berkas', $data);
    }

    public function save()
    {
        $file = $this->request->getFile('berkas');
        $fileName = '';

        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $fileName);
        }

        $data = [
            'berkas' => $fileName,
            'nm_berkas' => $this->request->getVar('nm_berkas'),
            'folder' => $this->request->getVar('folder'),
            'id_unit' => $this->request->getVar('id_unit'),
        ];

        $this->berkas->inputData($data);

        session()->setFlashdata('success', 'Data Berkas Arsip Berhasil Ditambahkan');

        return redirect()->to('/berkas');
    }

    public function edit($id)
    {
        $data = [
            'berkas' => $this->berkas->getUserById($id),
            'unit' => $this->unit->tampilData(),
            'title_meta' => view('partials/title-meta', ['title' => 'Ubah Data Berkas Arsip']),
            'page_title' => view('partials/page-title', ['title' => 'Berkas', 'pagetitle' => 'Ubah Data Berkas Arsip'])
        ];

        return view('berkas/ubah_berkas', $data);
    }

    public function update($id)
    {
        $file = $this->request->getFile('berkas');
        $fileName = $this->berkas->getUserById($id)['berkas'];

        if ($file->isValid() && !$file->hasMoved()) {
            $file->move(ROOTPATH . 'public/uploads', $fileName);
        }

        $data = [
            'id' => $id,
            'berkas' => $fileName,
            'nm_berkas' => $this->request->getVar('nm_berkas'),
            'folder' => $this->request->getVar('folder'),
            'id_unit' => $this->request->getVar('id_unit'),
        ];

        $this->berkas->ubahData($id, $data);

        session()->setFlashdata('success', 'Data Berkas Arsip Berhasil Diubah');

        return redirect()->to('/berkas');
    }

    public function delete($id)
    {
        $this->berkas->delete($id);

        session()->setFlashdata('success', 'Data Berkas Arsip Berhasil Dihapus');
        return redirect()->back();
    }

    public function showBerkas($id)
    {
        $berkas = $this->berkas->getBerkasById($id);

        if ($berkas) {
            $filepath = WRITE_YOUR_FILEPATH . $berkas['berkas'];

            if (file_exists($filepath)) {
                return $this->response->download($filepath, null);
            } else {
                throw PageNotFoundException::forPageNotFound('Berkas tidak ditemukan.');
            }
        } else {
            throw PageNotFoundException::forPageNotFound('Berkas tidak ditemukan.');
        }
    }

    public function detail($id)
    {
        $data = [
            'berkas' => $this->berkas->getBerkasById($id),
            'title_meta' => view('partials/title-meta', ['title' => 'Detail Berkas']),
            'page_title' => view('partials/page-title', ['title' => 'Berkas', 'pagetitle' => 'Detail Berkas Arsip'])
        ];

        echo view('berkas/detail', $data);
    }
    
    public function unduh($id)
    {
        $berkas = $this->berkas->getBerkasById($id);

        if ($berkas) {
            $filepath = ROOTPATH . 'public/uploads/' . $berkas['berkas'];

            if (file_exists($filepath)) {
                return $this->response->download($filepath, null);
            } else {
                throw PageNotFoundException::forPageNotFound('Berkas tidak ditemukan.');
            }
        } else {
            throw PageNotFoundException::forPageNotFound('Berkas tidak ditemukan.');
        }
    }
    
    public function preview($id)
    {
        $berkas = $this->berkas->getBerkasById($id);

        if ($berkas) {
            $filepath = ROOTPATH . 'public/uploads/' . $berkas['berkas'];

            if (file_exists($filepath)) {
                $data = [
                    'file' => $filepath
                ];
                return view('berkas/preview', $data);
            } else {
                throw PageNotFoundException::forPageNotFound('Berkas tidak ditemukan.');
            }
        } else {
            throw PageNotFoundException::forPageNotFound('Berkas tidak ditemukan.');
        }
    }
}
