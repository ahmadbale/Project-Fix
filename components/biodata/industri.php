<?php
include("model/koneksi.php");
include("model/biodata_model.php");
include("model/survey_model.php");

$survey = new Survey($db);
$list_survey = $survey->getDataByKategori("industri");
?>
<form action="survey-industri.php" method="post" id="form-tambah">
  <div class="d-flex">
    <div class="form-group col-6">
      <label for="namaResponden">Nama</label>
      <input type="text" class="form-control" id="namaResponden" name="nama" aria-describedby="namaResponden">
    </div>
    <div class="form-group col-6">
      <label for="jabatanResponden">Jabatan</label>
      <input type="text" class="form-control" id="jabatanResponden" name="jabatan" aria-describedby="jabatanResponden">
    </div>
  </div>
  <div class="d-flex">
    <div class="form-group col-6">
      <label for="perusahaanResponden">Perusahaan</label>
      <input type="text" class="form-control" id="perusahaanResponden" name="perusahaan" aria-describedby="perusahaanResponden">
    </div>
    <div class="form-group col-6">
      <label for="emailResponden">Email</label>
      <input type="email" class="form-control" id="emailResponden" name="email" aria-describedby="emailResponden">
    </div>
  </div>
  <div class="d-flex">
    <div class="form-group col-6">
      <label for="noHPResponden">No HP</label>
      <input type="text" class="form-control" id="noHPResponden" name="hp" aria-describedby="noHPResponden">
    </div>
    <div class="form-group col-6">
      <label for="kotaResponden">Kota</label>
      <input type="text" class="form-control" id="kotaResponden" name="kota" aria-describedby="kotaResponden">
    </div>
  </div>
  <div class="d-flex">
    <div class="form-group col-6">
      <label for="surveyResponden">Pilihan Survey</label>
      <select class="custom-select" id="surveyResponden" name="survey">
        <option selected value disabled>Pilih Jenis Survey</option>
        <?php
        foreach ($list_survey as $item):
          ?>
          <option value="<?= $item['survey_id'] ?>"><?= $item['survey_nama'] ?></option>]
        <?php
        endforeach;
        ?>
      </select>
    </div>
  </div>
  <button class="btn btn-primary" name="industri" type="submit" >Simpan</button>
</form>

<!-- 
<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupModalLabel"><strong>Peringatan<strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="popupMessage">Harap Lengkapi Semua Inputan!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
  function showPopup(message) {
    $('#popupMessage').text(message);
    $('#popupModal').modal('show');
  }
</script>

<script>
  function validateForm(event) {
    event.preventDefault(); // Mencegah formulir dikirim secara default

    var nama = $('#namaResponden').val();
    var jabatan = $('#jabatanResponden').val();
    var perusahaan = $('#perusahaanResponden').val();
    var email = $('#emailResponden').val();
    var hp = $('#noHPResponden').val();
    var kota = $('#kotaResponden').val();
    var survey = $('#surveyResponden').val();

    if (nama == '' || jabatan == '' || perusahaan == '' || email == '' || hp == '' || kota == '' || survey == null) {
      showPopup('Harap lengkapi semua inputan!');
    } else {
      $('#form-tambah').off('submit').submit(); // Mengaktifkan pengiriman formulir jika semua input telah diisi
    }
  }

  function showPopup(message) {
    $('#popupMessage').text(message);
    $('#popupModal').modal('show');
  }
</script> -->

