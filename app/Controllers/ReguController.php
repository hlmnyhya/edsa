<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Anggota;
use App\Models\Shift;
use App\Models\Regu;
use CodeIgniter\Config\View;

class ReguController extends BaseController
{
    protected $anggota, $shift, $regu;

    public function __construct()
    {
        $this->anggota = new Anggota();
        $this->shift = new Shift();
        $this->regu = new Regu();
    }

    public function index()
    {
        $data = [
            'tampilData' => $this->regu->tampilData(),
            'title_meta' => view('partials/title-meta', ['title' => 'Regu']),
            'page_title' => view('partials/page-title', ['title' => 'Regu', 'pagetitle' => 'Data Regu'])
        ];

        echo view('regu/regu', $data);
    }
	

    public function create()
    {
        $data = [
            'anggota' => $this->anggota->tampilData(),
            'shift' => $this->shift->tampilData(),
            'title_meta' => view('partials/title-meta', ['title' => 'Tambah Data Regu']),
            'page_title' => view('partials/page-title', ['title' => 'Regu', 'pagetitle' => 'Tambah Data Regu'])
        ];
        return view('regu/tambah_regu', $data);
    }

	public function save()
	{
		$nm_regu = $this->request->getVar('nm_regu');
		$id_shift = $this->request->getVar('id_shift');
		$id_anggota = $this->request->getVar('id_anggota');
        $tgl = $this->request->getVar('tgl');

		// Loop through the selected id_anggota values and insert a new record for each member
		foreach ($id_anggota as $anggota_id) {
			$data = [
				'nm_regu' => $nm_regu,
				'id_shift' => $id_shift,
				'id_anggota' => $anggota_id,
                'tgl' => $tgl,
			];

			// Save the data for each member
			$insertedId = $this->regu->saveRegu($data);
		}

		session()->setFlashdata('success', 'Data Regu Berhasil Ditambahkan');

		return redirect()->to('/regu');
	}

// 	public function edit($id)
// {
//     // Load the model and other data as needed
//     $reguData = $this->regu->find($id);
//     $anggotaData = $this->anggota->tampilData(); // Replace 'anggota' with your actual model
//     $shiftData = $this->shift->tampilData(); // Replace 'shift' with your actual model

//     $selectedAnggota = []; // Store the selected id_anggota values
//     if (!empty($reguData)) {
//         $selectedAnggota = explode(',', $reguData['id_anggota']); // Convert comma-separated ids to an array
//     }

//     $data = [
//         'regu' => $reguData,
//         'anggota' => $anggotaData,
//         'shift' => $shiftData,
//         'selectedAnggota' => $selectedAnggota,
// 			'title_meta' => view('partials/title-meta', ['title' => 'Ubah Data Regu']),
// 			'page_title' => view('partials/page-title', ['title' => 'Regu', 'pagetitle' => 'Ubah Data Regu'])
//     ];
	
//     return view('edit_form_view', $data);
// }


    public function edit($id)
    {
        $data = [
            'regu' => $this->regu->getUserById($id),
            'anggota' => $this->anggota->tampilData(),
            'shift' => $this->shift->tampilData(),
            'title_meta' => view('partials/title-meta', ['title' => 'Ubah Data Regu']),
            'page_title' => view('partials/page-title', ['title' => 'Regu', 'pagetitle' => 'Ubah Data Regu'])
        ];
        return view('regu/ubah_regu', $data);
    }

    public function update($id)
    {
        $data = [
            'nm_regu' => $this->request->getVar('nm_regu'),
            'id_shift' => $this->request->getVar('id_shift'),
            'tgl' => $this->request->getVar('tgl'),
        ];

        // Dapatkan data anggota regu yang dipilih sebagai array
        $idAnggota = $this->request->getVar('id_anggota');

        // Ubah array anggota regu menjadi string terpisah dengan koma
        $data['id_anggota'] = implode(',', $idAnggota);

        $this->regu->update($id, $data);

        session()->setFlashdata('success', 'Data Regu Berhasil Diubah');

        return redirect()->to('/regu');
    }

    public function delete($id)
    {
        $this->regu->delete($id);

        session()->setFlashdata('success', 'Data Regu Berhasil Dihapus');
        return redirect()->back();
    }
    public function detail($nm_regu)
    {
        $data = [
            'regu' => $this->regu->getReguByNmRegu($nm_regu),
            'title_meta' => view('partials/title-meta', ['title' => 'Detail Regu']),
            'page_title' => view('partials/page-title', ['title' => 'Regu', 'pagetitle' => 'Detail Regu'])
        ];
    
        return view('regu/detail', $data);
    }    

}
?>
