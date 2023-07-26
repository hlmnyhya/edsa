<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Jenis;

class JenisController extends BaseController
{
	protected $jenis;
	public function __construct()
	{
		$this->jenis = new Jenis();
	}

	public function index()
	{
		// $jabatan = new Jabatan();
		$data = [
			'tampilData' => $this->jenis->tampilData(),
			'title_meta' => view('partials/title-meta', ['title' => 'Jenis']),
			'page_title' => view('partials/page-title', ['title' => 'Jenis', 'pagetitle' => 'Data Jenis Mutasi']),
			// 'jabatan' => $this->jabatan->getJabatan($id)
		];

		return view('jenis/jenis', $data);
	}

	public function create()
	{
		$data = [
			// 'jabatan' => $this->jabatan->tampilData(),
			'title_meta' => view('partials/title-meta', ['title' => 'Tambah Jenis Mutasi ']),
			'page_title' => view('partials/page-title', ['title' => 'Jenis', 'pagetitle' => 'Tambah  Jenis Mutasi'])
		];
		return view('jenis/tambah_jenis', $data);
	}

	public function save()
	{
		$this->jenis->save([
			'jenis_mutasi' => $this->request->getVar('jenis_mutasi'),
		]);

		session()->setFlashdata('success', 'Data Jenis Mutasi Berhasil Ditambahkan');
		return redirect()->to('/jenis');
	}

	public function edit($id)
	{
		$data = [
			'jenis' => $this->jenis->getJenisById($id),
			'title_meta' => view('partials/title-meta', ['title' => 'Ubah Data Jenis Mutasi']),
			'page_title' => view('partials/page-title', ['title' => 'Jenis', 'pagetitle' => 'Ubah Jenis Mutasi'])
		];
		return view('jenis/ubah_jenis', $data);
	}

	public function update($id)
	{
		// Memuat model yang sesuai
		// $model = new UserModel();
		$this->jenis->save([
			'id' => $id,
			'jenis_mutasi' => $this->request->getVar('jenis_mutasi'),
		]);

		session()->setFlashdata('success', 'Data Jenis Mutasi Berhasil Diubah');
		return redirect()->to('/jenis');
	}

	public function delete($id)
	{
		$this->jenis->delete($id);

		session()->setFlashdata('success', 'Data Jenis Mutasi Berhasil Dihapus');
		return redirect()->back();
	}
}
