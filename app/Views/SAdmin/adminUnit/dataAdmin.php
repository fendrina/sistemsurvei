<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<div class="main-panel">          
  <div class="content-wrapper">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-8">
          <p class="card-title">Daftar Admin</p>
          </div>
          <div class="col-sm-4 text-right">
          <button type="submit" name="tambah" class="btn1 btn-success mb-2" data-toggle="modal" data-target="#editModal">Ubah Super Admin</button>
          </div>
        </div>
        <!-- Flashdata berhasil diubah -->
        <?php
          if(!empty(session()->getFlashdata('sukses'))) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <?php echo session()->getFlashdata('sukses');?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        <?php } ?>
        <!-- Flashdata berhasil diubah -->
        <div class="table-responsive">
          <div class="table-wrapper">
            <table id="order-listing" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Unit</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; foreach($admin as $a) { ?>
                  <tr>
                    <td class="text-center"> <?= $i++; ?> </td>
                    <td class="text-wrap text-center"> <?= $a['nama']; ?> </td>
                    <td class="text-center"> <?= $a['username']; ?> </td>
                    <td class="text-center"> <?= $a['email']; ?> </td>
                    <td class="text-center"> <?= $a['description']; ?></td>
                  </tr>
                <?php }?>
              </tbody>
            </table>
          </div>  
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Edit -->
<?php $i = 1; foreach($admin as $a) { ?>
<form action="<?= base_url('SAdmin/DataAdmin/edit/'.$a['id'])?>" method="post">
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $a['nama']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Nama</label>
          <div class="col-sm-8">
            <input type="text" value="<?= $a['nama']; ?>" class="form-control" name="nama" placeholder="nama admin">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Username</label>
          <div class="col-sm-8">
            <input type="text" value="<?= $a['username']; ?>" class="form-control" name="username" placeholder="username admin">
          </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
            <input type="text" value="<?= $a['email']; ?>" class="form-control" name="email" placeholder="co: email@gmail.com">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" name="password" placeholder="Password">
            <small class="text-muted">
              Hanya digunakan jika lupa password
            </small>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn1 btn-success">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php }?>
<!-- End Modal Edit -->

<?= $this->endSection(); ?>       