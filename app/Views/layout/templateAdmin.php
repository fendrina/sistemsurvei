<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/mdi/css/materialdesignicons.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/base/vendor.bundle.base.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/datatables.net-bs4/tablesurvei.css')?>">
 
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
  
  
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="/dashboard"><img src="<?php echo base_url('assets/images/svipb.png')?>"></a>
          <a class="navbar-brand brand-logo-mini" href="/dashboard"><img src="<?php echo base_url('assets/images/ipb.png')?>"></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item">
            <a class="btn1 btn-warning" href="<?php echo site_url('auth/logout') ?>"> Keluar</a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
      <!--Sidebar-->
      <?= $this->include('layout/sidebar_v');?>
      <!--Content-->
      <?= $this->renderSection('content'); ?>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
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
  <script src="<?php echo base_url('assets/js/chart.js')?>"></script>
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
            { extend: 'excel', text: 'Unduh', className: 'btn2 btn-success mdi mdi-download' },
        ],
      });

    $('#semester1').on('change', function () {
    tableHasil.columns(6).search( this.value).draw();
    } );

    $('#thnAjaran1').on('change', function () {
      tableHasil.columns(7).search( this.value).draw();
    } );

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

    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();

    function showPwd(id, el) {
      let x = document.getElementById(id);
      if (x.type === "password") {
        x.type = "text";
        el.className = 'mdi mdi-eye showpwd field-icon';
      } else {
        x.type = "password";
        el.className = 'mdi mdi-eye-off showpwd field-icon';
      }
    }

    function showPwd2(id, el) {
      let x = document.getElementById(id);
      if (x.type === "password") {
        x.type = "text";
        el.className = 'mdi mdi-eye showpwd2 field-icon';
      } else {
        x.type = "password";
        el.className = 'mdi mdi-eye-off showpwd2 field-icon';
      }
    }
  </script>


</body>

</html>