<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Models\Dosen_M;

class Dosen_s extends BaseController
{
	protected $dosenModel; //OOP
    public function __construct()
    {
        $this->dosenModel = new Dosen_M();
        helper('form');
    }
    
	public function index()
	{
    
        if (session()->get('pw_survei') == ''){
            session()->setFlashdata('gagal', 'Cek kembali data anda');
            return redirect()->to(base_url('/dosen'));
        } 
            
        $data = [
            'title'      => 'Survei Kepuasan Sekolah Vokasi IPB',
            'jadwal'     => $this->dosenModel->getJadwal(),
            'pertanyaan' => $this->dosenModel->getPertanyaan()
        ];

        // dd($this->dosenModel->getPertanyaan());

        return view('User/dosen_s', $data);

	}

    public function simpanSurvei()
    {

        // $opsi = $this->request->getPost('opsi',TRUE);

        $params          = $this->request->getPost();
        $this->dosenModel->saveSurvei($params);
        // dd($params);

        session()->destroy();
        return redirect()->to(base_url('/end_survei'));
    }
}
