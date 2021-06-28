<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Models\Tendik_M;

class Tendik_s extends BaseController
{
	protected $tendikModel; //OOP
    public function __construct()
    {
        $this->tendikModel = new Tendik_M();
        helper('form');
    }

	public function index()
	{

        if (session()->get('pw_survei') == ''){
            session()->setFlashdata('gagal', 'Cek kembali data anda');
            return redirect()->to(base_url('/tendik'));
        } 
            
        $data = [
            'title'      => 'Survei Kepuasan Sekolah Vokasi IPB',
            'jadwal'     => $this->tendikModel->getJadwal(),
            'pertanyaan' => $this->tendikModel->getPertanyaan()
        ];

        // dd($this->dosenModel->getPertanyaan());

        return view('User/tendik_s', $data);
	}

    public function simpanSurvei()
    {

        // $opsi = $this->request->getPost('opsi',TRUE);

        $params          = $this->request->getPost();
        $this->tendikModel->saveSurvei($params);
        // dd($params);

        session()->destroy();
        return redirect()->to(base_url('/end_survei'));
    }
}
