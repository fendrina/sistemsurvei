<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Models\Mahasiswa_M;

class Mahasiswa_s extends BaseController
{
	protected $mahasiswaModel; //OOP
    public function __construct()
    {
        $this->mahasiswaModel = new Mahasiswa_M();
        helper('form');
    }

	public function index()
	{
        if (session()->get('prodi_mhsw') == ''){
            session()->setFlashdata('gagal', 'Cek kembali data anda');
            return redirect()->to(base_url('/mahasiswa'));
        } 

		$data = [
            'title'     => 'Survei Kepuasan Sekolah Vokasi IPB',
            'jadwal'     => $this->mahasiswaModel->getJadwal(),
            'pertanyaan' => $this->mahasiswaModel->getPertanyaan()
        ];

		return view('User/mahasiswa_s', $data);
	}

    public function simpanSurvei()
    {

        // $opsi = $this->request->getPost('opsi',TRUE);

        $params          = $this->request->getPost();
        $this->mahasiswaModel->saveSurvei($params);
        
        session()->destroy();
        return redirect()->to(base_url('/end_survei'));
    }
}
