<?php

namespace App\Models;

use CodeIgniter\Model;

class Unit extends Model
{
	protected $table = 'tb_unit';
	protected $primaryKey = 'id';
	protected $allowedFields = ['nm_unit', 'simbol_unit', 'id_anggota'];

	public function __construct()
	{
		$this->db = db_connect();
	}

	public function tampilData()
	{
		return $this->db->table('tb_unit')
			->select('tb_unit.*, tb_anggota.nm_anggota as nm_anggota')
			->join('tb_anggota', 'tb_anggota.id=tb_unit.id_anggota', 'left')
			->get()->getResultArray();
	}

	public function getUserById($id)
	{
		return $this->db->table('tb_unit')
			->select('tb_unit.*, tb_anggota.nm_anggota as nm_anggota')
			->join('tb_anggota', 'tb_anggota.id=tb_unit.id_anggota', 'left')
			->where('tb_unit.id', $id)
			->get()->getRowArray();
	}
}
