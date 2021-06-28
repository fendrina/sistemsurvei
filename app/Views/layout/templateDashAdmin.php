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
        <!-- <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Sekolah Vokasi IPB 2021</span>
            
          </div>
        </footer>
        //partial 
      </div>
      //main-panel ends 
    </div>
    //page-body-wrapper ends 
  </div>
  //container-scroller 

  //plugins:js 
  <script src="</?php echo base_url('assets/vendors/base/vendor.bundle.base.js')?>"></script>
  // endinject 
  // Plugin js for this page
  <script src="</?php echo base_url('assets/vendors/chart.js/Chart.min.js')?>"></script>
  <script src="</?php echo base_url('assets/js/chart.js')?>"></script>
  <script src="</?php echo base_url('assets/vendors/datatables.net/jquery.dataTables.js')?>"></script>
  <script src="</?php echo base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')?>"></script>
  
  //End plugin js for this page
  //inject:js 
  <script src="</?php echo base_url('assets/js/off-canvas.js')?>"></script>
  <script src="</?php echo base_url('assets/js/hoverable-collapse.js')?>"></script>
  <script src="</?php echo base_url('assets/js/template.js')?>"></script>
 //endinject
  //Custom js for this page
  <script src="</?php echo base_url('assets/js/dashboard.js')?>"></script>
  <script src="</?php echo base_url('assets/js/data-table.js')?>"></script>
  <script src="</?php echo base_url('assets/js/jquery.dataTables.js')?>"></script>
  <script src="</?php echo base_url('assets/js/dataTables.bootstrap4.js')?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  //End custom js for this page
  <script src="</?php echo base_url('assets/js/jquery.cookie.js')?>" type="text/javascript"></script>

  
</body>

</html> -->


