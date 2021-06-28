<?php

namespace App\Models;
use CodeIgniter\I18n\Time;
use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\Null_;

class HasilSurvei_M extends Model
{
    
    public function getUnit()
    {
        return $this->db->table('unit')
        ->notLike('nama_unit','Umum')
        ->get()->getResultArray();
    }

    public function getTanggal(){
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $JadwalAktif = $this->db->table('jadwal')
        ->where('tgl_mulai <=', $tgl_skrg)
        ->where('tgl_akhir >=', $tgl_skrg)
        ->get()->getFirstRow();
        
        return $JadwalAktif;
    }

    public function getThnAjaran()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $row = $this->db->table('jadwal')->select('thn_ajaran')->where('tgl_mulai <=', $tgl_skrg)->where('tgl_akhir >=', $tgl_skrg)->get()->getFirstRow();
        return $row;

        // dd($row);
    }

    public function getThnAjaranF()
    {
        return $this->db->table('jadwal')
        ->select('thn_ajaran')
        ->distinct('thn_ajaran')
        ->get()->getResultArray();
    }

    public function getJadwal()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $JadwalAktif = $this->db->table('jadwal')
        ->where('tgl_mulai !=', $tgl_skrg)
        ->where('tgl_akhir !=', $tgl_skrg)
        ->get()->getFirstRow();
        
        return $JadwalAktif;
    }

    public function getJmlMhsw(){
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getRowArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();
        

     
        if ($id_jad == NULL) {
            $mhsw_aktif = $this->db->table('tb_dosenmhsw')->select('COUNT(IF(role_user = 1, role_user, NULL)) as dosen, COUNT(IF(role_user = 2, role_user, NULL)) as mhsw')
            ->join('jadwal','jadwal.id_jadwal=tb_dosenmhsw.id_jadwal')
            ->where('tb_dosenmhsw.id_jadwal')
            ->get()->getRowArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){
            $mhsw_aktif = $this->db->table('tb_dosenmhsw')->select('COUNT(IF(role_user = 1, role_user, NULL)) as dosen, COUNT(IF(role_user = 2, role_user, NULL)) as mhsw')
            ->join('jadwal','jadwal.id_jadwal=tb_dosenmhsw.id_jadwal')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->get()->getRowArray();
        }
        else{
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];
            $mhsw_aktif = $this->db->table('tb_dosenmhsw')->select('COUNT(IF(role_user = 1, role_user, NULL)) as dosen, COUNT(IF(role_user = 2, role_user, NULL)) as mhsw, tb_dosenmhsw.id_jadwal')
            ->join('jadwal','jadwal.id_jadwal=tb_dosenmhsw.id_jadwal')
            ->where('tb_dosenmhsw.id_jadwal', $roow)
            ->get()->getRowArray();

        }
        return $mhsw_aktif;
        // dd($mhsw_aktif);
    }

    //query menghitung opsi setiap pertanyaan
    public function getHasil()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('responden.role')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    //memanggil hasil unti akademik
    public function getAkademik()
    {
        $hasil_akademik = $this->db->table('hsl_survei')->select('hsl_survei.id_pert,  responden.role, jadwal.semester, jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('pertanyaan.id_unit', 1)
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('responden.role')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_akademik;
    }

    //memanggil hasil unit akademik
    public function getSarpras()
    {
        $hasil_sarpras = $this->db->table('hsl_survei')->select('hsl_survei.id_pert,  responden.role, jadwal.semester, jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('pertanyaan.id_unit', 2)
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('responden.role')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_sarpras;
    }

    //memanggil hasil unit akademik
    public function getPelayanan()
    {
        $hasil_pelayanan = $this->db->table('hsl_survei')->select('hsl_survei.id_pert,  responden.role, jadwal.semester, jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('pertanyaan.id_unit', 3)
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('responden.role')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_pelayanan;
    }

    //memanggil hasil unit akademik
    public function getLab()
    {
        $hasil_lab = $this->db->table('hsl_survei')->select('hsl_survei.id_pert,  responden.role, jadwal.semester, jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('pertanyaan.id_unit', 4)
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('responden.role')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_lab;
    }

    //memanggil hasil unit akademik
    public function getPerpus()
    {
        $hasil_perpus = $this->db->table('hsl_survei')->select('hsl_survei.id_pert,  responden.role, jadwal.semester, jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('pertanyaan.id_unit', 5)
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('responden.role')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_perpus;
    }

    public function getKMN()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','a')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('responden.role')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getEKW()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','b')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('responden.role')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getINF()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','c')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('responden.role')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getTEK()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','d')
        ->groupBy('responden.role')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getJMP()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','e')
        ->groupBy('responden.role')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getGZI()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','f')
        ->groupBy('responden.role')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getTIB()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','g')
        ->groupBy('responden.role')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getIKN()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','h')
        ->groupBy('responden.role')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getTNK()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','i')
        ->groupBy('responden.role')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getMAB()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','j')
        ->groupBy('responden.role')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getMNI()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','k')
        ->groupBy('responden.role')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getKIM()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','l')
        ->groupBy('responden.role')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getLNK()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','m')
        ->groupBy('responden.role')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getAKN()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','n')
        ->groupBy('responden.role')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getPVT()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','p')
        ->groupBy('responden.role')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getTMP()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','t')
        ->groupBy('responden.role')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getPPP()
    {
        $hasil_total = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, responden.role, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->join('responden','responden.id_res=hsl_survei.role_user', 'left')
        ->where('kode_prodi','w')
        ->groupBy('responden.role')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.id_jadwal', 'desc')->get()->getResultArray();

        return $hasil_total;
    }

    public function getDosenMhsw(){
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getRowArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();
        

     
        if ($id_jad == NULL) {
            $total_user = $this->db->table('prodi')->select('prodi.prodi, COUNT(IF(role_user = 4, role_user, NULL)) as dosen, COUNT(IF(role_user = 4, role_user, NULL)) as mhsw')
            ->join('tb_dosenmhsw', 'tb_dosenmhsw.prodi=prodi.kode_prodi','left')
            ->groupBy('prodi.prodi')
            ->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){
            $total_user = $this->db->table('prodi')->select('prodi.prodi, COUNT(IF(role_user = 1, role_user, NULL)) as dosen, COUNT(IF(role_user = 2, role_user, NULL)) as mhsw')
            ->join('tb_dosenmhsw', 'tb_dosenmhsw.prodi=prodi.kode_prodi','left')
            ->join('jadwal', 'jadwal.id_jadwal=tb_dosenmhsw.id_jadwal')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->groupBy('prodi.prodi')
            ->orderBy('prodi.prodi','asc')
            ->get()->getResultArray();
        }
        else{
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];
            $total_user = $this->db->table('prodi')->select('prodi.prodi, COUNT(IF(role_user = 1, role_user, NULL)) as dosen, COUNT(IF(role_user = 2, role_user, NULL)) as mhsw')
            ->join('tb_dosenmhsw', 'tb_dosenmhsw.prodi=prodi.kode_prodi','left')
            ->groupBy('prodi.prodi')
            ->where('tb_dosenmhsw.id_jadwal', $roow)
            ->groupBy('prodi.prodi')
            ->orderBy('prodi.prodi','asc')
            ->get()->getResultArray();

        }

        return $total_user;
        // dd($total_user);
    }

    public function getTendik(){
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getRowArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();
        

     
        if ($id_jad == NULL) {
            $total_tendik = $this->db->table('tb_tendik')->select('COUNT(tb_tendik.id) as tendik')
            ->join('jadwal', 'jadwal.id_jadwal=tb_tendik.id_jadwal')
            ->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){
            $total_tendik = $this->db->table('tb_tendik')->select('COUNT(tb_tendik.id) as tendik')
            ->join('jadwal', 'jadwal.id_jadwal=tb_tendik.id_jadwal')
            ->get()->getResultArray();
        }
        else{
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];
            $total_tendik = $this->db->table('tb_tendik')->select('COUNT(tb_tendik.id) as tendik')
            ->join('jadwal', 'jadwal.id_jadwal=tb_tendik.id_jadwal')
            ->where('tb_tendik.id_jadwal', $roow)
            ->get()->getResultArray();

        }
        return $total_tendik;
        // dd($total_user);
    }

    public function getHasilTendik(){
        $hasil_tendik = $this->db->table('hsl_survei')->select('hsl_survei.id_pert, jadwal.semester, 
        jadwal.thn_ajaran, pertanyaan.id_unit, pertanyaan.pertanyaan, COUNT(IF(opsi = 1, opsi, NULL)) as stb, 
        COUNT(IF(opsi = 2, opsi, NULL)) as tb, COUNT(IF(opsi = 3, opsi, NULL)) as b, COUNT(IF(opsi = 4, opsi, NULL)) as sb,')
        ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
        ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
        ->where('role_user','3')
        ->groupBy('pertanyaan.id_pert')
        ->groupBy('jadwal.semester, jadwal.thn_ajaran')
        ->orderBy('jadwal.thn_ajaran, jadwal.semester', 'desc')->get()->getResultArray();

        return $hasil_tendik;
    }
}