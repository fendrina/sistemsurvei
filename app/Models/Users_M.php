<?php

namespace App\Models;

use CodeIgniter\Model;

class Users_M extends Model
{
    //join table groups, users dan users_groups

    public function getAdmin()
    {
        return $this->db->table('users_groups')->join('groups','groups.id=users_groups.group_id')
        ->join('users','users.id=users_groups.user_id')
        ->get()->getResultArray();
    }

    public function editAdmin($data){
        $this->db->table('users')->where('id', $data['id'])
        ->update($data);
    }

    public function getGroup(){
        return $this->db->table('groups')->get()->getResultArray();
    }
}