<?php

namespace App\Models;

use CodeIgniter\Model;

class Pert_M extends Model
{

    public function getPertanyaan()
    {
        $result = $this->db->table('pertanyaan')
        ->join('unit','unit.id=pertanyaan.id_unit', 'left')
        ->join('kategori','kategori.id_kate=pertanyaan.id_kat')
        ->orderBy('id_unit')
        ->get()->getResultArray();
        if ($result){
        foreach ($result as $key => $value):
        $result[$key]['pengguna_array'] = explode(", ", $result[$key]['pengguna']);
        endforeach;
        }
        return $result;
    }

    public function getKategori()
    {
        return $this->db->table('kategori')->get()->getResultArray();
    }

    public function getUnit()
    {
        return $this->db->table('unit')
        ->get()->getResultArray();
    }

    //detail pertanyaan umum (luring dan daring)
    public function detailPertanyaan($id_pert)
    {
        return $this->db->table('pertanyaan')
        ->join('unit','unit.id=pertanyaan.id_unit', 'left')
        ->join('kategori','kategori.id_kate=pertanyaan.id_kat')
        ->where('id_pert', $id_pert)
        ->get()->getRowArray();
    }

    //menyimpan pertanyaan umum
    public function savePertanyaan($data){
        $this->db->table('pertanyaan')->insert($data);
    }

    //update pertanyaan umum
    public function editPertanyaan($data){
        return $this->db->table('pertanyaan')
        ->where('id_pert', $data['id_pert'])
        ->update($data);
    }

    //delete pertanyaan umum
    public function deletePertanyaan($data){
        return $this->db->table('pertanyaan')
        ->where('id_pert', $data['id_pert'])
        ->delete($data);
    }

    // end pertanyaan umum //
    public function getDTM(){
        return $this->db->table('pertanyaan')->select('pengguna')->get()->getResultArray();
        
    }
}