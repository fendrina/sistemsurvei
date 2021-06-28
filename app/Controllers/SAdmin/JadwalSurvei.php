<?php

namespace App\Controllers\SAdmin;
use App\Controllers\BaseController;
use App\Models\Jadwal_M;


class JadwalSurvei extends BaseController
{
    protected $jadwalSurveiModel; //OOP
    public function __construct()
    {
        $this->jadwalSurveiModel = new Jadwal_M();
        helper('form');
    }
    public function index()
    {
        $auth = new \IonAuth\Libraries\IonAuth;
        $data = [
            'title'      => 'Jadwal Survei',
            'user'       => $auth->user()->row(),
            'group_name' => $auth->getUsersGroups()->getRow()->name,
            'jadwal'     => $this->jadwalSurveiModel->getJadwal(),
            'kategori'   => $this->jadwalSurveiModel->getKategori(),
            'semester'   => $this->jadwalSurveiModel->getSemester()
        ];
    
        return view('SAdmin/jadwalSurvei', $data);
    }
		
    public function save()
    {
        $data = array(
            'semester'    => $this->request->getVar('semester'),
            'thn_ajaran' => $this->request->getVar('thn_ajaran'),
            'tgl_mulai'  => $this->request->getVar('tgl_mulai'),
            'tgl_akhir'  => $this->request->getVar('tgl_akhir'),
            'pw_survei'  => $this->request->getVar('pw_survei'),
            'id_kat'     => $this->request->getVar('id_kat')
        );

        $this->jadwalSurveiModel->saveJadwal($data);
        session()->setFlashData('sukses','Jadwal berhasil ditambahkan');
        return redirect()->to(base_url('SAdmin/jadwalSurvei'));
    }

    public function edit($id_jadwal)
    {
        $data = array(
            'id_jadwal'  => $id_jadwal,
            'semester'    => $this->request->getVar('semester'),
            'thn_ajaran' => $this->request->getVar('thn_ajaran'),
            'tgl_mulai'  => $this->request->getVar('tgl_mulai'),
            'tgl_akhir'  => $this->request->getVar('tgl_akhir'),
            'pw_survei'  => $this->request->getVar('pw_survei'),
            'id_kat'     => $this->request->getVar('id_kat')
        );

        $this->jadwalSurveiModel->editJadwal($data);
        return redirect()->to(base_url('SAdmin/jadwalSurvei'));
    }


    public function delete($id_jadwal){
        $data = array(
            'id_jadwal'    => $id_jadwal
        );

        $this->jadwalSurveiModel->deleteJadwal($data);
        session()->setFlashData('hapus','Jadwal berhasil dihapus');
        return redirect()->to(base_url('SAdmin/jadwalSurvei'));
    }
}
