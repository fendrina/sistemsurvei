<?= $this->extend('layout/templateUser'); ?>

<?= $this->section('content'); ?>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper-blue d-flex align-items-center auth">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4>Mulai Isi Survei Sekarang!</h4>
              <h6 class="font-weight-light ">Masuk Sebagai :</h6>
              <form class="pt-3">
                
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-medium font-weight-medium auth-form-btn" href="<?php echo site_url('/dosen')?>">DOSEN</a>
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-medium font-weight-medium auth-form-btn" href="<?php echo site_url('/tendik')?>">TENAGA PENDIDIKAN</a>
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-medium font-weight-medium auth-form-btn" href="<?php echo site_url('/mahasiswa')?>">MAHASISWA</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
<?= $this->endSection(); ?>