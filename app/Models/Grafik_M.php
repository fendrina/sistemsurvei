<?php

namespace App\Models;
use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class Grafik_M extends Model
{

    public function getProdi(){
        $nama_prodi = $this->db->table('prodi')->get()->getResultArray();
        return $nama_prodi;
    }
    public function getGrafikProdi()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getRowArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();
        

        if ($id_jad == NULL) {

            $grafik_prodi = $this->db->table('tb_dosenmhsw')->select('prodi.prodi, tb_dosenmhsw.prodi')
            ->join('jadwal','jadwal.id_jadwal=tb_dosenmhsw.id_jadwal', 'left')
            ->join('prodi','prodi.kode_prodi=tb_dosenmhsw.prodi')
            ->where('tb_dosenmhsw.role_user', 1)
            ->where('tb_dosenmhsw.id_jadwal')->get()->getResultArray();
        
        
        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){
            $grafik_prodi = $this->db->table('tb_dosenmhsw')->select('prodi.prodi, tb_dosenmhsw.prodi')
            ->join('jadwal','jadwal.id_jadwal=tb_dosenmhsw.id_jadwal', 'left')
            ->join('prodi','prodi.kode_prodi=tb_dosenmhsw.prodi')
            ->where('tb_dosenmhsw.role_user', 1)
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->get()->getResultArray();
        }
        else{
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];
            $grafik_prodi = $this->db->table('tb_dosenmhsw')->select('prodi.prodi, tb_dosenmhsw.prodi')
            ->join('jadwal','jadwal.id_jadwal=tb_dosenmhsw.id_jadwal', 'left')
            ->join('prodi','prodi.kode_prodi=tb_dosenmhsw.prodi')
            ->where('tb_dosenmhsw.id_jadwal', $roow)
            ->where('tb_dosenmhsw.role_user', 1)
            ->get()->getResultArray();

        }

        $a = 0;
        $b = 0;
        $c = 0;
        $d = 0;
        $e = 0;
        $f = 0;
        $g = 0;
        $h = 0;
        $i = 0;
        $j = 0;
        $k = 0; 
        $l = 0;
        $m = 0;
        $n = 0;
        $p = 0; 
        $t = 0;
        $w = 0;

        foreach ($grafik_prodi as $grafik):
            if ($grafik['prodi'] == "A") {
                $a = $a + 1;
            }
            elseif($grafik['prodi'] == "B"){
                $b = $b + 1;
            }
            elseif($grafik['prodi'] == "C"){
                $c = $c + 1;
            }
            elseif($grafik['prodi'] == "D"){
                $d = $d + 1;
            }
            elseif($grafik['prodi'] == "E"){
                $e = $e + 1;
            }
            elseif($grafik['prodi'] == "F"){
                $f = $f + 1;
            }
            elseif($grafik['prodi'] == "G"){
                $g = $g + 1;
            }
            elseif($grafik['prodi'] == "H"){
                $h = $h + 1;
            }
            elseif($grafik['prodi'] == "I"){
                $i = $i + 1;
            }
            elseif($grafik['prodi'] == "J"){
                $j = $j + 1;
            }
            elseif($grafik['prodi'] == "K"){
                $k = $k + 1;
            }
            elseif($grafik['prodi'] == "L"){
                $l = $l + 1;
            }
            elseif($grafik['prodi'] == "M"){
                $m = $m + 1;
            }
            elseif($grafik['prodi'] == "N"){
                $n = $n + 1;
            }
            elseif($grafik['prodi'] == "P"){
                $p = $p + 1;
            }
            elseif($grafik['prodi'] == "T"){
                $t = $t + 1;
            }
            elseif($grafik['prodi'] == "W"){
                $w = $w + 1;
            }
        endforeach;

        $data = [$a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $p, $t, $w];
        return $data;
    }

    public function getGrafikProdiM()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getRowArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();
        
   

        if ($id_jad == NULL) {

            $grafik_prodim = $this->db->table('tb_dosenmhsw')->select('prodi.prodi, tb_dosenmhsw.prodi')
            ->join('jadwal','jadwal.id_jadwal=tb_dosenmhsw.id_jadwal', 'left')
            ->join('prodi','prodi.kode_prodi=tb_dosenmhsw.prodi')
            ->where('tb_dosenmhsw.id_jadwal')
            ->where('tb_dosenmhsw.role_user', 2)
            ->get()->getResultArray();
        
        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){
            $grafik_prodim = $this->db->table('tb_dosenmhsw')->select('prodi.prodi, tb_dosenmhsw.prodi')
            ->join('jadwal','jadwal.id_jadwal=tb_dosenmhsw.id_jadwal', 'left')
            ->join('prodi','prodi.kode_prodi=tb_dosenmhsw.prodi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('tb_dosenmhsw.role_user', 2)
            ->get()->getResultArray();
        }
        else{
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];
            $grafik_prodim = $this->db->table('tb_dosenmhsw')->select('prodi.prodi, tb_dosenmhsw.prodi,  tb_dosenmhsw.id_jadwal')
            ->join('jadwal','jadwal.id_jadwal=tb_dosenmhsw.id_jadwal', 'left')
            ->join('prodi','prodi.kode_prodi=tb_dosenmhsw.prodi')
            ->where('tb_dosenmhsw.id_jadwal', $roow)
            ->where('tb_dosenmhsw.role_user', 2)
            ->get()->getResultArray();

        }

        // dd($grafik_prodim);
        $a = 0;
        $b = 0;
        $c = 0;
        $d = 0;
        $e = 0;
        $f = 0;
        $g = 0;
        $h = 0;
        $i = 0;
        $j = 0;
        $k = 0; 
        $l = 0;
        $m = 0;
        $n = 0;
        $p = 0; 
        $t = 0;
        $w = 0;

        foreach ($grafik_prodim as $grafik):
            if ($grafik['prodi'] == "A") {
                $a = $a + 1;
            }
            elseif($grafik['prodi'] == "B"){
                $b = $b + 1;
            }
            elseif($grafik['prodi'] == "C"){
                $c = $c + 1;
            }
            elseif($grafik['prodi'] == "D"){
                $d = $d + 1;
            }
            elseif($grafik['prodi'] == "E"){
                $e = $e + 1;
            }
            elseif($grafik['prodi'] == "F"){
                $f = $f + 1;
            }
            elseif($grafik['prodi'] == "G"){
                $g = $g + 1;
            }
            elseif($grafik['prodi'] == "H"){
                $h = $h + 1;
            }
            elseif($grafik['prodi'] == "I"){
                $i = $i + 1;
            }
            elseif($grafik['prodi'] == "J"){
                $j = $j + 1;
            }
            elseif($grafik['prodi'] == "K"){
                $k = $k + 1;
            }
            elseif($grafik['prodi'] == "L"){
                $l = $l + 1;
            }
            elseif($grafik['prodi'] == "M"){
                $m = $m + 1;
            }
            elseif($grafik['prodi'] == "N"){
                $n = $n + 1;
            }
            elseif($grafik['prodi'] == "P"){
                $p = $p + 1;
            }
            elseif($grafik['prodi'] == "T"){
                $t = $t + 1;
            }
            elseif($grafik['prodi'] == "W"){
                $w = $w + 1;
            }
        endforeach;

        $data = [$a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $p, $t, $w];
        return $data;
    }

    //query total opsi keseluruhan
    public function getGrafikTotal()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getRowArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();
        
    
        if ($id_jad == NULL) {

            $grafik_total = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $grafik_total = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];
            $grafik_total = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal',$roow)
            ->get()->getResultArray();
        } 

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($grafik_total as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    public function getGrafikAkademik()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();

        if ($id_jad == NULL) {

            $grafik_akademik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 1)->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $grafik_akademik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 1)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $grafik_akademik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 1)->get()->getResultArray();
        } 

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($grafik_akademik as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    public function getGrafikAkademikD()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();

        if ($id_jad == NULL) {

            $akademik_dosen = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('role_user',1)
            ->where('pertanyaan.id_unit', 1)->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $akademik_dosen = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 1)
            ->where('role_user',1)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $akademik_dosen = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 1)
            ->where('role_user',1)->get()->getResultArray();
        } 

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($akademik_dosen as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    public function getGrafikAkademikM()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();

        if ($id_jad == NULL) {

            $akademik_mhsw = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('role_user',2)
            ->where('pertanyaan.id_unit', 1)->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $akademik_mhsw = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 1)
            ->where('role_user',2)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $akademik_mhsw = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 1)
            ->where('role_user',2)->get()->getResultArray();
        } 

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($akademik_mhsw as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    public function getGrafikAkademikT()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();

        if ($id_jad == NULL) {

            $akademik_tendik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('role_user',3)
            ->where('pertanyaan.id_unit', 1)->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $akademik_tendik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 1)
            ->where('role_user',3)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $akademik_tendik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 1)
            ->where('role_user',3)->get()->getResultArray();
        } 

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($akademik_tendik as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    //memanggil view grafik sarana dan prasarana
    public function getGrafikSarpras()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();

        if ($id_jad == NULL) {
            
            $grafik_sarpras = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 2)->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $grafik_sarpras = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 2)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $grafik_sarpras = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 2)->get()->getResultArray();
        } 

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($grafik_sarpras as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    public function getGrafikSarprasD()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();

        if ($id_jad == NULL) {
            
            $sarpras_dosen = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 2)
            ->where('role_user',1)
            ->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $sarpras_dosen = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 2)
            ->where('role_user',1)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $sarpras_dosen = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 2)
            ->where('role_user',1)
            ->get()->getResultArray();
        } 

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($sarpras_dosen as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    public function getGrafikSarprasM()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();

        if ($id_jad == NULL) {
            
            $sarpras_mhsw = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 2)
            ->where('role_user',2)
            ->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $sarpras_mhsw = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 2)
            ->where('role_user',2)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $sarpras_mhsw = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 2)
            ->where('role_user',2)
            ->get()->getResultArray();
        } 

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($sarpras_mhsw as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    public function getGrafikSarprasT()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();

        if ($id_jad == NULL) {
            
            $sarpras_tendik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 2)
            ->where('role_user',3)->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $sarpras_tendik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 2)
            ->where('role_user',3)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $sarpras_tendik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 2)
            ->where('role_user',3)->get()->getResultArray();
        } 

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($sarpras_tendik as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    //memanggil view grafik pelayanan
    public function getGrafikPelayanan()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray(); 

        if ($id_jad == NULL) {
            
            $grafik_pelayanan = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 3)->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $grafik_pelayanan = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 3)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $grafik_pelayanan = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 3)->get()->getResultArray();
        }

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($grafik_pelayanan as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    public function getGrafikPelayananD()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray(); 

        if ($id_jad == NULL) {
            
            $pelayanan_dosen = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 3)
            ->where('role_user',1)
            ->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $pelayanan_dosen = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 3)
            ->where('role_user',1)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $pelayanan_dosen = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 3)
            ->where('role_user',1)
            ->get()->getResultArray();
        }

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($pelayanan_dosen as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }
    public function getGrafikPelayananM()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray(); 

        if ($id_jad == NULL) {
            
            $pelayanan_mhsw = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 3)
            ->where('role_user',2)
            ->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $pelayanan_mhsw = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 3)
            ->where('role_user',2)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $pelayanan_mhsw = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 3)
            ->where('role_user',2)
            ->get()->getResultArray();
        }

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($pelayanan_mhsw as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }
    public function getGrafikPelayananT()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray(); 

        if ($id_jad == NULL) {
            
            $pelayanan_tendik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 3)
            ->where('role_user',3)
            ->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $pelayanan_tendik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 3)
            ->where('role_user',3)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $pelayanan_tendik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 3)
            ->where('role_user',3)
            ->get()->getResultArray();
        }

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($pelayanan_tendik as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    //memanggil view grafik laboratorium
    public function getGrafikLab()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray(); 

        if ($id_jad == NULL) {
            
            $grafik_lab = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 4)->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $grafik_lab = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 4)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $grafik_lab = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 4)->get()->getResultArray();
        }

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($grafik_lab as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    public function getGrafikLabD()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray(); 

        if ($id_jad == NULL) {
            
            $lab_dosen = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 4)
            ->where('role_user',1)
            ->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $lab_dosen = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 4)
            ->where('role_user',1)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $lab_dosen = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 4)
            ->where('role_user',1)
            ->get()->getResultArray();
        }

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($lab_dosen as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    public function getGrafikLabM()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray(); 

        if ($id_jad == NULL) {
            
            $lab_mhsw = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 4)
            ->where('role_user',2)
            ->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $lab_mhsw = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 4)
            ->where('role_user',2)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $lab_mhsw = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 4)
            ->where('role_user',2)->get()->getResultArray();
        }

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($lab_mhsw as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    public function getGrafikLabT()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray(); 

        if ($id_jad == NULL) {
            
            $lab_tendik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 4)
            ->where('role_user',3)->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $lab_tendik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 4)
            ->where('role_user',3)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $lab_tendik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 4)
            ->where('role_user',3)->get()->getResultArray();
        }

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($lab_tendik as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    //memanggil view grafik perpus
    public function getGrafikPerpus()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray(); 

        if ($id_jad == NULL) {
            
            $grafik_perpus = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 1)->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $grafik_perpus = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 5)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $grafik_perpus = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 5)->get()->getResultArray();
        }

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($grafik_perpus as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    public function getGrafikPerpusD()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray(); 

        if ($id_jad == NULL) {
            
            $perpus_dosen = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 1)
            ->where('role_user',1)->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $perpus_dosen = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 5)
            ->where('role_user',1)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $perpus_dosen = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 5)
            ->where('role_user',1)->get()->getResultArray();
        }

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($perpus_dosen as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    public function getGrafikPerpusM()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray(); 

        if ($id_jad == NULL) {
            
            $perpus_mhsw = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 1)
            ->where('role_user',2)->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $perpus_mhsw = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 5)
            ->where('role_user',2)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $perpus_mhsw = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 5)
            ->where('role_user',2)->get()->getResultArray();
        }

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($perpus_mhsw as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }
    public function getGrafikPerpusT()
    {
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getResultArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray(); 

        if ($id_jad == NULL) {
            
            $perpus_tendik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('pertanyaan.id_unit', 1)
            ->where('role_user',3)->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $perpus_tendik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('pertanyaan.id_unit', 5)
            ->where('role_user',3)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];

            $perpus_tendik = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal', $roow)
            ->where('pertanyaan.id_unit', 5)
            ->where('role_user',3)->get()->getResultArray();
        }

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($perpus_tendik as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }
    
    //semua unit dosen
    public function getAllDosen(){
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getRowArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();
        
    
        if ($id_jad == NULL) {

            $grafik_total = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('hsl_survei.role_user',1)
            ->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $grafik_total = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('hsl_survei.role_user',1)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];
            $grafik_total = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal',$roow)
            ->where('hsl_survei.role_user',1)
            ->get()->getResultArray();
        } 

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($grafik_total as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    public function getAllMhsw(){
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getRowArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();
        
    
        if ($id_jad == NULL) {

            $grafik_total = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('hsl_survei.role_user',2)
            ->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $grafik_total = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('hsl_survei.role_user',2)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];
            $grafik_total = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal',$roow)
            ->where('hsl_survei.role_user',2)
            ->get()->getResultArray();
        } 

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($grafik_total as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }

    public function getAllTendik(){
        $tgl_skrg = Time::now('Asia/Jakarta')->toDateString();
        $id_jad = $this->db->table('jadwal')->select('id_jadwal')->get()->getRowArray();
        $id_kat = $this->db->table('jadwal')->get()->getRowArray();
        
    
        if ($id_jad == NULL) {

            $grafik_total = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal')
            ->where('hsl_survei.role_user',3)
            ->get()->getResultArray();

        }elseif (($id_kat['tgl_mulai'] <= $tgl_skrg) && ($id_kat['tgl_akhir'] >= $tgl_skrg)){

            $grafik_total = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('jadwal.tgl_mulai <=', $tgl_skrg)->where('jadwal.tgl_akhir >=', $tgl_skrg)
            ->where('hsl_survei.role_user',3)
            ->get()->getResultArray();
        }else {
            $row =$this->db->table('jadwal')->limit(1)->orderBy('id_jadwal',"DESC")->get()->getRowArray();
            $roow = $row['id_jadwal'];
            $grafik_total = $this->db->table('hsl_survei')->select('jadwal.id_jadwal, opsi.opsi')
            ->join('pertanyaan','pertanyaan.id_pert=hsl_survei.id_pert', 'left')
            ->join('jadwal','jadwal.id_jadwal=hsl_survei.id_jadwal', 'left')
            ->join('opsi','opsi.id_ops=hsl_survei.opsi')
            ->where('hsl_survei.id_jadwal',$roow)
            ->where('hsl_survei.role_user',3)
            ->get()->getResultArray();
        } 

        $sangatBaik = 0;
        $baik = 0;
        $tidakBaik = 0;
        $sangatTidakBaik = 0;
        foreach ($grafik_total as $grafik):
            if ($grafik['opsi'] == "Sangat Baik") {
                $sangatBaik = $sangatBaik + 1;
            }
            elseif($grafik['opsi'] == "Baik"){
                $baik = $baik + 1;
            }
            elseif($grafik['opsi'] == "Tidak Baik"){
                $tidakBaik = $tidakBaik + 1;
            }
            elseif($grafik['opsi'] == "Sangat Tidak Baik"){
                $sangatTidakBaik = $sangatTidakBaik + 1;
            }
        endforeach;

        $data = [$sangatBaik, $baik, $tidakBaik, $sangatTidakBaik];
        return $data;
    }
}