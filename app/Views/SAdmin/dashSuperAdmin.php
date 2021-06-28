
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card" id="card1">
        
          <div class="card-body dashboard-tabs p-0">
          
            <ul class="nav nav-tabs px-4" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="prodi-tab" data-toggle="tab" href="#prodi" role="tab" aria-controls="prodi" aria-selected="true">Program Studi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="semuaUnit-tab" data-toggle="tab" href="#semuaUnit" role="tab" aria-controls="semuaUnit" aria-selected="true">Semua Unit</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="akademik-tab" data-toggle="tab" href="#akademik" role="tab" aria-controls="akademik" aria-selected="false">Akademik</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="sarpras-tab" data-toggle="tab" href="#sarpras" role="tab" aria-controls="sarpras" aria-selected="false">Sarana dan Prasrana</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pelayanan-tab" data-toggle="tab" href="#pelayanan" role="tab" aria-controls="pelayanan" aria-selected="false">Pelayanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="lab-tab" data-toggle="tab" href="#lab" role="tab" aria-controls="lab" aria-selected="false">Laboratorium</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="perpus-tab" data-toggle="tab" href="#perpus" role="tab" aria-controls="perpus" aria-selected="false">Perpustakaan</a>
              </li>
            </ul>

            <div class="tab-content py-0 px-0">
              </br>
              <!-- Program studi -->
              <div class="tab-pane fade show active" id="prodi" role="tabpanel" aria-labelledby="prodi-tab">
                <div class="row">
                  <div class="col-sm-2">
                  </div>
                  <div class="col-sm-8">
                  </div>
                  <div class="col-sm-2 text-center">
                    <a id="download"
                        download="Prodi.jpg" 
                        href=""
                        title="Grafik Pengisi Survei Per-prodi">

                        <!-- Download Icon -->
                        <button type="button" class="btn2 btn-primary"> <i class="mdi mdi-download"></i>Unduh</button>
                        <!-- <p class="text-center">Unduh</p> -->
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                  </div>
                  <div class="col-sm-8">
                      <div class="card-body">
                      <?php if ($tgl_on) { ?>
                        <canvas id="barChart"></canvas>
                        <br>
                        <p class="text-center">Grafik Pengisi Survei Per-prodi Tahun Ajaran <?php echo $thn_ajaran->thn_ajaran?></p>
                        <ul>
                          <li class="text-left text-muted font-weight-bold">Jumlah Mahasiswa yang sudah mengisi:  <?php echo $mhsw_aktif['mhsw']?> </li>
                          <li class="text-left text-muted font-weight-bold">Jumlah Dosen yang sudah mengisi:  <?php echo $mhsw_aktif['dosen']?></li>
                        </ul>
                      <?php } elseif ($tgl_off) { ?>
                        <canvas id="barChart"></canvas>
                        <p class="text-center">Grafik Pengisi Survei Per-prodi Tahun Ajaran <?php echo $thn_off['thn_ajaran']?></p>
                        <ul>
                          <li class="text-left text-muted font-weight-bold">Jumlah Mahasiswa yang sudah mengisi: <?php echo $mhsw_aktif['mhsw']?> </li>
                          <li class="text-left text-muted font-weight-bold">Jumlah Dosen yang sudah mengisi: <?php echo $mhsw_aktif['dosen']?></li>
                        </ul>
                      <?php } else  { ?>
                        <p class="text-center">DATA KOSONG</p>
                      <?php } ?>
                      </div>
                      
                  </div>
                  <div class="col-sm-2">
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                  <p class="card-title" style="font-size: 18px;">Jumlah Pengisi Survei (Dosen dan Mahasiswa)</p>
                    <div class="table-responsive">
                      <div class="table-wrapper">
                        <div class="table-title">
                        </div>
                        <table id="tableHasil" class="table table-striped table-hover table-bordered">
                          <thead>
                            <tr>
                            <th colspan="2" class="text-center">Program Studi </th>
                            <th colspan="2" class="text-center">Sudah Mengisi </th>
                            <tr>
                            <th>No</th>
                              <th>Nama Prodi</th>
                              <th>Mahasiswa</th>
                              <th>Dosen</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i = 1; foreach($total_user as $p) { ?>
                              <tr>
                              <td class="text-center"><?= $i++; ?></td>
                                <td class="text-center"> <?= $p['prodi'] ?></td>
                                <td class="text-center"><?= $p['mhsw'] ?></td>
                                <td class="text-center"><?= $p['dosen'] ?></td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                        </div>
                      </div>  
                    </div>
                  </div>  
                  <div class="card">
                  <div class="card-body">
                  <p class="card-title" style="font-size: 18px;">Jumlah Pengisi Survei (Tenaga Pendidikan)</p>
                    <div class="table-responsive">
                      <div class="table-wrapper">
                        <div class="table-title">
                        </div>
                        <table id="tableTendik" class="table table-striped table-hover table-bordered">
                          <thead>
                              <th style="width: 100px;">Nama</th>
                              <th>Sudah Mengisi</th>
                          </thead>
                          <tbody>
                            <?php $i = 1; foreach($total_tendik as $p) { ?>
                              <tr>
                                <td class="text-center">Tenaga Pendidikan</td>
                                <td class="text-center"><?= $p['tendik'] ?></td>
                              </tr>
                            <?php } ?>
                          </tbody>
                          </table>
                        </div>
                      </div>  
                    </div>
                  </div>
                </div>

              <!-- Grafik Semua Unit -->
              <div class="tab-pane fade show" id="semuaUnit" role="tabpanel" aria-labelledby="semuaUnit-tab">
                <!-- pilih role -->
                <div class="row" >
                    
                  <div class="col-sm-2 text-right" >
                  <div class="btn-group-vertical">
                    <button id="0All" type="button" class="btn2 btn-outline-primary">Semua</button>
                    </br>
                    <button id="1All" type="button" class="btn2 btn-outline-primary">Dosen</button>
                    </br>
                    <button id="2All" type="button" class="btn2 btn-outline-primary">Mahasiswa</button>
                    </br>
                    <button id="3All" type="button" class="btn2 btn-outline-primary">Tendik</button>
                    </div>
                  </div>
                  <div class="col-sm-8 text-center">

                    <?php if ($tgl_on) { ?>
                      <canvas id="Allunit"></canvas>
                      <br>
                      <p class="text-center">Grafik Hasil Survei Tahun Ajaran <?php echo $thn_ajaran->thn_ajaran?></p>
                    <?php } elseif ($tgl_off) { ?>
                      <canvas id="Allunit"></canvas>
                      <p class="text-center">Grafik Hasil Survei Tahun Ajaran <?php echo $thn_off['thn_ajaran']?></p>
                    <?php } else  { ?>
                      <p class="text-center">DATA KOSONG</p>
                    <?php } ?>
                  </div>
                  <div class="col-sm-2 text-center">
                    <a id="download1"
                        download="Hasil Survei.jpg" 
                        href=""
                        title="Grafik Hasil Survei">

                        <!-- Download Icon -->
                        <button type="button" class="btn2 btn-primary"> <i class="mdi mdi-download"></i>Unduh</button>
                        
                    </a>
                  </div>
                </div>
              </div> 
              <!-- Grafik Akademik -->
              <div class="tab-pane fade" id="akademik" role="tabpanel" aria-labelledby="akademik-tab">
                <!-- pilih role -->
                <div class="row" >
                  <div class="col-sm-2 text-right" >
                  <div class="btn-group-vertical">
                    <button id="0Akademik" type="button" class="btn2 btn-outline-primary">Semua</button>
                    </br>
                    <button id="1Akademik" type="button" class="btn2 btn-outline-primary">Dosen</button>
                    </br>
                    <button id="2Akademik" type="button" class="btn2 btn-outline-primary">Mahasiswa</button>
                    </br>
                    <button id="3Akademik" type="button" class="btn2 btn-outline-primary">Tendik</button>
                  </div>
                  </div>
                  <div class="col-sm-8 text-center" >
                    <?php if ($tgl_on) { ?>
                      <canvas id="Gakademik"></canvas>
                      <br>
                      <p class="text-center">Grafik Akademik Tahun Ajaran <?php echo $thn_ajaran->thn_ajaran?></p>
                    <?php } elseif ($tgl_off) { ?>
                      <canvas id="Gakademik"></canvas>
                      <p class="text-center">Grafik Akademik Tahun Ajaran <?php echo $thn_off['thn_ajaran']?></p>
                    <?php } else  { ?>
                      <p class="text-center">DATA KOSONG</p>
                    <?php } ?>
                      
                  </div>
                  <div class="col-sm-2 text-center">
                    <a id="download2"
                      download="Hasil Survei Akademik.jpg" 
                      href=""
                      title="Grafik Akademik">

                      <!-- Download Icon -->
                      <button type="button" class="btn2 btn-primary"> <i class="mdi mdi-download"></i>Unduh</button>
                     
                    </a>
                  </div>
                </div>
              </div>

              <!-- Grafik Sarana dan prasarana -->
              <div class="tab-pane fade" id="sarpras" role="tabpanel" aria-labelledby="sarpras-tab">
                <div class="row">
                  <div class="col-sm-2 text-right">
                    <div class="btn-group-vertical">
                      <button id="0Sarpras" type="button" class="btn2 btn-outline-primary">Semua</button>
                      </br>
                      <button id="1Sarpras" type="button" class="btn2 btn-outline-primary">Dosen</button>
                      </br>
                      <button id="2Sarpras" type="button" class="btn2 btn-outline-primary">Mahasiswa</button>
                      </br>
                      <button id="3Sarpras" type="button" class="btn2 btn-outline-primary">Tendik</button>
                    </div>
                  </div>
                  <div class="col-sm-8 text-center">
                    <?php if ($tgl_on) { ?>
                      <canvas id="Gsarpras"></canvas>
                      <br>
                      <p class="text-center">Grafik Sarana dan Prasarana Tahun Ajaran <?php echo $thn_ajaran->thn_ajaran?></p>
                    <?php } elseif ($tgl_off) { ?>
                      <canvas id="Gsarpras"></canvas>
                      <p class="text-center">Grafik Sarana dan Prasarana Tahun Ajaran <?php echo $thn_off['thn_ajaran']?></p>
                    <?php } else  { ?>
                      <p class="text-center">DATA KOSONG</p>
                    <?php } ?>
                  </div>
                  <div class="col-sm-2 text-center">
                    <a id="download3"
                      download="Hasil Survei Sarana dan Prasarana.jpg" 
                      href=""
                      title="Grafik Akademik">

                      <!-- Download Icon -->
                      <button type="button" class="btn2 btn-primary"> <i class="mdi mdi-download"></i>Unduh</button>
                      
                    </a>
                  </div>
                </div>
              </div>

              <!-- Grafik Pelayanan -->
              <div class="tab-pane fade" id="pelayanan" role="tabpanel" aria-labelledby="pelayanan-tab">

                <div class="row">
                  <div class="col-sm-2 text-right">
                    <div class="btn-group-vertical">
                      <button id="0Pel" type="button" class="btn2 btn-outline-primary">Semua</button>
                      </br>
                      <button id="1Pel" type="button" class="btn2 btn-outline-primary">Dosen</button>
                      </br>
                      <button id="2Pel" type="button" class="btn2 btn-outline-primary">Mahasiswa</button>
                      </br>
                      <button id="3Pel" type="button" class="btn2 btn-outline-primary">Tendik</button>
                    </div>
                  </div>
                  <div class="col-sm-8 text-center">
                    <?php if ($tgl_on) { ?>
                      <canvas id="Gpelayanan"></canvas>
                      <br>
                      <p class="text-center">Grafik Pelayanan Tahun Ajaran <?php echo $thn_ajaran->thn_ajaran?></p>
                    <?php } elseif ($tgl_off) { ?>
                      <canvas id="Gpelayanan"></canvas>
                      <p class="text-center">Grafik Pelayanan Tahun Ajaran <?php echo $thn_off['thn_ajaran']?></p>
                    <?php } else  { ?>
                      <p class="text-center">DATA KOSONG</p>
                    <?php } ?>
                  </div>
                  <div class="col-sm-2 text-center">
                    <a id="download4"
                      download="Hasil Survei Pelayanan.jpg" 
                      href=""
                      title="Grafik Pelayanan">

                      <!-- Download Icon -->
                      <button type="button" class="btn2 btn-primary"> <i class="mdi mdi-download"></i>Unduh</button>
                      
                    </a>
                  </div>
                </div>
              </div>

              <!-- Grafik Laboratorium -->
              <div class="tab-pane fade" id="lab" role="tabpanel" aria-labelledby="lab-tab">
                <div class="row">
                  <div class="col-sm-2 text-right">
                    <div class="btn-group-vertical">
                      <button id="0Lab" type="button" class="btn2 btn-outline-primary">Semua</button>
                      </br>
                      <button id="1Lab" type="button" class="btn2 btn-outline-primary">Dosen</button>
                      </br>
                      <button id="2Lab" type="button" class="btn2 btn-outline-primary">Mahasiswa</button>
                      </br>
                      <button id="3Lab" type="button" class="btn2 btn-outline-primary">Tendik</button>
                    </div>
                  </div>
                  <div class="col-sm-8 text-center">
                    <?php if ($tgl_on) { ?>
                      <canvas id="Glab"></canvas>
                      <br>
                      <p class="text-center">Grafik Laboratorium Tahun Ajaran <?php echo $thn_ajaran->thn_ajaran?></p>
                    <?php } elseif ($tgl_off) { ?>
                      <canvas id="Glab"></canvas>
                      <p class="text-center">Grafik Laboratorium Tahun Ajaran <?php echo $thn_off['thn_ajaran']?></p>
                    <?php } else  { ?>
                      <p class="text-center">DATA KOSONG</p>
                    <?php } ?>
                  </div>
                  <div class="col-sm-2 text-center">
                    <a id="download5"
                      download="Hasil Survei Laboratorium.jpg" 
                      href=""
                      title="Grafik Laboratorium">

                      <!-- Download Icon -->
                      <button type="button" class="btn2 btn-primary"> <i class="mdi mdi-download"></i>Unduh</button>
                      
                    </a>
                  </div>
                </div>
              </div>

              <!-- Grafik Perpustakaan -->
              <div class="tab-pane fade" id="perpus" role="tabpanel" aria-labelledby="perpus-tab">
              <!-- pilih role -->
                <div class="row">
                  <div class="col-sm-2 text-right">
                  <div class="btn-group-vertical">
                    <button id="0" type="button" class="btn2 btn-outline-primary">Semua</button>
                    </br>
                    <button id="1" type="button" class="btn2 btn-outline-primary">Dosen</button>
                    </br>
                    <button id="2" type="button" class="btn2 btn-outline-primary">Mahasiswa</button>
                    </br>
                    <button id="3" type="button" class="btn2 btn-outline-primary">Tendik</button>
                  </div>
                  </div>
                  <div class="col-sm-8 text-center">
                    <div class="card-body">
                    <?php if ($tgl_on) { ?>
                      <canvas id="Gperpus"></canvas>
                      <br>
                      <p class="text-center">Grafik Perpustakaan Tahun Ajaran <?php echo $thn_ajaran->thn_ajaran?></p>
                    <?php } elseif ($tgl_off) { ?>
                      <canvas id="Gperpus"></canvas>
                      <p class="text-center">Grafik Perpustakaan Tahun Ajaran <?php echo $thn_off['thn_ajaran']?></p>
                    <?php } else  { ?>
                      <p class="text-center">DATA KOSONG</p>
                    <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-2 text-center">
                    <a id="download6"
                      download="Hasil Survei Perpustakaan.jpg" 
                      href=""
                      title="Grafik Perpustakaan">

                      <!-- Download Icon -->
                      <button type="button" class="btn2 btn-primary"> <i class="mdi mdi-download"></i>Unduh</button>
                 
                    </a>
                  </div>
                </div>

                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Sekolah Vokasi IPB 2021</span>
            
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo base_url('assets/vendors/base/vendor.bundle.base.js')?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?php echo base_url('assets/vendors/chart.js/Chart.min.js')?>"></script>
  <script>

  $(function() {
  /* ChartJS
   * -------
   * Data and config for chartjs
   */

  'use strict';
  var data = {
    labels: [
      <?php
        if (count($nama_prodi)>0) {
        foreach ($nama_prodi as $data) {
            echo "'" .$data['kode_prodi'] ."',";
        }
        }
      ?>
      ],
    datasets: [
    {
      label: 'Mahasiswa',
      data: [<?=$grafik_prodim[0];?>,
      <?=$grafik_prodim[1];?>,
      <?=$grafik_prodim[2];?>,
      <?=$grafik_prodim[3];?>,
      <?=$grafik_prodim[4];?>,
      <?=$grafik_prodim[5];?>,
      <?=$grafik_prodim[6];?>,
      <?=$grafik_prodim[7];?>,
      <?=$grafik_prodim[8];?>,
      <?=$grafik_prodim[9];?>,
      <?=$grafik_prodim[10];?>,
      <?=$grafik_prodim[11];?>,
      <?=$grafik_prodim[12];?>,
      <?=$grafik_prodim[13];?>,
      <?=$grafik_prodim[14];?>,
      <?=$grafik_prodim[15];?>,
      <?=$grafik_prodim[16];?>
      ],
      borderColor: 'rgba(54, 162, 235)',
      backgroundColor: '#ffc100',
    },
    {
      label: 'Dosen',
      data: [<?=$grafik_prodi[0];?>,
      <?=$grafik_prodi[1];?>,
      <?=$grafik_prodi[2];?>,
      <?=$grafik_prodi[3];?>,
      <?=$grafik_prodi[4];?>,
      <?=$grafik_prodi[5];?>,
      <?=$grafik_prodi[6];?>,
      <?=$grafik_prodi[7];?>,
      <?=$grafik_prodi[8];?>,
      <?=$grafik_prodi[9];?>,
      <?=$grafik_prodi[10];?>,
      <?=$grafik_prodi[11];?>,
      <?=$grafik_prodi[12];?>,
      <?=$grafik_prodi[13];?>,
      <?=$grafik_prodi[14];?>,
      <?=$grafik_prodi[15];?>,
      <?=$grafik_prodi[16];?>
      ],
      borderColor: 'rgba(255, 206, 86)',
      backgroundColor: '#3d41c2',
    }
  ]
  };
  var options = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
          precision: 0
        }
      }]
    },
    legend: {
      display: false
    },
    elements: {
      point: {
        radius: 0
      }
    },
    plugins: {
      labels: {
        render: 'value',
        fontColor: '#fff'
      },
    }

  };
  //Grafik Semua Unit
  var label_data = ['Sangat Baik', 'Baik', 'Tidak Baik', 'Sangat Tidak Baik'];
  var data_semua = [<?=$grafik_total2[0];?>, <?=$grafik_total2[1];?>, <?=$grafik_total2[2];?>, <?=$grafik_total2[3];?>];
  var ctx = document.getElementById("Allunit").getContext('2d');
  var config = {
    type: 'pie',
    data: {
        labels: label_data,
        datasets: [{
            data: data_semua,
            backgroundColor: [
              '#31ED22',
              '#EDE722',
              '#7222ED',
              '#ED3422'
            ],
            borderColor: [
              '#31ED22',
              '#EDE722',
              '#7222ED',
              '#ED3422'
            ],
        }]
    },
    options: {
      responsive: true,
      animation: {
        animateScale: true,
        animateRotate: true
      },
      plugins: {
        labels: {
          render: 'percentage',
          fontColor: 'black'
        }
      },
    }
  };
  var all_chart = new Chart(ctx, config);
  $("#0All").click(function() {
    var data = all_chart.config.data;
    data.datasets[0].data = data_semua;
    data.labels = label_data;
    all_chart.update();
  });
  $("#1All").click(function() {
    var data_semua = [<?=$all_dosen[0];?>, <?=$all_dosen[1];?>, <?=$all_dosen[2];?>, <?=$all_dosen[3];?>];
    var data = all_chart.config.data;
    data.datasets[0].data = data_semua;
    data.labels = label_data;
    all_chart.update();
  });
  $("#2All").click(function() {
    var data_semua = [<?=$all_mhsw[0];?>, <?=$all_mhsw[1];?>, <?=$all_mhsw[2];?>, <?=$all_mhsw[3];?>];
    var data = all_chart.config.data;
    data.datasets[0].data = data_semua;
    data.labels = label_data;
    all_chart.update();
  });
  $("#3All").click(function() {
    var data_semua = [ <?=$all_tendik[0];?>, <?=$all_tendik[1];?>, <?=$all_tendik[2];?>, <?=$all_tendik[3];?>];
    var data = all_chart.config.data;
    data.datasets[0].data = data_semua;
    data.labels = label_data;
    all_chart.update();
  });

  //Grafik Akademik
  var label_data = ['Sangat Baik', 'Baik', 'Tidak Baik', 'Sangat Tidak Baik'];
  var data_akademik = [<?=$grafik_akademik[0];?>, <?=$grafik_akademik[1];?>, <?=$grafik_akademik[2];?>, <?=$grafik_akademik[3];?>];
  var ctx = document.getElementById("Gakademik").getContext('2d');
  var config = {
    type: 'doughnut',
    data: {
        labels: label_data,
        datasets: [{
            data: data_akademik,
            backgroundColor: [
              '#31ED22',
              '#EDE722',
              '#7222ED',
              '#ED3422'
            ],
            borderColor: [
              '#31ED22',
              '#EDE722',
              '#7222ED',
              '#ED3422'
            ],
        }]
    },
    options: {
      responsive: true,
      animation: {
        animateScale: true,
        animateRotate: true
      },
      plugins: {
        labels: {
          render: 'percentage',
          fontColor: 'black'
        }
      },
    }
  };
  var akademik_chart = new Chart(ctx, config);
  $("#0Akademik").click(function() {
    var data = akademik_chart.config.data;
    data.datasets[0].data = data_akademik;
    data.labels = label_data;
    akademik_chart.update();
  });
  $("#1Akademik").click(function() {
    var data_akademik = [<?=$akademik_dosen[0];?>, <?=$akademik_dosen[1];?>, <?=$akademik_dosen[2];?>, <?=$akademik_dosen[3];?>];
    var data = akademik_chart.config.data;
    data.datasets[0].data = data_akademik;
    data.labels = label_data;
    akademik_chart.update();
  });
  $("#2Akademik").click(function() {
    var data_akademik = [<?=$akademik_mhsw[0];?>, <?=$akademik_mhsw[1];?>, <?=$akademik_mhsw[2];?>, <?=$akademik_mhsw[3];?>];
    var data = akademik_chart.config.data;
    data.datasets[0].data = data_akademik;
    data.labels = label_data;
    akademik_chart.update();
  });
  $("#3Akademik").click(function() {
    var data_akademik = [<?=$akademik_tendik[0];?>, <?=$akademik_tendik[1];?>, <?=$akademik_tendik[2];?>, <?=$akademik_tendik[3];?>];
    var data = akademik_chart.config.data;
    data.datasets[0].data = data_akademik;
    data.labels = label_data;
    akademik_chart.update();
  });

  //Grafik Sarana dan Prasana
  var label_data = ['Sangat Baik', 'Baik', 'Tidak Baik', 'Sangat Tidak Baik'];
  var data_sarpas = [<?=$grafik_sarpras[0];?>, <?=$grafik_sarpras[1];?>, <?=$grafik_sarpras[2];?>, <?=$grafik_sarpras[3];?>];
  var ctx = document.getElementById("Gsarpras").getContext('2d');
  var config = {
    type: 'pie',
    data: {
        labels: label_data,
        datasets: [{
            data: data_sarpas,
            backgroundColor: [
              '#31ED22',
              '#EDE722',
              '#7222ED',
              '#ED3422'
            ],
            borderColor: [
              '#31ED22',
              '#EDE722',
              '#7222ED',
              '#ED3422'
            ],
        }]
    },
    options: {
      responsive: true,
      animation: {
        animateScale: true,
        animateRotate: true
      },
      plugins: {
        labels: {
          render: 'percentage',
          fontColor: 'black'
        }
      },
    }
  };
  var sarpras_chart = new Chart(ctx, config);
  $("#0Sarpras").click(function() {
    var data = sarpras_chart.config.data;
    data.datasets[0].data = data_sarpas;
    data.labels = label_data;
    sarpras_chart.update();
  });
  $("#1Sarpras").click(function() {
    var data_sarpas = [<?=$sarpras_dosen[0];?>, <?=$sarpras_dosen[1];?>, <?=$sarpras_dosen[2];?>, <?=$sarpras_dosen[3];?>];
    var data = sarpras_chart.config.data;
    data.datasets[0].data = data_sarpas;
    data.labels = label_data;
    sarpras_chart.update();
  });
  $("#2Sarpras").click(function() {
    var data_sarpas = [<?=$sarpras_mhsw[0];?>, <?=$sarpras_mhsw[1];?>, <?=$sarpras_mhsw[2];?>, <?=$sarpras_mhsw[3];?>];
    var data = sarpras_chart.config.data;
    data.datasets[0].data = data_sarpas;
    data.labels = label_data;
    sarpras_chart.update();
  });
  $("#3Sarpras").click(function() {
    var data_sarpas = [ <?=$sarpras_tendik[0];?>, <?=$sarpras_tendik[1];?>, <?=$sarpras_tendik[2];?>, <?=$sarpras_tendik[3];?>];
    var data = sarpras_chart.config.data;
    data.datasets[0].data = data_sarpas;
    data.labels = label_data;
    sarpras_chart.update();
  });


  //Grafik Pelayanan
  var label_data = ['Sangat Baik', 'Baik', 'Tidak Baik', 'Sangat Tidak Baik'];
  var data_pelayanan = [<?=$grafik_pelayanan[0];?>, <?=$grafik_pelayanan[1];?>, <?=$grafik_pelayanan[2];?>, <?=$grafik_pelayanan[3];?>];
  var ctx = document.getElementById("Gpelayanan").getContext('2d');
  var config = {
    type: 'doughnut',
    data: {
        labels: label_data,
        datasets: [{
            data: data_pelayanan,
            backgroundColor: [
              '#31ED22',
              '#EDE722',
              '#7222ED',
              '#ED3422'
            ],
            borderColor: [
              '#31ED22',
              '#EDE722',
              '#7222ED',
              '#ED3422'
            ],
        }]
    },
    options: {
      responsive: true,
      animation: {
        animateScale: true,
        animateRotate: true
      },
      plugins: {
        labels: {
          render: 'percentage',
          fontColor: 'black'
        }
      },
    }
  };
  var pelayanan_chart = new Chart(ctx, config);
  $("#0Pel").click(function() {
    var data = pelayanan_chart.config.data;
    data.datasets[0].data = data_pelayanan;
    data.labels = label_data;
    pelayanan_chart.update();
  });
  $("#1Pel").click(function() {
    var data_pelayanan = [<?=$pelayanan_dosen[0];?>, <?=$pelayanan_dosen[1];?>, <?=$pelayanan_dosen[2];?>, <?=$pelayanan_dosen[3];?>];
    var data = pelayanan_chart.config.data;
    data.datasets[0].data = data_pelayanan;
    data.labels = label_data;
    pelayanan_chart.update();
  });
  $("#2Pel").click(function() {
    var data_pelayanan = [<?=$pelayanan_mhsw[0];?>, <?=$pelayanan_mhsw[1];?>, <?=$pelayanan_mhsw[2];?>, <?=$pelayanan_mhsw[3];?>];
    var data = pelayanan_chart.config.data;
    data.datasets[0].data = data_pelayanan;
    data.labels = label_data;
    pelayanan_chart.update();
  });
  $("#3Pel").click(function() {
    var data_pelayanan = [ <?=$pelayanan_tendik[0];?>, <?=$pelayanan_tendik[1];?>, <?=$pelayanan_tendik[2];?>, <?=$pelayanan_tendik[3];?>];
    var data = pelayanan_chart.config.data;
    data.datasets[0].data = data_pelayanan;
    data.labels = label_data;
    pelayanan_chart.update();
  });


  //Grafik Laboratorium
  var label_data = ['Sangat Baik', 'Baik', 'Tidak Baik', 'Sangat Tidak Baik'];
  var data_lab = [<?=$grafik_lab[0];?>, <?=$grafik_lab[1];?>, <?=$grafik_lab[2];?>, <?=$grafik_lab[3];?>];
  var ctx = document.getElementById("Glab").getContext('2d');
  var config = {
    type: 'pie',
    data: {
        labels: label_data,
        datasets: [{
            data: data_lab,
            backgroundColor: [
              '#31ED22',
              '#EDE722',
              '#7222ED',
              '#ED3422'
            ],
            borderColor: [
              '#31ED22',
              '#EDE722',
              '#7222ED',
              '#ED3422'
            ],
        }]
    },
    options: {
      responsive: true,
      animation: {
        animateScale: true,
        animateRotate: true
      },
      plugins: {
        labels: {
          render: 'percentage',
          fontColor: 'black'
        }
      },
    }
  };
  var lab_chart = new Chart(ctx, config);
  $("#0Lab").click(function() {
    var data = lab_chart.config.data;
    data.datasets[0].data = data_lab;
    data.labels = label_data;
    lab_chart.update();
  });
  $("#1Lab").click(function() {
    var data_lab = [<?=$lab_dosen[0];?>, <?=$lab_dosen[1];?>, <?=$lab_dosen[2];?>, <?=$lab_dosen[3];?>];
    var data = lab_chart.config.data;
    data.datasets[0].data = data_lab;
    data.labels = label_data;
    lab_chart.update();
  });
  $("#2Lab").click(function() {
    var data_lab = [<?=$lab_mhsw[0];?>, <?=$lab_mhsw[1];?>, <?=$lab_mhsw[2];?>, <?=$lab_mhsw[3];?>];
    var data = lab_chart.config.data;
    data.datasets[0].data = data_lab;
    data.labels = label_data;
    lab_chart.update();
  });
  $("#3Lab").click(function() {
    var data_lab = [<?=$lab_tendik[0];?>, <?=$lab_tendik[1];?>, <?=$lab_tendik[2];?>, <?=$lab_tendik[3];?>];
    var data = lab_chart.config.data;
    data.datasets[0].data = data_lab;
    data.labels = label_data;
    lab_chart.update();
  });


  //grafik perpus
  var label_data = ['Sangat Baik', 'Baik', 'Tidak Baik', 'Sangat Tidak Baik'];
  var data_perpus = [<?=$grafik_perpus[0];?>, <?=$grafik_perpus[1];?>, <?=$grafik_perpus[2];?>, <?=$grafik_perpus[3];?>];
  var ctx = document.getElementById("Gperpus").getContext('2d');
  var config = {
    type: 'doughnut',
    data: {
        labels: label_data,
        datasets: [{
            data: data_perpus,
            backgroundColor: [
              '#31ED22',
              '#EDE722',
              '#7222ED',
              '#ED3422'
            ],
            borderColor: [
              '#31ED22',
              '#EDE722',
              '#7222ED',
              '#ED3422'
            ],
        }]
    },
    options: {
      responsive: true,
      animation: {
        animateScale: true,
        animateRotate: true
      },
      plugins: {
        labels: {
          render: 'percentage',
          fontColor: 'black'
        }
      },
    }
  };
  var perpus_chart = new Chart(ctx, config);
  $("#0").click(function() {
    var data = perpus_chart.config.data;
    data.datasets[0].data = data_perpus;
    data.labels = label_data;
    perpus_chart.update();
  });
  $("#1").click(function() {
    var data_perpus = [<?=$perpus_dosen[0];?>, <?=$perpus_dosen[1];?>, <?=$perpus_dosen[2];?>, <?=$perpus_dosen[3];?>];
    var data = perpus_chart.config.data;
    data.datasets[0].data = data_perpus;
    data.labels = label_data;
    perpus_chart.update();
  });
  $("#2").click(function() {
    var data_perpus = [<?=$perpus_mhsw[0];?>, <?=$perpus_mhsw[1];?>, <?=$perpus_mhsw[2];?>, <?=$perpus_mhsw[3];?>];
    var data = perpus_chart.config.data;
    data.datasets[0].data = data_perpus;
    data.labels = label_data;
    perpus_chart.update();
  });
  $("#3").click(function() {
    var data_perpus = [<?=$perpus_tendik[0];?>, <?=$perpus_tendik[1];?>, <?=$perpus_tendik[2];?>, <?=$perpus_tendik[3];?>];
    var data = perpus_chart.config.data;
    data.datasets[0].data = data_perpus;
    data.labels = label_data;
    perpus_chart.update();
  });
  
  // Get context with jQuery - using jQuery's .get() method.
  if ($("#barChart").length) {
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: data,
      options: options
    });
  }
});

  //Download Chart Image
  document.getElementById("download").addEventListener('click', function(){
    /*Get image of canvas element*/
    var url_base64jp = document.getElementById("barChart").toDataURL("image/jpg");
    /*get download button (tag: <a></a>) */
    var a =  document.getElementById("download");
    /*insert chart image url to download button (tag: <a></a>) */
    a.href = url_base64jp;
  });

  document.getElementById("download1").addEventListener('click', function(){
    /*Get image of canvas element*/
    var url_base64jp = document.getElementById("Allunit").toDataURL("image/jpg");
    /*get download button (tag: <a></a>) */
    var a =  document.getElementById("download1");
    /*insert chart image url to download button (tag: <a></a>) */
    a.href = url_base64jp;
  });

  document.getElementById("download2").addEventListener('click', function(){
    /*Get image of canvas element*/
    var url_base64jp = document.getElementById("Gakademik").toDataURL("image/jpg");
    /*get download button (tag: <a></a>) */
    var a =  document.getElementById("download2");
    /*insert chart image url to download button (tag: <a></a>) */
    a.href = url_base64jp;
  });
  document.getElementById("download3").addEventListener('click', function(){
    /*Get image of canvas element*/
    var url_base64jp = document.getElementById("Gsarpras").toDataURL("image/jpg");
    /*get download button (tag: <a></a>) */
    var a =  document.getElementById("download3");
    /*insert chart image url to download button (tag: <a></a>) */
    a.href = url_base64jp;
  });
  document.getElementById("download4").addEventListener('click', function(){
    /*Get image of canvas element*/
    var url_base64jp = document.getElementById("Gpelayanan").toDataURL("image/jpg");
    /*get download button (tag: <a></a>) */
    var a =  document.getElementById("download4");
    /*insert chart image url to download button (tag: <a></a>) */
    a.href = url_base64jp;
  });
  document.getElementById("download5").addEventListener('click', function(){
    /*Get image of canvas element*/
    var url_base64jp = document.getElementById("Glab").toDataURL("image/jpg");
    /*get download button (tag: <a></a>) */
    var a =  document.getElementById("download5");
    /*insert chart image url to download button (tag: <a></a>) */
    a.href = url_base64jp;
  });
  document.getElementById("download6").addEventListener('click', function(){
    /*Get image of canvas element*/
    var url_base64jp = document.getElementById("Gperpus").toDataURL("image/jpg");
    /*get download button (tag: <a></a>) */
    var a =  document.getElementById("download6");
    /*insert chart image url to download button (tag: <a></a>) */
    a.href = url_base64jp;
  });
  </script>
  
  <!-- plugins:js -->
  <script src="<?php echo base_url('assets/vendors/base/vendor.bundle.base.js')?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?php echo base_url('assets/vendors/datatables.net/jquery.dataTables.js')?>"></script>
  <script src="<?php echo base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')?>"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url('assets/js/off-canvas.js')?>"></script>
  <script src="<?php echo base_url('assets/js/hoverable-collapse.js')?>"></script>
  <script src="<?php echo base_url('assets/js/template.js')?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url('assets/js/dashboard.js')?>"></script>
  <script src="<?php echo base_url('assets/js/data-table.js')?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.dataTables.js')?>"></script>
  <script src="<?php echo base_url('assets/js/dataTables.bootstrap4.js')?>"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>

  <!-- End custom js for this page-->
  <script src="<?php echo base_url('assets/js/jquery.cookie.js')?>" type="text/javascript"></script>
  <script>
$(document).ready(function() {
    var tableHasil = $('#tableHasil').DataTable({
      dom:
          "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7 text-right'B >>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      // renderer: 'bootstrap',
      buttons: [
          { extend: 'excel', text: 'Unduh', className: 'btn3 btn-success mdi mdi-download' },
      ],
    });

    var tableHasil = $('#tableTendik').DataTable({
      dom:
          "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7 text-right'B >>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      // renderer: 'bootstrap',
      buttons: [
          { extend: 'excel', text: 'Unduh', className: 'btn3 btn-success mdi mdi-download' },
      ],
    });

      $('#semester').on('change', function () {
      tableHasil.columns(7).search( this.value).draw();
      } );

      $('#thnAjaran').on('change', function () {
        tableHasil.columns(8).search( this.value).draw();
      } );

      $('#roleUser').on('change', function () {
        tableHasil.columns(6).search( this.value).draw();
      } );
  } );
</script>
  
</body>

</html>