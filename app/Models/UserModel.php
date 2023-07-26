<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['name', 'email', 'id_anggota' , 'password','level','created_at','updated_at','jenis_mutasi'];
    protected $useTimeStamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'name' => 'required',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[8]'
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Sorry, That email has already been taken. Please choose another.'
        ]
    ];

    protected $skipValidation = false;
    protected $beforeInsert = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }

    public function tampilData()
{
    return $this->db->table('users')
        ->select('users.id, users.name, users.id_anggota ,users.email, users.level, users.created_at, users.updated_at')
        ->select('tb_mutasi.*, tb_anggota.nm_anggota as nm_anggota')
        ->select('tb_mutasi.*, tb_jenis_mutasi.jenis_mutasi as jenis_mutasi')
        ->select('tb_mutasi.*, tb_shift.ket_jaga as ket_jaga')
        ->join('tb_mutasi', 'tb_mutasi.id_anggota=users.id', 'left')
        ->join('tb_anggota', 'tb_anggota.id=tb_mutasi.id_anggota', 'left')
        ->join('tb_jenis_mutasi', 'tb_jenis_mutasi.id=tb_mutasi.id_jenis', 'left')
        ->join('tb_shift', 'tb_shift.id=tb_mutasi.id_shift', 'left')
        ->get()->getResultArray();
}


}
