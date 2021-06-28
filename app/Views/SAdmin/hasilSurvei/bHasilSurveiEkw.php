<?= $this->extend('layout/templateAdmin') ?>

<?= $this->section('content'); ?>
<div class="main-panel">          
  <div class="content-wrapper">
    <div class="card">
      <div class="card-body">
      <h6 class="">Filter Hasil Survei</h6>
        <div class="row">
          <div class="col-sm-7">
            <div class="row">

              <div class="col-sm-4">
                <select class="form-control" id="semester">
                    <option value="" selected>-Pilih-</option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                </select>
              </div>

              <div class="col-sm-4">
                <select id="thnAjaran" class="form-control">
                    <option value="" selected>-Pilih-</option>
                    <?php foreach($thn_ajaran as $key => $value):?>
                    <option value="<?= $value['thn_ajaran'];?>"><?= $value['thn_ajaran'];?></option>
                    <?php endforeach;?>
                </select>
              </div>
              <div class="col-sm-4">
                <select id="roleUser" class="form-control">
                    <option value="" selected>-Pilih-</option>
                    <option value="Dosen">Dosen</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                </select>
              </div>
              
            </div>
          </div>
          <div class="col-sm-5">
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-body">
        <p class="card-title"><?= $title; ?></p>
          <div class="table-responsive">
            <div class="table-wrapper">
              <table id="tableHasil" class="table table-striped table-hover table-bordered tableHasil">
                <thead>
                    <tr>
                      <th>No</th>
                        <th>Pertanyaan </th>
                        <th>SB</th>
                        <th>B</th>
                        <th>TB</th>
                        <th>STB</th>
                        <th class="text-wrap">User</th>
                        <th>Semester</th>
                        <th class="text-wrap">Tahun Ajaran</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $i = 1; foreach($hsl_survei as $p) { ?>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td class="text-wrap"> <?= $p['pertanyaan']; ?> </td>
                        <td class="text-center"><?= $p['sb']; ?></td>
                        <td class="text-center"><?= $p['b']; ?></td>
                        <td class="text-center"><?= $p['tb']; ?></td>
                        <td class="text-center"><?= $p['stb']; ?></td>
                        <td class="text-center"><?= $p['role']; ?></td>
                        <td class="text-center"><?= $p['semester']; ?></td>
                        <td class="text-center"><?= $p['thn_ajaran']; ?></td>
                    </tr>
                  <?php }?> 
                </tbody>
              </table>
            </div>
          </div>  
      </div>
    </div>
  </div>


<?= $this->endSection() ?>        