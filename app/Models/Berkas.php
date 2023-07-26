<?php

namespace App\Models;

use CodeIgniter\Model;

class Berkas extends Model
{
    protected $table = 'tb_berkas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['berkas', 'nm_berkas', 'folder', 'id_unit'];

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function tampilData()
    {
        return $this->db->table('tb_berkas')
            ->select('tb_berkas.*, tb_unit.simbol_unit as simbol_unit')
            ->join('tb_unit', 'tb_unit.id=tb_berkas.id_unit', 'left')
            ->get()->getResultArray();
    }

    public function getUserById($id)
    {
        return $this->db->table('tb_berkas')
            ->select('tb_berkas.*, tb_unit.simbol_unit as simbol_unit')
            ->join('tb_unit', 'tb_unit.id=tb_berkas.id_unit', 'left')
            ->where('tb_berkas.id', $id)
            ->get()->getRowArray();
    }

    public function inputData($data)
    {
        $this->db->table($this->table)->insert($data);
        return $this->db->insertID();
    }

    public function ubahData($id, $data)
    {
        $this->db->table($this->table)->where($this->primaryKey, $id)->update($data);
    }

    public function uploadFile($fieldName, $destination)
    {
        $file = $this->request->getFile($fieldName);

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move($destination, $newName);
            return $newName;
        }

        return null;
    }

    public function getBerkasById($id)
    {
        return $this->db->table($this->table)
            ->select('tb_berkas.*, tb_unit.simbol_unit as simbol_unit')
            ->join('tb_unit', 'tb_unit.id=tb_berkas.id_unit', 'left')
            ->where('tb_berkas.id', $id)
            ->get()->getRowArray();
    }
}
