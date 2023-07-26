<?php

namespace App\Models;

use CodeIgniter\Model;

class Akun extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'id';
	protected $allowedFields = ['name', 'email', 'password','level'];

	public function __construct()
	{
		$this->db = db_connect();
	}

	public function tampilData()
	{
		return $this->db->table('users')

			->get()->getResultArray();
	}
	public function getAkunById($id)
	{
		return $this->db->table('users')
			->where('id', $id)
			->get()->getRowArray();
	}

}
