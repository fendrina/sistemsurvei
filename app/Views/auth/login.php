<!DOCTYPE html>
<html lang="id">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Survei Kepuasan Sekolah Vokasi IPB</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/mdi/css/materialdesignicons.min.css')?> ">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/base/vendor.bundle.base.css')?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />
</head>

<body>
<div class="container-scroller">
    <div class="brand-logo-admin">
      <img src="<?php echo base_url('assets/images/svipb.png')?>">
    </div>
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      
      <div class="content-wrapper d-flex align-items-center auth px-0">
        
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h3 class="text-center">Survei Kepuasan Sekolah Vokasi IPB</h3>
              <div id="infoMessage"><?php echo $message;?></div>
              
              <?php echo form_open('auth/login');?>
                <div class="form-group">
                  <h6>Nama Pengguna</h6> <input type="text" class="form-control form-control-lg <?= ($validation->hasError('identity')) ? 
                  'is-invalid' : ''; ?>" id="identity" placeholder="Masukkan nama pengguna anda" name="identity" autofocus>
                  <div class="invalid-feedback">
                    <?= $validation->getError('identity'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <h6>Kata Sandi</h6> <input type="password" class="form-control form-control-lg <?= ($validation->hasError('password')) ? 
                  'is-invalid' : ''; ?>" id="passwd" placeholder="Masukkan kata sandi anda" name="password">
                  <span class="mdi mdi-eye-off showpwd field-icon-lg" onClick="showPwd('passwd', this)"></span>
                  <div class="invalid-feedback pwsurvei">
                    <?= $validation->getError('password'); ?>
                  </div>
                </div>
                <div class="mt-3">
                  <button  class="btn btn-block btn-primary btn-medium font-weight-medium auth-form-btn" type="submit">Masuk</button>
                </div>
              <?php echo form_close();?>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url('assets/vendors/base/vendor.bundle.base.js')?>"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url('assets/js/off-canvas.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/hoverable-collapse.js')?>"></script>
  <script src="<?php echo base_url('assets/js/template.js')?>"></script>
  <!-- endinject -->
  <script>
  function showPwd(id, el) {
    let x = document.getElementById(id);
    if (x.type === "password") {
      x.type = "text";
      el.className = 'mdi mdi-eye showpwd field-icon-lg';
    } else {
      x.type = "password";
      el.className = 'mdi mdi-eye-off showpwd field-icon-lg';
    }
  }
</script>
</body>

</html>


