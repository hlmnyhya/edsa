<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Anggota;
use App\Models\Jenis;
use App\Models\Shift;
use App\Models\Mutasi;
use App\Models\UserModel;

class MutasiController extends BaseController
{
    protected $anggota;
    protected $jenis;
    protected $shift;
    protected $mutasi;
    protected $userModel;

    public function __construct()
    {
        $this->anggota = new Anggota();
        $this->jenis = new Jenis();
        $this->shift = new Shift();
        $this->mutasi = new Mutasi();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'tampilData' => $this->mutasi->tampilData(),
            'title_meta' => view('partials/title-meta', ['title' => 'Mutasi']),
            'page_title' => view('partials/page-title', ['title' => 'Mutasi', 'pagetitle' => 'Data Mutasi'])
        ];

        return view('mutasi/mutasi', $data);
    }


    public function create()
    {
		$anggotaNotInMutasi = $this->anggota->getAnggotaNotInMutasi();
        $data = [
            'anggota' => $anggotaNotInMutasi,
            'tampilData' => $this->mutasi->tampilData(),
            'jenis' => $this->jenis->tampilData(),
            'shift' => $this->shift->tampilData(),
            'title_meta' => view('partials/title-meta', ['title' => 'Tambah Data Mutasi']),
            'page_title' => view('partials/page-title', ['title' => 'Mutasi', 'pagetitle' => 'Tambah Data Mutasi'])
        ];

        return view('mutasi/tambah_mutasi', $data);
    }

    public function save()
    {
    
		$id = $this->request->getVar('id_shift');
		$jam_input = $this->request->getVar('jam');
		$tanggal_input = $this->request->getVar('tanggal');

		$shiftData = $this->shift->getShiftById($id);
		$jam_piket = $shiftData['jam_piket'];
		$jam_keluar = $shiftData['jam_keluar'];
		$formatted_date = date('Y-m-d', strtotime($tanggal_input));
		
		if ($jam_piket <= $jam_keluar) {
			// For normal shifts without crossing midnight
			if ($jam_input >= $jam_piket && $jam_input <= $jam_keluar) {
				// Time is within the shift's working hours, proceed to save the mutation
				$data = [
					'id_anggota' => $this->request->getVar('id_anggota'),
					'id_jenis' => $this->request->getVar('id_jenis'),
					'id_shift' => $this->request->getVar('id_shift'),
					'tanggal' => $formatted_date,
					'jam' => $this->request->getVar('jam'),
					'mutasi' => $this->request->getVar('mutasi'),
					'ket_mutasi' => $this->request->getVar('ket_mutasi'),
					'barang_buku' => $this->request->getVar('barang_buku'),
					'jumlah_buku' => $this->request->getVar('jumlah_buku'),
					'barang_senpiss' => $this->request->getVar('barang_senpiss'),
					'jumlah_senpiss' => $this->request->getVar('jumlah_senpiss'),
					'barang_senpirm' => $this->request->getVar('barang_senpirm'),
					'jumlah_senpirm' => $this->request->getVar('jumlah_senpirm'),
					'barang_senpirev' => $this->request->getVar('barang_senpirev'),
					'jumlah_senpirev' => $this->request->getVar('jumlah_senpirev'),
					'kejadian_kejahatan' => $this->request->getVar('kejadian_kejahatan'),
					'jumlah_kejahatan' => $this->request->getVar('jumlah_kejahatan'),
					'kejadian_pelanggaran' => $this->request->getVar('kejadian_pelanggaran'),
					'jumlah_pelanggaran' => $this->request->getVar('jumlah_pelanggaran'),
					'kejadian_lain' => $this->request->getVar('kejadian_lain'),
					'jumlah_lain' => $this->request->getVar('jumlah_lain'),
					'tahanan_laki' => $this->request->getVar('tahanan_laki'),
					'jumlah_tahananlaki' => $this->request->getVar('jumlah_tahananlaki'),
					'tahanan_perempuan' => $this->request->getVar('tahanan_perempuan'),
					'jumlah_tahananper' => $this->request->getVar('jumlah_tahananper'),
				];

				$this->mutasi->addMutasi($data);

				session()->setFlashdata('success', 'Data Mutasi Berhasil Ditambahkan');
			} else {
				// Time is not within the shift's working hours, show an error message
				session()->setFlashdata('error', 'Jam masuk tidak valid untuk shift yang dipilih.');
			}
		} else {
			// For shifts crossing midnight
			if ($jam_input >= $jam_piket || $jam_input <= $jam_keluar) {
				// Time is within the shift's working hours, proceed to save the mutation
				$data = [
					'id_anggota' => $this->request->getVar('id_anggota'),
					'id_jenis' => $this->request->getVar('id_jenis'),
					'id_shift' => $this->request->getVar('id_shift'),
					'tanggal' => $formatted_date,
					'jam' => $this->request->getVar('jam'),
					'mutasi' => $this->request->getVar('mutasi'),
					'ket_mutasi' => $this->request->getVar('ket_mutasi'),
					'barang_buku' => $this->request->getVar('barang_buku'),
					'jumlah_buku' => $this->request->getVar('jumlah_buku'),
					'barang_senpiss' => $this->request->getVar('barang_senpiss'),
					'jumlah_senpiss' => $this->request->getVar('jumlah_senpiss'),
					'barang_senpirm' => $this->request->getVar('barang_senpirm'),
					'jumlah_senpirm' => $this->request->getVar('jumlah_senpirm'),
					'barang_senpirev' => $this->request->getVar('barang_senpirev'),
					'jumlah_senpirev' => $this->request->getVar('jumlah_senpirev'),
					'kejadian_kejahatan' => $this->request->getVar('kejadian_kejahatan'),
					'jumlah_kejahatan' => $this->request->getVar('jumlah_kejahatan'),
					'kejadian_pelanggaran' => $this->request->getVar('kejadian_pelanggaran'),
					'jumlah_pelanggaran' => $this->request->getVar('jumlah_pelanggaran'),
					'kejadian_lain' => $this->request->getVar('kejadian_lain'),
					'jumlah_lain' => $this->request->getVar('jumlah_lain'),
					'tahanan_laki' => $this->request->getVar('tahanan_laki'),
					'jumlah_tahananlaki' => $this->request->getVar('jumlah_tahananlaki'),
					'tahanan_perempuan' => $this->request->getVar('tahanan_perempuan'),
					'jumlah_tahananper' => $this->request->getVar('jumlah_tahananper'),
				];
                    
				$this->mutasi->addMutasi($data);

				session()->setFlashdata('success', 'Data Mutasi Berhasil Ditambahkan');
			} else {
				// Time is not within the shift's working hours, show an error message
				session()->setFlashdata('error', 'Jam masuk tidak valid untuk shift yang dipilih.');
			}
		}

		return redirect()->to('/mutasi');
        return redirect()->to('/mutasi');
    }

    public function edit($id)
    {
        $data = [
            'mutasi' => $this->mutasi->getMutasiById($id),
            'anggota' => $this->anggota->tampilData(),
            'jenis' => $this->jenis->tampilData(),
            'shift' => $this->shift->tampilData(),
            'title_meta' => view('partials/title-meta', ['title' => 'Ubah Data Mutasi']),
            'page_title' => view('partials/page-title', ['title' => 'Mutasi', 'pagetitle' => 'Ubah Data Mutasi'])
        ];

        return view('mutasi/ubah_mutasi', $data);
    }

    public function update($id)
    {
        $data = [
            'id_anggota' => $this->request->getVar('id_anggota'),
            'id_jenis' => $this->request->getVar('id_jenis'),
            'id_shift' => $this->request->getVar('id_shift'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'mutasi' => $this->request->getVar('mutasi'),
            'ket_mutasi' => $this->request->getVar('ket_mutasi'),
            'barang_buku' => $this->request->getVar('barang_buku'),
            'jumlah_buku' => $this->request->getVar('jumlah_buku'),
            'barang_senpiss' => $this->request->getVar('barang_senpiss'),
            'jumlah_senpiss' => $this->request->getVar('jumlah_senpiss'),
            'barang_senpirm' => $this->request->getVar('barang_senpirm'),
            'jumlah_senpirm' => $this->request->getVar('jumlah_senpirm'),
            'barang_senpirev' => $this->request->getVar('barang_senpirev'),
            'jumlah_senpirev' => $this->request->getVar('jumlah_senpirev'),
            'kejadian_kejahatan' => $this->request->getVar('kejadian_kejahatan'),
            'jumlah_kejahatan' => $this->request->getVar('jumlah_kejahatan'),
            'kejadian_pelanggaran' => $this->request->getVar('kejadian_pelanggaran'),
            'jumlah_pelanggaran' => $this->request->getVar('jumlah_pelanggaran'),
            'kejadian_lain' => $this->request->getVar('kejadian_lain'),
            'jumlah_lain' => $this->request->getVar('jumlah_lain'),
            'tahanan_laki' => $this->request->getVar('tahanan_laki'),
            'jumlah_tahananlaki' => $this->request->getVar('jumlah_tahananlaki'),
            'tahanan_perempuan' => $this->request->getVar('tahanan_perempuan'),
            'jumlah_tahananper' => $this->request->getVar('jumlah_tahananper'),
        ];

        $this->mutasi->updateMutasi($id, $data);

        session()->setFlashdata('success', 'Data Mutasi Berhasil Diubah');

        return redirect()->to('/mutasi');
    }

    public function delete($id)
    {
        $this->mutasi->deleteMutasi($id);

        session()->setFlashdata('success', 'Data Mutasi Berhasil Dihapus');

        return redirect()->to('/mutasi');
    }
	public function detail($id)
    {
        $data = [
            'mutasi' => $this->mutasi->getMutasiById($id),
            'title_meta' => view('partials/title-meta', ['title' => 'Detail Mutasi']),
            'page_title' => view('partials/page-title', ['title' => 'Mutasi', 'pagetitle' => 'Detail Mutasi Kegiatan'])
        ];

        return view('mutasi/detail', $data);
    }
}
