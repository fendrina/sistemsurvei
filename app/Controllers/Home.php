<?php

namespace App\Controllers;
use App\Models\Jadwal_M;
use App\Models\Dosen_M;

class Home extends BaseController
{
	protected $jadwalSurveiModel; //OOP
    public function __construct()
    {
        $this->jadwalModel = new Jadwal_M();
		$this->jadwalSurveiModel = new Dosen_M();
        helper('form');
    }
	
	public function index()
	{
		$id_kat = $this->jadwalModel->JadwalAktif('id_jadwal');

		if ($id_kat == NULL)
		{
			$data = [
				'title'  => 'Survei Kepuasan Sekolah Vokasi IPB'
			];
			return view('User/login_Gagal', $data);
		} else {
			$data = [
				'title'  => 'Survei Kepuasan Sekolah Vokasi IPB'
			];
			return view('User/login_user', $data);
		}

		
	}
}
