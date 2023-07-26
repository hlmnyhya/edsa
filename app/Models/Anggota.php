<?php

namespace App\Models;

use CodeIgniter\Model;

class Anggota extends Model
{
	protected $table = 'tb_anggota';
	protected $primaryKey = 'id';
	protected $allowedFields = ['nm_anggota', 'nrp', 'pangkat', 'id_jabatan', 'tgl_lahir', 'jk'];

	public function __construct()
	{
		$this->db = db_connect();
	}

	public function tampilData()
	{
		return $this->db->table('tb_anggota')
			->select('tb_anggota.*, tb_jabatan.simbol_jabatan as simbol_jabatan')
			->join('tb_jabatan', 'tb_jabatan.id=tb_anggota.id_jabatan', 'left')
			->get()->getResultArray();
	}

	public function getAnggotaNotInMutasi()
	{
		$subquery = $this->db->table('tb_mutasi')
		->select('id_anggota')
		->get()
			->getResultArray();

		// Extract 'id_anggota' values from the $subquery result
		$id_anggota_values = array_column($subquery, 'id_anggota');

		$anggotaNotInMutasi = $this->db->table('tb_anggota')
		->whereNotIn('id', $id_anggota_values)
			->get()
			->getResultArray();

		return $anggotaNotInMutasi;
	}
	
	public function tampil()
	{
		return $this->db->table('tb_anggota')
		->select('*')
		->get()->getResultArray();
	}

	public function getUserById($id)
	{
		return $this->db->table('tb_anggota')
			->select('tb_anggota.*, tb_jabatan.simbol_jabatan as simbol_jabatan')
			->join('tb_jabatan', 'tb_jabatan.id=tb_anggota.id_jabatan', 'left')
			->where('tb_anggota.id', $id)
			->get()->getRowArray();
	}
}
