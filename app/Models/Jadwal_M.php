<?php

namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class Jadwal_M extends Model
{
    public function getJadwal()
    {
        return $this->db->table('jadwal')
        ->join('kategori','kategori.id_kate=jadwal.id_kat')
        ->get()->getResultArray();
    }

    public function getKategori()
    {
        return $this->db->table('kategori')
        ->notLike('nama_kat','General')
        ->get()->getResultArray();
    }

    public function getSemester()
    {
        return $this->db->table('semester')
        ->get()->getResultArray();
    }
    
    public function saveJadwal($data){
        return $this->db->table('jadwal')->insert($data);
    }

    public function editJadwal($data){
        return $this->db->table('jadwal')
        ->where('id_jadwal', $data['id_jadwal'])
        ->update($data);
    }

    public function deleteJadwal($data){
        return $this->db->table('jadwal')
        ->where('id_jadwal', $data['id_jadwal'])
        ->delete($data);
    }

    public function get_data($tgl_mulai, $tgl_akhir)
	{
      return $this->db->table('jadwal')
      ->where(array('tgl_mulai' => $tgl_mulai, 'tgl_akhir' => $tgl_akhir))
      ->get()->getRowArray();
	}

    public function JadwalAktif()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $query = $this->db->table('jadwal')->where('tgl_mulai <=', $tgl_skrg)->where('tgl_akhir >=', $tgl_skrg)->get()->getFirstRow();

        return $query;
    }

    public function JadwalOff(){
        $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
        return $row;
    }
}