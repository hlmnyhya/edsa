<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Anggota;
use App\Models\Unit;
use CodeIgniter\Config\View;

class UnitController extends BaseController
{
	protected $unit, $anggota;
	public function __construct()
	{
		$this->unit = new Unit();
		$this->anggota = new Anggota();
	}

	public function index()
	{
		// $unit = new Unit();
		$data = [
			'tampilData' => $this->unit->tampilData(),
			'title_meta' => view('partials/title-meta', ['title' => 'Unit']),
			'page_title' => view('partials/page-title', ['title' => 'Unit', 'pagetitle' => 'Data Unit'])
		];

		echo View('unit/unit', $data);
	}

	public function create()
	{
		$data = [
			'anggota' => $this->anggota->tampilData(),
			'title_meta' => view('partials/title-meta', ['title' => 'Tambah Data Unit']),
			'page_title' => view('partials/page-title', ['title' => 'Unit', 'pagetitle' => 'Tambah Data Unit'])
		];
		return view('unit/tambah_unit', $data);
	}

	public function save()
	{
		$this->unit->save([
			'nm_unit' => $this->request->getVar('nm_unit'),
			'simbol_unit' => $this->request->getVar('simbol_unit'),
			'id_anggota' => $this->request->getVar('id_anggota'),
		]);

		session()->setFlashdata('success', 'Data Unit Berhasil Ditambahkan');

		return redirect()->to('/unit');
	}

	public function edit($id)
	{
		$data = [
			'unit' => $this->unit->getUserById($id),
			'anggota' => $this->anggota->tampilData(),
			'title_meta' => view('partials/title-meta', ['title' => 'Ubah Data Unit']),
			'page_title' => view('partials/page-title', ['title' => 'Unit', 'pagetitle' => 'Ubah Data Unit'])
		];
		// dd($data);
		return view('unit/ubah_unit', $data,);
	}

	public function update($id)
	{
		$this->unit->save([
			'id' => $id,
			'nm_unit' => $this->request->getVar('nm_unit'),
			'simbol_unit' => $this->request->getVar('simbol_unit'),
			'id_anggota' => $this->request->getVar('id_anggota'),
		]);

		session()->setFlashdata('success', 'Data Unit Berhasil Diubah');

		return redirect()->to('/unit');
	}

	public function delete($id)
	{
		$this->unit->delete($id);

		session()->setFlashdata('success', 'Data Unit Berhasil Dihapus');
		return redirect()->back();
	}
}
