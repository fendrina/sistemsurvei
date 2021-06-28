
<div class="main-panel">          
  <div class="content-wrapper">
    <div class="card">
      <div class="card-body">
      <p class="card-title">Hasil Survei Akademik</p>
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
              <!-- <p class="text-center">Unduh</p> -->
            </a>
          </div>
        </div>
      </div>
    </div>
    </br>
    <div class="card">
      <div class="card-body">
        <h6 class="">Filter Hasil Survei</h6>
        <div class="row">
          <div class="col-sm-7">
            <div class="row">
            <div class="col-sm-4">
                <select class="form-control" id="semester">
                    <option value="" selected>-Pilih-</option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                </select>
              </div>

              <div class="col-sm-4">
                <select id="thnAjaran" class="form-control">
                    <option value="" selected>-Pilih-</option>
                    <?php foreach($thn_ajrn as $key => $value):?>
                    <option value="<?= $value['thn_ajaran'];?>"><?= $value['thn_ajaran'];?></option>
                    <?php endforeach;?>
                </select>
              </div>
              <div class="col-sm-4">
                <select id="roleUser" class="form-control">
                    <option value="" selected>-Pilih-</option>
                    <option value="Dosen">Dosen</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="Tendik">Tendik</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-sm-5">
            
          </div>
        </div>
                
        <div class="table-responsive">
          <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                    <!-- <a href="</?= base_url('SAdmin/HasilSurvei/printexcelA'); ?>" class="btn1 btn-success">Rekap Data &nbsp;<i class="mdi mdi-file-excel"></i></a>  -->
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div>
            <table id="tableHasil" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                    <th>No</th>
                        <th>Pertanyaan </th>
                        <th>SB</th>
                        <th>B</th>
                        <th>TB</th>
                        <th>STB</th>
                        <th class="text-wrap">User</th>
                        <th>Semester</th>
                        <th class="text-wrap">Tahun Ajaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($hsl_akademik as $p) { ?>
                        <tr>
                            <td class="text-center"><?= $i++; ?></td>
                            <td class="text-wrap"> <?= $p['pertanyaan']; ?> </td>
                            <td><?= $p['sb']; ?></td>
                            <td><?= $p['b']; ?></td>
                            <td><?= $p['tb']; ?></td>
                            <td><?= $p['stb']; ?></td>
                            <td class="text-center"><?= $p['role']; ?></td>
                            <td class="text-center"><?= $p['semester']; ?></td>
                            <td class="text-center"><?= $p['thn_ajaran']; ?></td>
                        </tr>
                    <?php }?> 
                </tbody>
            </table>
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

});
  document.getElementById("download2").addEventListener('click', function(){
    /*Get image of canvas element*/
    var url_base64jp = document.getElementById("Gakademik").toDataURL("image/jpg");
    /*get download button (tag: <a></a>) */
    var a =  document.getElementById("download2");
    /*insert chart image url to download button (tag: <a></a>) */
    a.href = url_base64jp;
  });
  </script>
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