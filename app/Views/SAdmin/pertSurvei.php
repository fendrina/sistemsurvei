<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<div class="main-panel">          
  <div class="content-wrapper">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Daftar <?= $title; ?></p>
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
                    <button type="button" class="btn1 btn-success mb-2" data-toggle="modal" data-target="#addModal"> <i class="mdi mdi-library-plus"></i> Tambah <?= $title; ?></button>
                  </div>
                </div>
            </div>
              <table id="order-listing" class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Pertanyaan</th>
                          <th>Unit</th>
                          <th>Pengguna</th>
                          <th>kategori</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach($pertanyaan as $p) { ?>
                      <tr>
                          <td class="text-center"><?= $i++; ?></td>
                          <td class="text-wrap"><?= $p['pertanyaan']; ?></td>
                          <td class="text-wrap text-center"><?= $p['nama_unit']; ?></td>
                          <td class="text-center"><?= $p['pengguna']; ?></td>
                          <td class="text-center"><?= $p['nama_kat']; ?></td>
                          <td class="text-center">
                            <button type="button" class="btn btn-inverse-warning" title="Edit" data-toggle="modal" data-target="#editModal<?= $p['id_pert']; ?>"><i class="mdi mdi-lead-pencil menu-icon"></i></button>
                            <button type="button" class="btn btn-inverse-danger" title="Hapus"  data-toggle="modal" data-target="#deleteModal<?= $p['id_pert']; ?>"><i class="mdi mdi-trash-can menu-icon"></i></button>
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

<!-- Modal Add Product-->
<form action="<?= base_url('SAdmin/PertSurvei/save'); ?>" method="post" class="needs-validation" novalidate>
<?= csrf_field() ?>
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
          <label class="col-sm-4 col-form-label">Pertanyaan</label>
          <div class="col-sm-8">
          <textarea type="text" class="form-control" name="pertanyaan" id="validationCustom01" placeholder="Masukkan Pertanyaan" required autofocus rows="3"></textarea>
            <div class="invalid-feedback">
              Pertanyaan wajib diisi!
            </div>
          </div>
          
        </div>

        <div class="form-group row" >
          <label class="col-sm-4 col-form-label">Unit</label>
          <div class="col-sm-8">
            <select name="id_unit" class="form-control" required>
                <option value="" selected disabled>-Pilih-</option>
                <?php foreach($unit as $key => $value):?>
                <option value="<?= $value['id'];?>"><?= $value['nama_unit'];?></option>
                <?php endforeach;?>
            </select>
            <div class="invalid-feedback">
              Unit wajib dipilih!
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Pengguna</label>
          <div class="col-sm-8">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" name="pengguna[]" alt="Checkbox" value="Dosen" class="form-check-input" >
                Dosen
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" name="pengguna[]" alt="Checkbox" value="Tendik" class="form-check-input">
                Tenaga Pendidikan
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" name="pengguna[]" alt="Checkbox" value="Mahasiswa" class="form-check-input">
                Mahasiswa
              </label>
            </div>
          </div>
        </div>
        
        <div class="form-group row" >
          <label class="col-sm-4 col-form-label">Kategori</label>
          <div class="col-sm-8">
            <select name="id_kat" class="form-control" required>
                <option value="" selected disabled>-Pilih-</option>
                <?php foreach($kategori as $key => $value):?>
                <option value="<?= $value['id_kate'];?>"><?= $value['nama_kat'];?></option>
                <?php endforeach;?>
            </select>
            <div class="invalid-feedback">
              Kategori wajib dipilih!
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
          <button type="submit" name="tambah" class="btn1 btn-success">Tambah Pertanyaan</button>
      </div>
      </div>
    </div>
  </div>
</form>
<!-- End Modal Add Product-->     

<!-- Modal Edit Pertanyaan-->
<?php foreach($pertanyaan as $p) { ?>
<form action="<?= base_url('SAdmin/PertSurvei/edit/'.$p['id_pert']); ?>" method="post">
<?= csrf_field() ?>
  <div class="modal fade" id="editModal<?= $p['id_pert']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <label class="col-sm-4 col-form-label">Pertanyaan</label>
          <div class="col-sm-8">
          <textarea type="text" class="form-control" name="pertanyaan" id="validationCustom01" placeholder="Masukkan Pertanyaan" rows="3"><?php echo $p['pertanyaan'] ?> </textarea>
          </div>
          </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Unit</label>
          <div class="col-sm-8">
            <select name="id_unit" class="form-control">
                <option value="">-Pilih-</option>
                <?php foreach($unit as $key => $value):?>
                  <option value="<?= $value['id'];?>"<?= $value['id'] == $p['id_unit'] ? "selected" : null; ?>><?= $value['nama_unit'];?></option>
                <?php endforeach;?>
            </select>
          </div>
        </div>
      
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Pengguna</label>
          <div class="col-sm-8">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" name="pengguna[]" alt="Checkbox" value="Dosen" class="form-check-input" <?php if (in_array("Dosen", $p['pengguna_array'])) {echo "checked";}?>>
                Dosen
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" name="pengguna[]" alt="Checkbox" value="Tendik" class="form-check-input" <?php if (in_array("Tendik", $p['pengguna_array'])) {echo "checked";}?>>
                Tenaga Pendidikan
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" name="pengguna[]" alt="Checkbox" value="Mahasiswa" class="form-check-input" <?php if (in_array("Mahasiswa", $p['pengguna_array'])) {echo "checked";}?>>
                Mahasiswa
              </label>
            </div>
          </div>
        </div>

        <div class="form-group row" >
          <label class="col-sm-4 col-form-label">Kategori</label>
          <div class="col-sm-8">
            <select name="id_kat" class="form-control" required>
                <option value="" selected disabled>-Pilih-</option>
                <?php foreach($kategori as $key => $value):?>
                  <option value="<?= $value['id_kate'];?>"<?= $value['id_kate'] == $p['id_kat'] ? "selected" : null; ?>><?= $value['nama_kat'];?></option>
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


<!-- Delete Unit -->
<?php foreach($pertanyaan as $p) { ?>
<div class="modal fade" id="deleteModal<?= $p['id_pert']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span class="text-danger"> Jika pertanyaan dihapus akan mempengaruhi data pada hasil survei.</span> Apakah anda yakin untuk menghapus data ini?
      </div>
      <div class="modal-footer">
        <a href="<?= base_url('SAdmin/PertSurvei/delete/'.$p['id_pert']); ?>" type="button" class="btn1 btn-danger">Hapus</a>
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