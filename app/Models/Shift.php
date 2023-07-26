<?php

namespace App\Models;

use CodeIgniter\Model;

class Shift extends Model
{
	protected $table = 'tb_shift';
	protected $primaryKey = 'id';
	protected $allowedFields = ['nm_shift', 'jam_piket', 'ket_jaga'];

	public function __construct()
	{
		$this->db = db_connect();
	}

	public function tampilData()
	{
		return $this->db->table('tb_shift')

			->get()->getResultArray();
	}
	public function getShiftById($id)
	{
		return $this->db->table('tb_shift')
			->where('id', $id)
			->get()->getRowArray();
	}
}
