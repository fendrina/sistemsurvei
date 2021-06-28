<?= $this->extend('layout/templateUser'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper-blue">
  <div class="row">
      <div class="grid-margin stretch-card">
        <div class="card" >
          
        </div>
      </div>
    </div>
    <div class="card" style="border-radius: 20px;">
      <div class="card-body" >
        <h5 class="card-title text-center">SELAMAT DATANG DI PENGISIAN SURVEI KEPUASAAN</h5>
        <h5 class="card-title text-center">SEKOLAH VOKASI IPB</h5>
        <h6 class="text-center">Ketentuan penilaian:</h6>
        <p class="text-center">SB = Sangat Baik | B = Baik | TB = Tidak Baik | STB = Sangat Tidak Baik</p>
      </div>
      <div class="card-body">
        <form class="pt-3" action="<?= base_url('User/Mahasiswa_s/simpanSurvei'); ?>" method="post">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" class="pil">No</th>
                  <th scope="col" class="pert" >Pertanyaan</th>
                  <th scope="col" class="pil">STB</th>
                  <th scope="col" class="pil">TB</th>
                  <th scope="col" class="pil">B</th>
                  <th scope="col" class="pil">SB</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php $i = 1; foreach($pertanyaan as $p) { ?>
                  <input type='hidden' name='id_pert[]' value="<?= $p['id_pert'] ?>" />
                  <input type='hidden' name='id_jadwal[]' value="<?= $jadwal->id_jadwal ?>" />
                  <td class="text-center" scope="row"><?= $i++; ?></th>
                  <td class="text-wrap"><?= $p['pertanyaan']; ?></td>
                  <td class="text-center">
                    <div class="custom-radio custom-control">
                      <input type="radio" id="exampleCustomRadio4<?=$i?>" name="opsi[<?=$i?>]" value="1" class="custom-control-input" required>
                      <label class="custom-control-label" for="exampleCustomRadio4<?=$i?>"></label>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="custom-radio custom-control">
                      <input type="radio" id="exampleCustomRadio3<?=$i?>" name="opsi[<?=$i?>]" value="2" class="custom-control-input" required>
                      <label class="custom-control-label" for="exampleCustomRadio3<?=$i?>"></label>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="custom-radio custom-control ">
                      <input type="radio" id="exampleCustomRadio2<?=$i?>" name="opsi[<?=$i?>]" value="3" class="custom-control-input" required>
                      <label class="custom-control-label" for="exampleCustomRadio2<?=$i?>"></label>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="custom-radio custom-control">
                        <input type="radio" id="exampleCustomRadio1<?=$i?>" name="opsi[<?=$i?>]" value="4" class="custom-control-input" required>
                        <label class="custom-control-label" for="exampleCustomRadio1<?=$i?>"></label>
                    </div>
                  </td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-sm-10">
              
            </div>
            <div class="col-sm-2 text-center">
              <button type="submit" class="btn1 btn-success" >Selesai</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>