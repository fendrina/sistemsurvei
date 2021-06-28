<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminUnit_M extends Model
{
    //memanggil admin unit akademik
    public function getAdmin()
    {
        return $this->db->table('users_groups')->join('groups','groups.id=users_groups.group_id')
        ->join('users','users.id=users_groups.user_id')
        ->where('name','unit1')
        ->get()->getResultArray();
    }

    public function editAdmin1($data){
        $this->db->table('users')->where('id', $data['id'])
        ->update($data);
    }

    public function deleteAdmin1($data){
        return $this->db->table('users')
        ->where('id', $data['id'])
        ->delete($data);
    }
    
    //memanggil admin unit sarana dan prasarana
    public function getAdmin2()
    {
        return $this->db->table('users_groups')->join('groups','groups.id=users_groups.group_id')
        ->join('users','users.id=users_groups.user_id')
        ->where('name','unit2')
        ->get()->getResultArray();
    }

    public function editAdmin2($data){
        $this->db->table('users')->where('id', $data['id'])
        ->update($data);
    }

    public function deleteAdmin2($data){
        return $this->db->table('users')
        ->where('id', $data['id'])
        ->delete($data);
    }

    //memanggil admin unit pelayanan
    public function getAdmin3()
    {
        return $this->db->table('users_groups')->join('groups','groups.id=users_groups.group_id')
        ->join('users','users.id=users_groups.user_id')
        ->where('name','unit3')
        ->get()->getResultArray();
    }

    public function editAdmin3($data){
        $this->db->table('users')->where('id', $data['id'])
        ->update($data);
    }

    public function deleteAdmin3($data){
        return $this->db->table('users')
        ->where('id', $data['id'])
        ->delete($data);
    }

    //memanggil admin unit laboratorium
    public function getAdmin4()
    {
        return $this->db->table('users_groups')->join('groups','groups.id=users_groups.group_id')
        ->join('users','users.id=users_groups.user_id')
        ->where('name','unit4')
        ->get()->getResultArray();
    }

    public function editAdmin4($data){
        $this->db->table('users')->where('id', $data['id'])
        ->update($data);
    }

    public function deleteAdmin4($data){
        return $this->db->table('users')
        ->where('id', $data['id'])
        ->delete($data);
    }

    //memanggil admin unit perpustakaan
    public function getAdmin5()
    {
        return $this->db->table('users_groups')->join('groups','groups.id=users_groups.group_id')
        ->join('users','users.id=users_groups.user_id')
        ->where('name','unit5')
        ->get()->getResultArray();
    }

    public function editAdmin5($data){
        $this->db->table('users')->where('id', $data['id'])
        ->update($data);
    }

    public function deleteAdmin5($data){
        return $this->db->table('users')
        ->where('id', $data['id'])
        ->delete($data);
    }
      
}