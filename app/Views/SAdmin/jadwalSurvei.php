<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<div class="main-panel">          
  <div class="content-wrapper">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Jadwal Survei</p>
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

                  <!-- Flashdata berhasil ditambah -->
                  <?php
                    if(!empty(session()->getFlashdata('hapus'))) { ?>
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <?php echo session()->getFlashdata('hapus');?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  <?php } ?>
                  <!-- Flashdata berhasil ditambah -->
                <div class="row">
                    <div class="col-sm-8">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn1 btn-success mb-2" data-toggle="modal" data-target="#exampleModal"> <i class="mdi mdi-alarm-plus menu-icon"></i> Tambah <?= $title; ?></button>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div>
              <table id="order-listing" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Semester</th>
                        <th>Tahun Ajaran</th>
                        <th>Mulai Survei</th>
                        <th>Akhir Survei</th>
                        <th class="text-wrap">Password Survei</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $i = 1; foreach($jadwal as $j) { ?>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td class="text-wrap"><?= $j['semester']; ?></td>
                        <td class="text-wrap"><?= $j['thn_ajaran']; ?></td>
                        <td class="text-wrap">
                        <?php
                        $newDate = date("d-m-Y", strtotime($j['tgl_mulai']));  
                        echo $newDate;  
                        ?></td>
                        <td class="text-wrap">
                        <?php
                        $newDate = date("d-m-Y", strtotime($j['tgl_akhir']));  
                        echo $newDate;  
                        ?></td>
                        </td>
                        <td class="text-wrap"><?= $j['pw_survei']; ?></td>
                        <td class="text-wrap"><?= $j['nama_kat']; ?></td>
                        <td class="text-center">
                        <button type="button" class="btn btn-inverse-warning" title="Ubah" data-toggle="modal" data-target="#editModal<?= $j['id_jadwal']; ?>"><i class="mdi mdi-lead-pencil menu-icon"></i></button>
                        <button type="button" class="btn btn-inverse-danger" title="Hapus"  data-toggle="modal" data-target="#deleteModal<?= $j['id_jadwal']; ?>"><i class="mdi mdi-trash-can menu-icon"></i></button>
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

<!--Modal Add Jadwal-->
<form action="<?= base_url('SAdmin/JadwalSurvei/save'); ?>" method="post" class="needs-validation" novalidate>
<?= csrf_field() ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <div class="form-group col-sm-6">
            <label>Semester</label>
              <select name="semester" class="form-control" required>
                  <option value="" selected disabled>-Pilih-</option>
                  <option value="Ganjil">Ganjil</option>
                  <option value="Genap">Genap</option>
              </select>
              <div class="invalid-feedback">
                Semester tidak boleh kosong
              </div>
          </div>
          <div class="form-group col-sm-6">
            <label>Tahun Ajaran</label>
            <input type="text" class="form-control" name="thn_ajaran" placeholder="contoh: 2020/2021" required>
            <div class="invalid-feedback">
              Tahun Ajaran tidak boleh kosong
            </div>
          </div>
        </div>
          
        <div class="form-group row">
          <div class="form-group col-sm-6">
            <label>Mulai Survei</label>
            <input type="date" class="form-control" name="tgl_mulai" placeholder="contoh: 2020/2021" required>
            <div class="invalid-feedback">
              Tanggal Mulai Survei tidak boleh kosong
            </div>
          </div>
          <div class="form-group col-sm-6">
            <label>Akhir Survei</label>
            <input type="date" class="form-control" name="tgl_akhir" placeholder="contoh: 2020/2021" required>
            <div class="invalid-feedback">
              Tanggal Akhir Survei tidak boleh kosong
            </div>
          </div>
        </div>
          
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Password Survei</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" name="pw_survei" placeholder="Password Survei" required>
              <div class="invalid-feedback">
              Password tidak boleh kosong
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Kategori</label>
          <div class="col-sm-8">
            <select name="id_kat[]" class="form-control" required>
                <option value="" selected disabled>-Pilih-</option>
                <?php foreach($kategori as $key => $value):?>
                <option value="<?= $value['id_kate'];?>"><?= $value['nama_kat'];?></option>
                <?php endforeach;?>
            </select>
            <div class="invalid-feedback">
              Kategori tidak boleh kosong
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn1 btn-success">Tambah Jadwal</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal Edit Jadwal-->
<?php foreach($jadwal as $j) { ?>
<form action="<?= base_url('SAdmin/JadwalSurvei/edit/'.$j['id_jadwal']); ?>" method="post">
<?= csrf_field() ?>
  <div class="modal fade" id="editModal<?= $j['id_jadwal']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $title; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
        <div class="form-group row">
          <div class="form-group col-sm-6">
            <label>Semester</label>
              <select name="semester" class="form-control" required>
              <option value="" selected disabled>-Pilih-</option>
                <?php foreach($semester as $key => $value):?>
                  <option value="<?= $value['semester'];?>"<?= $value['semester'] == $j['semester'] ? "selected" : null; ?>><?= $value['semester'];?></option>
                <?php endforeach;?>     
              </select>
              <div class="invalid-feedback">
                Kategori wajib dipilih!
              </div>
          </div>
          <div class="form-group col-sm-6">
            <label>Tahun Ajaran</label>
            <input type="text" class="form-control" value="<?= $j['thn_ajaran']; ?>" name="thn_ajaran" placeholder="contoh: 2020/2021" required>
          </div>
        </div>

        <div class="form-group row">
          <div class="form-group col-sm-6">
            <label>Mulai Survei</label>
            <input type="date" class="form-control" value="<?= $j['tgl_mulai']; ?>" name="tgl_mulai" placeholder="contoh: 2020/2021" required>
          </div>
          <div class="form-group col-sm-6">
            <label>Akhir Survei</label>
            <input type="date" class="form-control" value="<?= $j['tgl_akhir']; ?>" name="tgl_akhir" placeholder="contoh: 2020/2021" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Password Survei</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" value="<?= $j['pw_survei']; ?>" name="pw_survei" placeholder="Password Survei" required>
          </div>
        </div>

        <div class="form-group row" >
          <label class="col-sm-4 col-form-label">Kategori</label>
          <div class="col-sm-8">
            <select name="id_kat[]" class="form-control" required>
                <option value="" selected disabled>-Pilih-</option>
                <?php foreach($kategori as $key => $value):?>
                  <option value="<?= $value['id_kate'];?>"<?= $value['id_kate'] == $j['id_kat'] ? "selected" : null; ?>><?= $value['nama_kat'];?></option>
                <?php endforeach;?>
            </select>
            <div class="invalid-feedback">
              Kategori wajib dipilih!
            </div>
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
<!-- End Modal Edit Product-->    

<!-- modal delete -->
<?php foreach($jadwal as $j) { ?>
<div class="modal fade" id="deleteModal<?= $j['id_jadwal']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a href="<?= base_url('SAdmin/JadwalSurvei/delete/'.$j['id_jadwal']); ?>" type="button" class="btn1 btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
<?php }?> 

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
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
</script> 

<?= $this->endSection(); ?>        