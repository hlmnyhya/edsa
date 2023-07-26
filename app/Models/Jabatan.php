<?php

namespace App\Models;

use CodeIgniter\Model;

class Jabatan extends Model
{
	protected $table = 'tb_jabatan';
	protected $primaryKey = 'id';
	protected $allowedFields = ['nm_jabatan', 'simbol_jabatan'];

	public function __construct()
	{
		$this->db = db_connect();
	}

	public function tampilData()
	{
		return $this->db->table('tb_jabatan')

			->get()->getResultArray();
	}
	public function getJabatanById($id)
	{
		return $this->db->table('tb_jabatan')
			->where('id', $id)
			->get()->getRowArray();
	}
}
