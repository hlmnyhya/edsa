<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Shift;

class ShiftController extends BaseController
{
	protected $shift;
	public function __construct()
	{
		$this->shift = new Shift();
	}

	public function index()
	{
		// $jabatan = new Jabatan();
		$data = [
			'tampilData' => $this->shift->tampilData(),
			'title_meta' => view('partials/title-meta', ['title' => 'Shift']),
			'page_title' => view('partials/page-title', ['title' => 'Shift', 'pagetitle' => 'Data Shift']),
			// 'jabatan' => $this->jabatan->getJabatan($id)
		];

		return view('shift/shift', $data);
	}

	public function create()
	{
		$data = [
			// 'jabatan' => $this->jabatan->tampilData(),
			'title_meta' => view('partials/title-meta', ['title' => 'Tambah Data Shift']),
			'page_title' => view('partials/page-title', ['title' => 'Shift', 'pagetitle' => 'Tambah Data Shift'])
		];
		return view('shift/tambah_shift', $data);
	}

	public function save()
	{
		$this->shift->save([
			'nm_shift' => $this->request->getVar('nm_shift'),
			'jam_piket' => $this->request->getVar('jam_piket'),
			'ket_jaga' => $this->request->getVar('ket_jaga'),
		]);

		session()->setFlashdata('success', 'Data Shift Berhasil Ditambahkan');
		return redirect()->to('/shift');
	}

	public function edit($id)
	{
		$data = [
			'shift' => $this->shift->getShiftById($id),
			'title_meta' => view('partials/title-meta', ['title' => 'Ubah Data Shift']),
			'page_title' => view('partials/page-title', ['title' => 'Shift', 'pagetitle' => 'Ubah Data Shift'])
		];
		return view('shift/ubah_shift', $data);
	}

	public function update($id)
	{
		// Memuat model yang sesuai
		// $model = new UserModel();
		$this->shift->save([
			'id' => $id,
			'nm_shift' => $this->request->getVar('nm_shift'),
			'jam_piket' => $this->request->getVar('jam_piket'),
			'ket_jaga' => $this->request->getVar('ket_jaga'),
		]);

		session()->setFlashdata('success', 'Data Shift Berhasil Diubah');
		return redirect()->to('/shift');
	}

	public function delete($id)
	{
		$this->shift->delete($id);

		session()->setFlashdata('success', 'Data Shift Berhasil Dihapus');
		return redirect()->back();
	}
}
