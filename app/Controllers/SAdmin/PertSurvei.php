<?php

namespace App\Controllers\SAdmin;
use App\Controllers\BaseController;
use App\Models\Pert_M;


class PertSurvei extends BaseController
{
    protected $pertModel;
    public function __construct()
    {
        $this->pertModel = new Pert_M();
        helper('form');
    }

    public function index()
    {
        $auth = new \IonAuth\Libraries\IonAuth;
        $data = [
            'title'      => 'Pertanyaan Survei',
            'user'       => $auth->user()->row(),
            'group_name' => $auth->getUsersGroups()->getRow()->name,
            'pertanyaan' => $this->pertModel->getPertanyaan(),
            'unit'       => $this->pertModel->getUnit(),
            'kategori'   => $this->pertModel->getKategori(),
            'validation' => \Config\Services::validation()
        ];
        // dd($this->pertModel->getPertanyaan());
        // die;
        return view('SAdmin/pertSurvei', $data);
    }

    public function save()
    {
        
        $data = array(
            'pertanyaan'    => $this->request->getVar('pertanyaan'),
            'id_unit'       => $this->request->getVar('id_unit'),
            'pengguna'      => implode(", ", ($this->request->getVar('pengguna'))),
            'id_kat'        => $this->request->getVar('id_kat')
        );

        $this->pertModel->savePertanyaan($data);
        session()->setFlashData('sukses','Pertanyaan berhasil ditambahkan');
        return redirect()->to(base_url('SAdmin/pertSurvei'));
    }	

    public function edit($id_pert)
    {
        $data = array(
            'id_pert'       => $id_pert,
            'pertanyaan'    => $this->request->getVar('pertanyaan'),
            'id_unit'       => $this->request->getVar('id_unit'),
            'pengguna'      => implode(", ", ($this->request->getVar('pengguna'))),
            'id_kat'        => $this->request->getVar('id_kat')
        );
        $this->pertModel->editPertanyaan($data);
        return redirect()->to(base_url('SAdmin/pertSurvei'));
    }

    public function delete($id_pert){
        $data = array(
            'id_pert'    => $id_pert
        );

        $this->pertModel->deletePertanyaan($data);
        session()->setFlashData('hapus','Pertanyaan berhasil dihapus');
        return redirect()->to(base_url('SAdmin/pertSurvei'));
    }
		
}
