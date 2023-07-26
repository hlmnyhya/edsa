<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Jabatan;

class JabatanController extends BaseController
{
	protected $jabatan;
	public function __construct()
	{
		$this->jabatan = new Jabatan();
	}

	public function index()
	{
		// $jabatan = new Jabatan();
		$data = [
			'tampilData' => $this->jabatan->tampilData(),
			'title_meta' => view('partials/title-meta', ['title' => 'Jabatan']),
			'page_title' => view('partials/page-title', ['title' => 'Jabatan', 'pagetitle' => 'Data Jabatan']),
			// 'jabatan' => $this->jabatan->getJabatan($id)
		];

		return view('jabatan/jabatan', $data);
	}

	public function create()
	{
		$data = [
			// 'jabatan' => $this->jabatan->tampilData(),
			'title_meta' => view('partials/title-meta', ['title' => 'Tambah Data Jabatan']),
			'page_title' => view('partials/page-title', ['title' => 'Jabatan', 'pagetitle' => 'Tambah Data Jabatan'])
		];
		return view('jabatan/tambah_jabatan', $data);
	}

	public function save()
	{
		$this->jabatan->save([
			'nm_jabatan' => $this->request->getVar('nm_jabatan'),
			'simbol_jabatan' => $this->request->getVar('simbol_jabatan'),
		]);

		session()->setFlashdata('success', 'Data Jabatan Berhasil Ditambahkan');
		return redirect()->to('/jabatan');
	}

	public function edit($id)
	{
		$data = [
			'jabatan' => $this->jabatan->getJabatanById($id),
			'title_meta' => view('partials/title-meta', ['title' => 'Ubah Data Jabatan']),
			'page_title' => view('partials/page-title', ['title' => 'Jabatan', 'pagetitle' => 'Ubah Data Jabatan'])
		];
		return view('jabatan/ubah_jabatan', $data);
	}

	public function update($id)
	{
		// Memuat model yang sesuai
		// $model = new UserModel();
		$this->jabatan->save([
			'id' => $id,
			'nm_jabatan' => $this->request->getVar('nm_jabatan'),
			'simbol_jabatan' => $this->request->getVar('simbol_jabatan'),
		]);

		session()->setFlashdata('success', 'Data Jabatan Berhasil Diubah');
		return redirect()->to('/jabatan');
	}

	public function delete($id)
	{
		$this->jabatan->delete($id);

		session()->setFlashdata('success', 'Data Jabatan Berhasil Dihapus');
		return redirect()->back();
	}
}
