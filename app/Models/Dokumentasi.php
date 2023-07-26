<?php

namespace App\Models;

use CodeIgniter\Model;

class Dokumentasi extends Model
{
    protected $table = 'tb_dokumentasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'jenis', 'tgl', 'ket', 'id_unit'];

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function tampilData()
    {
        return $this->db->table('tb_dokumentasi')
            ->select('tb_dokumentasi.*, tb_unit.simbol_unit as simbol_unit')
            ->join('tb_unit', 'tb_unit.id=tb_dokumentasi.id_unit', 'left')
            ->get()->getResultArray();
    }

    public function getDokumentasiById($id)
    {
        return $this->db->table('tb_dokumentasi')
            ->select('tb_dokumentasi.*, tb_unit.simbol_unit as simbol_unit')
            ->join('tb_unit', 'tb_unit.id=tb_dokumentasi.id_unit', 'left')
            ->where('tb_dokumentasi.id', $id)
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

    public function uploadFiles($fieldName, $destination)
    {
        $files = $this->request->getFiles($fieldName);

        $fileNames = [];
        foreach ($files as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move($destination, $newName);
                $fileNames[] = $newName;
            }
        }

        return $fileNames;
    }
  
    public function getByJudul($judul)
    {
        return $this->db->table($this->table)
            ->where('judul', $judul)
            ->get()->getResultArray();
    }
}
