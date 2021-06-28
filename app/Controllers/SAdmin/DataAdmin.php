<?php

namespace App\Controllers\SAdmin;
use App\Controllers\BaseController;
use App\Models\Users_M;


class DataAdmin extends BaseController
{

    //Controller daftar admin (semua unit)
    protected $userModel; //OOP
    public function __construct()
    {
        $this->userModel = new Users_M();
        $this->auth = new \IonAuth\Libraries\IonAuth();
        $this->user = $this->auth->user()->row();
        $this->group_name = $this->auth->getUsersGroups()->getRow()->name;
        helper('form');
    }
    public function index()
    {
        

        $auth = new \IonAuth\Libraries\IonAuth;
        $data = [
            'title'      => 'Data Admin',
            'user'       => $auth->user()->row(),
            'group_name' => $auth->getUsersGroups()->getRow()->name,
            'admin'      => $this->userModel->getAdmin(),
            'unitadmin'  => $this->userModel->getGroup()
        ];
       
        
        return view('SAdmin/adminUnit/dataAdmin', $data);

    }

    public function edit($id)
    {
        $data = [
            'nama'=> $this->request->getVar('nama'),
            'username'=>$this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];
        $query = $this->auth->update($id,$data);
            
        if($query){
            session()->setFlashData('sukses','Data Super Admin berhasil diubah');
            return redirect()->to(base_url('SAdmin/dataAdmin'));
                
        }
    }
}
