<?php

namespace App\Models;

use CodeIgniter\Model;

class Regu extends Model
{
    protected $table = 'tb_regu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nm_regu', 'id_anggota', 'id_shift', 'tgl'];

    public function __construct()
    {
        $this->db = db_connect();
    }

public function tampilData()
{
   $query = "SELECT
    MAX(tb_regu.id) as id,
    tb_regu.nm_regu,
    tb_anggota.nm_anggota as nm_anggota,
    tb_shift.ket_jaga as ket_jaga,
    tb_regu.tgl
FROM
    tb_regu
LEFT JOIN
    tb_anggota ON tb_anggota.id = tb_regu.id_anggota
LEFT JOIN
    tb_shift ON tb_shift.id = tb_regu.id_shift
GROUP BY
    tb_regu.nm_regu, tb_anggota.nm_anggota, tb_shift.ket_jaga, tb_regu.tgl
ORDER BY
    CASE WHEN tb_regu.nm_regu = 'Regu 1' THEN 1 ELSE 2 END
LIMIT 0, 25";
    return $this->db->query($query)->getResultArray();
}



    public function getUserById($id)
    {
        return $this->db->table('tb_regu')
            ->select('tb_regu.*, tb_anggota.nm_anggota as nm_anggota')
            ->select('tb_regu.*, tb_shift.ket_jaga as ket_jaga')
            ->join('tb_anggota', 'tb_anggota.id=tb_regu.id_anggota', 'left')
            ->join('tb_shift', 'tb_shift.id=tb_regu.id_shift', 'left')
            ->where('tb_regu.id', $id)
            ->get()->getRowArray();
    }

	// public function saveRegu($data)
	// {
	// 	$data['id_anggota'] = implode(',', $data['id_anggota']);
	// 	$this->db->table($this->table)->insert($data);
	// 	return $this->db->insertID();
	// }
	public function saveRegu($data)
	{
		// Insert data into the 'tb_regu' table
		$this->insert($data);

		// Return the last inserted ID if needed
		return $this->getInsertID();
	}
    public function updateRegu($id, $data)
    {
        $this->db->table($this->table)->update($data, ['id' => $id]);
        return $this->db->affectedRows();
    }
    public function getReguByNmRegu($nm_regu)
    {
        return $this->db->table('tb_regu')
            ->select('tb_regu.*, tb_anggota.nm_anggota as nm_anggota')
            ->select('tb_shift.ket_jaga as ket_jaga')
            ->join('tb_anggota', 'FIND_IN_SET(tb_anggota.id, tb_regu.id_anggota)')
            ->join('tb_shift', 'tb_shift.id=tb_regu.id_shift', 'left')
            ->where('tb_regu.nm_regu', $nm_regu)
            ->get()->getResultArray();
    }
}
?>
