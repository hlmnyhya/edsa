<?php

namespace App\Models;

use CodeIgniter\Model;

class Mutasi extends Model
{
    protected $table = 'tb_mutasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_anggota', 'id_jenis', 'id_shift', 'tanggal', 'jam', 'mutasi', 'ket_mutasi', 'barang_buku', 'jumlah_buku', 'barang_senpiss', 'jumlah_senpiss', 'barang_senpirm', 'jumlah_senpirm', 'barang_senpirev', 'jumlah_senpirev', 'kejadian_kejahatan', 'jumlah_kejahatan', 'kejadian_pelanggaran', 'jumlah_pelanggaran', 'kejadian_lain', 'jumlah_lain', 'tahanan_laki', 'jumlah_tahananlaki', 'tahanan_perempuan', 'jumlah_tahananper'];

public function tampilData()
{
    return $this->db->table('tb_mutasi')
        ->select('tb_mutasi.*, tb_anggota.nm_anggota as nm_anggota')
        ->select('tb_mutasi.*, tb_jenis_mutasi.jenis_mutasi as jenis_mutasi')
        ->select('tb_mutasi.*, tb_shift.ket_jaga as ket_jaga')
        ->join('tb_anggota', 'tb_anggota.id=tb_mutasi.id_anggota', 'left')
        ->join('tb_jenis_mutasi', 'tb_jenis_mutasi.id=tb_mutasi.id_jenis', 'left')
        ->join('tb_shift', 'tb_shift.id=tb_mutasi.id_shift', 'left')
        ->join('tb_regu', 'tb_regu.id_anggota=tb_mutasi.id_anggota', 'left')
        ->get()->getResultArray();
}

    // Model Mutasi
public function checkExistingData($id_anggota, $id_jenis, $id_shift)
{
    return $this->db->table('tb_mutasi') // Ganti "nama_tabel" dengan nama tabel yang sesuai
        ->where('id_anggota', $id_anggota)
        ->where('id_jenis', $id_jenis)
        ->where('id_shift', $id_shift)
        ->countAllResults() > 0;
}


public function getMutasiById($id)
{
    $loggedInUserId = session()->get('id'); // Assuming the user ID is stored in the session with the key 'id'

    return $this->db->table('tb_mutasi')
        ->select('tb_mutasi.*, tb_anggota.nm_anggota as nm_anggota')
        ->select('tb_mutasi.*, tb_jenis_mutasi.jenis_mutasi as jenis_mutasi')
        ->select('tb_mutasi.*, tb_shift.ket_jaga as ket_jaga')
        ->join('tb_anggota', 'tb_anggota.id=tb_mutasi.id_anggota', 'left')
        ->join('tb_jenis_mutasi', 'tb_jenis_mutasi.id=tb_mutasi.id_jenis', 'left')
        ->join('tb_shift', 'tb_shift.id=tb_mutasi.id_shift', 'left')
        ->where('tb_mutasi.id_anggota', $loggedInUserId) // Add the condition to fetch data for the logged-in user's ID
        ->get()
        ->getRowArray();
}

    public function addMutasi($data)
    {
        return $this->db->table('tb_mutasi')->insert($data);
    }

    public function editMutasi($id, $data)
    {
        return $this->db->table('tb_mutasi')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteMutasi($id)
    {
        return $this->db->table('tb_mutasi')
            ->where('id', $id)
            ->delete();
    }
    
    public function updateMutasi($id, $data)
    {
        return $this->db->table('tb_mutasi')
            ->where('id', $id)
            ->update($data);
    }
}
