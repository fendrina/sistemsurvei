<?php

namespace App\Controllers;
use App\Models\HasilSurvei_M;
use App\Models\Jadwal_M;
use App\Models\Grafik_M;

class Dashboard extends BaseController
{
    protected $hasilSurveiModel;
    protected $hasilSurvei; //OOP
    public function __construct()
    {
        $this->hasilSurveiModel = new HasilSurvei_M();
        $this->hasilSurvei = new Grafik_M();
        $this->jadwalSurveiModel =  new Jadwal_M();
        helper('form');
    }
	public function index()
    {
        $auth = new \IonAuth\Libraries\IonAuth;
        $data = [
            'title'             => 'Survei Kepuasan Sekolah Vokasi IPB',
            'user'              =>  $auth->user()->row(),
            'group_name'        => $auth->getUsersGroups()->getRow()->name,
            'hsl_survei'        => $this->hasilSurveiModel->getHasil(),
            'thn_ajaran'        => $this->hasilSurveiModel->getThnAjaran(),
            'thn_ajrn'          => $this->hasilSurveiModel->getThnAjaranF(),
            'unit'              => $this->hasilSurveiModel->getUnit(),
            'thn_off'           => $this->jadwalSurveiModel->JadwalOff(),
            'tgl_off'           => $this->hasilSurveiModel->getJadwal(),
            'tgl_on'            => $this->hasilSurveiModel->getTanggal(),
            'hsl_akademik'      => $this->hasilSurveiModel->getAkademik(),
            'hsl_sarpras'       => $this->hasilSurveiModel->getSarpras(),
            'hsl_pelayanan'     => $this->hasilSurveiModel->getPelayanan(),
            'hsl_lab'           => $this->hasilSurveiModel->getLab(),
            'hsl_perpus'        => $this->hasilSurveiModel->getPerpus(),
            'total_user'        => $this->hasilSurveiModel->getDosenMhsw(),
            'total_tendik'        => $this->hasilSurveiModel->getTendik(),
            'mhsw_aktif'        => $this->hasilSurveiModel->getJmlMhsw(),
            'grafik_prodi'      => $this->hasilSurvei->getGrafikProdi(),
            'grafik_prodim'     => $this->hasilSurvei->getGrafikProdiM(),
            'nama_prodi'        => $this->hasilSurvei->getProdi(),
            'grafik_total2'     => $this->hasilSurvei->getGrafikTotal(),
            'all_dosen'          =>$this->hasilSurvei->getAllDosen(),
            'all_mhsw'          =>$this->hasilSurvei->getAllMhsw(),
            'all_tendik'          =>$this->hasilSurvei->getAllTendik(),
            'grafik_akademik'   => $this->hasilSurvei->getGrafikAkademik(),
            'akademik_dosen'   => $this->hasilSurvei->getGrafikAkademikD(),
            'akademik_mhsw'   => $this->hasilSurvei->getGrafikAkademikM(),
            'akademik_tendik'   => $this->hasilSurvei->getGrafikAkademikT(),
            'grafik_sarpras'    => $this->hasilSurvei->getGrafikSarpras(),
            'sarpras_dosen'    => $this->hasilSurvei->getGrafikSarprasD(),
            'sarpras_mhsw'    => $this->hasilSurvei->getGrafikSarprasM(),
            'sarpras_tendik'    => $this->hasilSurvei->getGrafikSarprasT(),
            'grafik_pelayanan'  => $this->hasilSurvei->getGrafikPelayanan(),
            'pelayanan_dosen'  => $this->hasilSurvei->getGrafikPelayananD(),
            'pelayanan_mhsw'  => $this->hasilSurvei->getGrafikPelayananM(),
            'pelayanan_tendik'  => $this->hasilSurvei->getGrafikPelayananT(),
            'grafik_lab'        => $this->hasilSurvei->getGrafikLab(),
            'lab_dosen'        => $this->hasilSurvei->getGrafikLabD(),
            'lab_mhsw'        => $this->hasilSurvei->getGrafikLabM(),
            'lab_tendik'        => $this->hasilSurvei->getGrafikLabT(),
            'grafik_perpus'     => $this->hasilSurvei->getGrafikPerpus(),
            'perpus_dosen'     => $this->hasilSurvei->getGrafikPerpusD(),
            'perpus_mhsw'     => $this->hasilSurvei->getGrafikPerpusM(),
            'perpus_tendik'     => $this->hasilSurvei->getGrafikPerpusT()
        ]; 
        
        return view('dashboard', $data);
        return view('layout/templateDashAdmin', $data);
    }
	
}
