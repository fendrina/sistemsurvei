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

  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />
  <!-- endinject -->
</head>
    <?= $this->renderSection('content'); ?>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <!-- endinject -->
  <!-- inject:js -->
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <!-- End custom js for this page-->
  <script src="<?php echo base_url('assets/js/jquery.cookie.js')?>" type="text/javascript"></script>
  <!-- endinject -->
  <script>
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
</script>
</body>

</html>
