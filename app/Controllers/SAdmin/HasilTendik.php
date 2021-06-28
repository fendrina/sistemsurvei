<?php

namespace App\Controllers\SAdmin;
use App\Controllers\BaseController;
use App\Models\HasilSurvei_M;



class HasilTendik extends BaseController
{
	protected $hasilSurveiModel; //OOP
    public function __construct()
    {
        $this->hasilSurveiModel = new HasilSurvei_M();
        
        helper('form');
        // $this->db = db_connect();
    }
	public function index()
    {
        $auth = new \IonAuth\Libraries\IonAuth;


        $data = [
            'title'      => 'Hasil Survei Tenaga Pendidikan',
            'user'       => $auth->user()->row(),
            'group_name' => $auth->getUsersGroups()->getRow()->name,
            'hsl_survei' => $this->hasilSurveiModel->getHasilTendik(),
            'thn_ajaran' => $this->hasilSurveiModel->getThnAjaranF()
        ];

        return view('SAdmin/hasilSurveiTendik', $data);
    }

}
