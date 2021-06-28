<?php

namespace App\Controllers\SAdmin;
use App\Controllers\BaseController;
use App\Models\AdminUnit_M;


class DataAdmin3 extends BaseController
{
     //Data admin pelayanan
    protected $da3Model; //OOP
    public function __construct()
    {
        helper('form');
        $this->da3Model = new AdminUnit_M();
        $this->auth = new \IonAuth\Libraries\IonAuth();
        $this->user = $this->auth->user()->row();
        $this->group_name = $this->auth->getUsersGroups()->getRow()->name;
        $this->group_id = $this->auth->getNameGroup('unit3')->id;
    }
    public function index()
    {
        $data = [
            'title'      => 'Data Admin Unit Pelayanan',
            'user'       => $this->user,
            'group_name' => $this->group_name,
            'admin'      => $this->da3Model->getAdmin3()
        ];
       
        
        return view('SAdmin/adminUnit/dataAdmin3', $data);

    }
	
    public function save()
    {
        //tambah akun unit pelayanan
        //username unique
        $username = $this->request->getpost('username');
        $password = $this->request->getPost('password');
        $email    = $this->request->getPost('email');
        $additional_data = array (
            'nama'   => $this->request->getPost('nama'),
            'active' => 1,
        );
        if(!$this->auth->usernameCheck($username))
        {
            $group = array($this->group_id);
            $last_id = $this->auth->register($username, $password, $email, $additional_data, $group);
            if($last_id){
                echo ("<script>window.alert('Berhasil di Input'); history.go(-1); </script>");
            }
        } else {
            echo "Akun sudah ada";
        }
        session()->setFlashData('sukses','Admin berhasil ditambahkan');
        return redirect()->to(base_url('SAdmin/dataAdmin3'));
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
            session()->setFlashData('sukses','Data Admin berhasil diubah');
            return redirect()->to(base_url('SAdmin/dataAdmin3'));
                
        }
    }

    public function delete($id){
        $data = array(
            'id'    => $id
        );

        $this->da3Model->deleteAdmin3($data);
        session()->setFlashData('hapus','Admin berhasil dihapus');
        return redirect()->to(base_url('SAdmin/dataAdmin3'));
    }

}
