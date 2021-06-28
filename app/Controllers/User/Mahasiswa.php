<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Models\Mahasiswa_M;
use App\Models\Jadwal_M;

class Mahasiswa extends BaseController
{
	protected $mahasiswaModel; //OOP
    public function __construct()
    {
		$this->jadwalModel = new Jadwal_M();
        $this->mahasiswaModel = new Mahasiswa_M();
        helper('form');
    }

	public function index()
	{
		$data = [
			'title' => 'Masuk Sebagai Mahasiswa Sekolah Vokasi IPB',
			'validation'    => \Config\Services::validation(),
			'prodi'			=> $this->mahasiswaModel->getProdi(),
			'jadwal'		=>$this->mahasiswaModel->getJadwal()
		]; 
		
		return view('User/Login/mahasiswa', $data);
	}

	public function masuk()
	{
		if(!$this->validate([
			'email' =>[
				'field' => 'email',
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Alamat surel kosong',
					'valid_email' => 'Alamat surel kurang lengkap'
				]
			],
			'prodi_mhsw' =>[
				'rules' => 'required',
				'errors' => [
					'required' => 'Program studi kosong'
				]
			]
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to(base_url('/mahasiswa'))->withInput()->with('validation', $validation);
		}

		$id_kat = $this->jadwalModel->JadwalAktif()->id_jadwal;

		$prodi_mhsw = $this->request->getPost('prodi_mhsw');
		$email = $this->request->getPost('email');
		$jadwal = $id_kat;
		$periksa = $this->mahasiswaModel->get_dataMhsw($email, $jadwal);

		$cek = $this->mahasiswaModel->get_data($prodi_mhsw);

		if (($email = $periksa) && ($jadwal = $periksa))
		{
			session()->setFlashdata('gagal', 'Alamat surel anda sudah digunakan');
			return redirect()->to(base_url('/mahasiswa'));
		} else {
			session()->set('prodi_mhsw', $cek);
			$data = [
				'email'    => $this->request->getVar('email'),
				'prodi'    => $this->request->getVar('prodi_mhsw'),
				'id_jadwal' => $id_kat,
				'role_user' => 2
			];
			$this->mahasiswaModel->masukMhsw($data);
			return redirect()->to(base_url('/mahasiswa_s'));
		}
	}
}
