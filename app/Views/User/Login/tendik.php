<?= $this->extend('layout/templateUser'); ?>

<?= $this->section('content'); ?>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper-blue d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4>Mulai Isi Survei Sekarang!</h4>
              <h6 class="font-weight-light"><?= $title; ?>:</h6>
              <form class="pt-3" action="<?= base_url('User/Tendik/masuk'); ?>" method="post">
                <div class="form-group">
                <p>
                    <?php if (!empty(session()->getFlashdata('gagal'))) { ?>
                        <div class="alert alert-danger">
                          <?php echo session()->getFlashdata('gagal') ?>
                        </div>
                    <?php } ?>
                  </p>
                  <input type="email" name="email_tendik" class="form-control <?= ($validation->hasError('email_tendik')) ? 'is-invalid' : '' ; ?>" id="exampleInputEmail1" placeholder="Alamat Surel" autofocus>
                    <div class="invalid-feedback">
                      <?= $validation->getError('email_tendik'); ?>
                    </div>
                </div>
                <div class="form-group">
                  <input type="password" name="pw_survei" class="form-control <?= ($validation->hasError('pw_survei')) ? 'is-invalid' : '' ; ?>" id="passwd" placeholder="Kata Sandi Survei">
                  <span class="mdi mdi-eye-off showpwd field-icon" onClick="showPwd('passwd', this)"></span>
                    <div class="invalid-feedback pwsurvei">
                      <?= $validation->getError('pw_survei'); ?>
                    </div>
                </div>
                <div class="mt-3">
                <button type="submit" name="masuk" class="btn btn-block btn-primary btn-medium font-weight-medium">Masuk</button>
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
  