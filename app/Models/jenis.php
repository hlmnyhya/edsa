<?php

namespace App\Models;

use CodeIgniter\Model;

class Jenis extends Model
{
	protected $table = 'tb_jenis_mutasi';
	protected $primaryKey = 'id';
	protected $allowedFields = ['jenis_mutasi'];

	public function __construct()
	{
		$this->db = db_connect();
	}

	public function tampilData()
	{
		return $this->db->table('tb_jenis_mutasi')

			->get()->getResultArray();
	}
	public function getJenisById($id)
	{
		return $this->db->table('tb_jenis_mutasi')
			->where('id', $id)
			->get()->getRowArray();
	}
}
