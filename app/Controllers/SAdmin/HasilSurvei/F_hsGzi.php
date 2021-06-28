<?php

namespace App\Controllers\SAdmin\HasilSurvei;
use App\Controllers\BaseController;
use App\Models\HasilSurvei_M;

class F_hsGzi extends BaseController
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
            'title'      => 'Hasil Survei GZI',
            'user'       => $auth->user()->row(),
            'group_name' => $auth->getUsersGroups()->getRow()->name,
            'hsl_survei' => $this->hasilSurveiModel->getGZI(),
            'thn_ajaran' => $this->hasilSurveiModel->getThnAjaranF()
        ];

        return view('SAdmin/hasilSurvei/fHasilSurveiGzi', $data);
    }

}
