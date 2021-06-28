<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<div class="main-panel">          
  <div class="content-wrapper">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Admin Perpustakaan</p>
          <div class="table-responsive">
            <div class="table-wrapper">
              <div class="table-title">
                <!-- Flashdata berhasil ditambah -->
                  <?php
                    if(!empty(session()->getFlashdata('sukses'))) { ?>
                      <div class="alert alert-success alert-dismissible" role="alert">
                        <?php echo session()->getFlashdata('sukses');?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  <?php } ?>
                  <!-- Flashdata berhasil ditambah -->

                  <!-- Flashdata berhasil dihapus -->
                  <?php
                    if(!empty(session()->getFlashdata('hapus'))) { ?>
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <?php echo session()->getFlashdata('hapus');?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  <?php } ?>
                  <!-- Flashdata berhasil dihapus -->
                <div class="row">
                    <div class="col-sm-8">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn1 btn-success mb-2" data-toggle="modal" data-target="#addModal"> <i class="mdi mdi-account-plus menu-icon"></i> Tambah Admin</button>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
              </div>
              <table id="order-listing" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; foreach($admin as $a) { ?>
                    <tr>
                      <td class="text-center"> <?= $i++; ?> </td>
                      <td class="text-wrap text-center"> <?= $a['nama']; ?> </td>
                      <td class="text-center"> <?= $a['username']; ?> </td>
                      <td class="text-center"> <?= $a['email']; ?> </td>
                      <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <button type="button" class="btn btn-inverse-warning" title="Edit" data-toggle="modal" data-target="#editModal<?= $a['id']; ?>"><i class="mdi mdi-lead-pencil menu-icon"></i></button>
                          <button type="button" class="btn btn-inverse-danger" data-toggle="modal" data-target="#deleteModal<?= $a['id']; ?>"><i class="mdi mdi-trash-can menu-icon"></i></button>
                        </div>
                      </td>
                    </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>  
        </div>
      </div>
    </div>
  </div>

 <!-- Modal Add -->
<form action="<?= base_url('SAdmin/DataAdmin5/save'); ?>" method="post" class="needs-validation" novalidate>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Nama</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="nama" placeholder="Nama" required>
              <div class="invalid-feedback">
              Nama tidak boleh kosong
              </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Username</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <div class="invalid-feedback">
            Username tidak boleh kosong
            </div>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Email</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="email" placeholder="Email" required>
            <div class="invalid-feedback">
              Email tidak boleh kosong
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="password" placeholder="Password" id="passwd" required>
            <span class="mdi mdi-eye-off showpwd field-icon" onClick="showPwd('passwd', this)"></span>
            <div class="invalid-feedback">
              Password tidak boleh kosong
            </div>
          </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn1 btn-success">Tambah Admin</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- End Modal Add -->

<!-- Modal Edit -->
<?php $i = 1; foreach($admin as $a) { ?>
<form action="<?= base_url('SAdmin/DataAdmin5/edit/'.$a['id'])?>" method="post">
<div class="modal fade" id="editModal<?= $a['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="text" value="<?= $a['nama']; ?>" class="form-control" name="nama" placeholder="Nama">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Username</label>
          <div class="col-sm-8">
            <input type="text" value="<?= $a['username']; ?>" class="form-control" name="username" placeholder="Nama">
          </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
            <input type="text" value="<?= $a['email']; ?>" class="form-control" name="email" placeholder="Email">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
            <input type="password" class="form-control" name="password" placeholder="Password baru" id="passwd2">
            <span class="mdi mdi-eye-off showpwd2 field-icon" onClick="showPwd2('passwd2', this)"></span>
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



<!-- Delete Admin -->
<?php $i = 1; foreach($admin as $a) { ?>
<div class="modal fade" id="deleteModal<?= $a['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin untuk menghapus data ini?
      </div>
      <div class="modal-footer">
        <a href="<?= base_url('SAdmin/DataAdmin5/delete/'.$a['id']); ?>" type="button" class="btn1 btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
<?php }?>
<?= $this->endSection(); ?>       