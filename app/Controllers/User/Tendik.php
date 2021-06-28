<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Models\Tendik_M;
use App\Models\Jadwal_M;

class Tendik extends BaseController
{
	protected $tendikModel; //OOP
    public function __construct()
    {
		$this->jadwalModel = new Jadwal_M();
        $this->tendikModel = new Tendik_M();
        helper('form');
    }

	public function index()
	{
		$data = [
            'title' 		=> 'Masuk Sebagai Tenaga Pendidikan Sekolah Vokasi IPB',
            'validation'    => \Config\Services::validation()

        ];
		return view('User/Login/tendik', $data);
	}

	public function masuk() 
   	{
		
		if(!$this->validate([
			'email_tendik' =>[
				'field' => 'email',
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Alamat surel kosong',
					'valid_email' => 'Alamat surel kurang lengkap'
				]
			],
			'pw_survei' =>[
				'rules' => 'required',
				'errors' => [
					'required' => 'Kata sandi survei kosong'
				]
			]
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to(base_url('/tendik'))->withInput()->with('validation', $validation);
		}

		$id_kat = $this->jadwalModel->JadwalAktif()->id_jadwal;

		$password = $this->request->getPost('pw_survei');

		$email = $this->request->getPost('email_tendik');
		$jadwal = $id_kat;
		$periksa = $this->tendikModel->get_dataMhsw($email, $jadwal);

		$cek = $this->tendikModel->get_data($password);

		if ($password = $cek)
		{
			if (($email = $periksa) && ($jadwal = $periksa)) {
				session()->setFlashdata('gagal', 'Alamat surel anda sudah digunakan');
				return redirect()->to(base_url('/tendik'));
			}else {
				session()->set('pw_survei', $cek);
			$data = [
				'email'    => $this->request->getVar('email_tendik'),
				'id_jadwal' => $id_kat
			];
			$this->tendikModel->masukTendik($data);
			return redirect()->to(base_url('/tendik_s'));
			}
			
		} else {
			session()->setFlashdata('gagal', 'Kata sandi survei salah');
			return redirect()->to(base_url('/tendik'));
		}
		
  	}
}
