<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Jabatan;
use App\Models\Anggota;
use CodeIgniter\Config\View;

class AnggotaController extends BaseController
{
	protected $anggota, $jabatan;
	public function __construct()
	{
		$this->anggota = new Anggota();
		$this->jabatan = new Jabatan();
	}

	public function index()
	{
		// $anggota = new Anggota();
		$data = [
			'tampilData' => $this->anggota->tampilData(),
			'title_meta' => view('partials/title-meta', ['title' => 'Anggota']),
			'page_title' => view('partials/page-title', ['title' => 'Anggota', 'pagetitle' => 'Data Anggota'])
		];

		echo View('anggota/anggota', $data);
	}

	public function create()
	{
		$data = [
			'jabatan' => $this->jabatan->tampilData(),
			'title_meta' => view('partials/title-meta', ['title' => 'Tambah Data Anggota']),
			'page_title' => view('partials/page-title', ['title' => 'Anggota', 'pagetitle' => 'Tambah Data Anggota'])
		];
		return view('anggota/tambah_anggota', $data);
	}

	public function save()
	{
		$this->anggota->save([
			'nm_anggota' => $this->request->getVar('nm_anggota'),
			'nrp' => $this->request->getVar('nrp'),
			'pangkat' => $this->request->getVar('pangkat'),
			'id_jabatan' => $this->request->getVar('id_jabatan'),
			'tgl_lahir' => $this->request->getVar('tgl_lahir'),
			'jk' => $this->request->getVar('jk'),
		]);

		session()->setFlashdata('success', 'Data Anggota Berhasil Ditambahkan');

		return redirect()->to('/anggota');
	}

	public function edit($id)
	{
		$data = [
			'anggota' => $this->anggota->getUserById($id),
			'jabatan' => $this->jabatan->tampilData(),
			'title_meta' => view('partials/title-meta', ['title' => 'Ubah Data Anggota']),
			'page_title' => view('partials/page-title', ['title' => 'Anggota', 'pagetitle' => 'Ubah Data Anggota'])
		];
		// dd($data);
		return view('anggota/ubah_anggota', $data,);
	}

	public function update($id)
	{
		// Memuat model yang sesuai
		// $model = new UserModel();
		$this->anggota->save([
			'id' => $id,
			'nm_anggota' => $this->request->getVar('nm_anggota'),
			'nrp' => $this->request->getVar('nrp'),
			'pangkat' => $this->request->getVar('pangkat'),
			'id_jabatan' => $this->request->getVar('id_jabatan'),
			'tgl_lahir' => $this->request->getVar('tgl_lahir'),
			'jk' => $this->request->getVar('jk'),
		]);

		session()->setFlashdata('success', 'Data Anggota Berhasil Diubah');

		return redirect()->to('/anggota');
	}

	public function delete($id)
	{
		$this->anggota->delete($id);

		session()->setFlashdata('success', 'Data Anggota Berhasil Dihapus');
		return redirect()->back();
	}
}
