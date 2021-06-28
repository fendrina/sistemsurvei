<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Models\Dosen_M;
use App\Models\Jadwal_M;

class Dosen extends BaseController
{
	protected $dosenModel; //OOP
    public function __construct()
    {
        $this->dosenModel = new Dosen_M();
		$this->jadwalModel = new Jadwal_M();
        helper('form');
    }
	public function index()
	{
		$data = [
            'title' 		=> 'Masuk Sebagai Dosen Sekolah Vokasi IPB',
            'validation'    => \Config\Services::validation(),
			'prodi'			=> $this->dosenModel->getProdi()

        ];
		
		return view('User/Login/dosen', $data);
	}

	public function masuk() 
   	{
		
		if(!$this->validate([
			'email_dosen' =>[
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
			],
			'prodi_dosen' =>[
				'rules' => 'required',
				'errors' => [
					'required' => 'Program studi kosong'
				]
			]
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to(base_url('/dosen'))->withInput()->with('validation', $validation);
		}

		$id_kat = $this->jadwalModel->JadwalAktif()->id_jadwal;
		$password = $this->request->getPost('pw_survei');
		$email = $this->request->getPost('email_dosen');
		$jadwal = $id_kat;
		$periksa = $this->dosenModel->get_dataMhsw($email, $jadwal);
		$cek = $this->dosenModel->get_data($password);

		if ($password = $cek)
		{
			if (($email = $periksa) && ($jadwal = $periksa)) {
				session()->setFlashdata('gagal', 'Alamat surel anda sudah digunakan');
				return redirect()->to(base_url('/dosen'));
			}else {
				session()->set('pw_survei', $cek);
				$data = [
					'email'    => $this->request->getVar('email_dosen'),
					'prodi'    => $this->request->getVar('prodi_dosen'),
					'id_jadwal' => $id_kat,
					'role_user' => 1
				];
				$this->dosenModel->masukDosen($data);
				return redirect()->to(base_url('/dosen_s'));
			}
			
		} else {
			session()->setFlashdata('gagal', 'Password survei salah');
			return redirect()->to(base_url('/dosen'));
		}

		
  	}
}
