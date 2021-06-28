<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class Dosen_M extends Model
{

    public function get_data($password)
	{
      return $this->db->table('jadwal')
      ->where(array('pw_survei' => $password))
      ->get()->getRowArray();
	}

    public function get_dataMhsw($email, $jadwal)
    {
        return $this->db->table('tb_dosenmhsw')
        ->where(array('email' => $email, 'id_jadwal' => $jadwal))
        ->get()->getRowArray();
    }
    public function getProdi()
    {
        return $this->db->table('prodi')->get()->getResultArray();
    }

    public function masukDosen($data)
    {
        $this->db->table('tb_dosenmhsw')->insert($data);
    }

    public function getDosenProdi()
    {
        $kode_prodi = $this->db->table('tb_dosenmhsw')->get()->getLastRow();
        return $kode_prodi;
    }
    public function getJadwal()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $JadwalAktif = $this->db->table('jadwal')
        ->where('tgl_mulai <=', $tgl_skrg)
        ->where('tgl_akhir >=', $tgl_skrg)
        ->get()->getFirstRow();
        
        return $JadwalAktif;
    }

    //join table pertanyaan dan unit 
    public function getPertanyaan()
    {

        $id_kat = $this->getJadwal()->id_kat;
        $luringDaring = $this->db->table('kategori')->where('nama_kat','General')->get()->getResultArray();
        
        $categories = [$id_kat];
        
        if($luringDaring)
        {
            foreach($luringDaring as $luda)
            {
                $categories[] = $luda['id_kate'];
            }
        }
        
        $query = $this->db->table('pertanyaan')
        ->join('unit','unit.id=pertanyaan.id_unit', 'left')
        ->join('kategori','kategori.id_kate=pertanyaan.id_kat', 'left')
        ->join('jadwal','jadwal.id_kat=kategori.id_kate', 'left')
        ->groupBy('pertanyaan.id_pert')
        ->like('pengguna', 'Dosen')
        ->orderBy('id_unit');
        
        if(count($categories) > 0)
        {
            $query = $query->whereIn('pertanyaan.id_kat',$categories);
        }
        return $query->get()->getResultArray();
    }


    public function getOpsi(){
        return $this->db->table('opsi')->get()->getResultArray();
    }

    public function saveSurvei($params)
    {
        $result = array();
        $kode_prod = $this->getDosenProdi()->prodi;

        $batch  = [];
        foreach($params['opsi'] as $key => $value) {
            foreach($params['id_pert'] as $key2 => $value2) {
                foreach($params['id_jadwal'] as $key3 => $value3) {
                    if ( $key == ((int) $key2 + 2) && $key2 == $key3) {
                        $data = [
                            'id_pert'   => $value2,
                            'opsi'      => $value,
                            'kode_prodi'=> $kode_prod,
                            'role_user'=> 1, //role dosen 1, mhsw 2, tendik 3
                            'id_jadwal' => $value3
                        ];
            
                        array_push($batch, $data);
                    }
                }
            }

        }
        // execute insert batch
        $insertBatch = $this->db->table('hsl_survei')->insertBatch($batch);
            
    }

}