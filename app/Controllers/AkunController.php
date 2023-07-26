<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Akun;
use App\Models\Anggota;
class AkunController extends BaseController
{
	protected $akun;
	public function __construct()
	{
		$this->akun = new Akun();
		$this->anggota = new Anggota();
	}

	public function index()
	{
		// $akun = new Akun();
		$data = [
			'tampilData' => $this->akun->tampilData(),
			'title_meta' => view('partials/title-meta', ['title' => 'Akun Anggota']),
			'page_title' => view('partials/page-title', ['title' => 'Akun Anggota', 'pagetitle' => 'Data Akun Anggota'])
		];

		echo View('dataakun/dataakun', $data);
	}

	public function create()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Tambah Data Akun Anggota']),
			'page_title' => view('partials/page-title', ['title' => 'Akun Anggota', 'pagetitle' => 'Tambah Data Akun Anggota']),
			'anggota' => $this->anggota->tampilData(),
		];
	
		return view('dataakun/tambah_dataakun', $data, );
	}

	public function save()
	{

		$name = $this->request->getPost('name');
		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
		$level = $this->request->getPost('level');

		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$data = [
			'name' => $name,
			'email' => $email,
			'password' => $hashedPassword,
			'level' => $level
		];

		$akun = new Akun();

		$akun->insert($data);

		session()->setFlashdata('success', 'Data Akun Berhasil Ditambahkan');

		return redirect()->to('/dataakun');
	}

	public function edit($id)
	{
		$data = [
			'akun' => $this->akun->getAkunById($id),
			'title_meta' => view('partials/title-meta', ['title' => 'Ubah Data Anggota']),
			'page_title' => view('partials/page-title', ['title' => 'Akun Anggota', 'pagetitle' => 'Ubah Data Akun Anggota'])
		];
		return view('dataakun/ubah_dataakun', $data);
	}

	public function update($id)
	{
		$this->akun->save([
			'id' => $id,
			'name' => $this->request->getVar('name'),
			'email' => $this->request->getVar('email'),
			'password' => $this->request->getVar('password'),
			'level' => $this->request->getVar('level'),
		]);

		session()->setFlashdata('success', 'Data Akun Berhasil Diubah');

		return redirect()->to('/dataakun');
	}

	public function delete($id)
	{
		$this->akun->delete($id);

		session()->setFlashdata('success', 'Data Akun Berhasil Dihapus');
		return redirect()->back();
	}
}
