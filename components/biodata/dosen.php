<?php
include("model/koneksi.php");
include("model/biodata_model.php");
include("model/survey_model.php");

$survey = new Survey($db);
$list_survey = $survey->getDataByKategori("dosen");
?>

<form action="survey-dosen.php" method="post" id="form-tambah-dosen">
  <div class="d-flex">
    <div class="form-group col-6">
      <label for="nipResponden">NIP</label>
      <input type="text" class="form-control" id="nipResponden" name="nip" aria-describedby="nipResponden">
    </div>
    <div class="form-group col-6">
      <label for="namaResponden">Nama</label>
      <input type="text" class="form-control" id="namaResponden" name="nama" aria-describedby="namaResponden">
    </div>
  </div>
  <div class="d-flex">
    <div class="form-group col-6">
      <label for="unitResponden">Unit</label>
      <input type="text" class="form-control" id="unitResponden" name="unit" aria-describedby="unitResponden">
    </div>
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
  <button class="btn btn-primary" name="dosen" type="submit" onclick="validateForm(event)">Simpan</button>
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

    var nip = $('#nipResponden').val();
    var nama = $('#namaResponden').val();
    var unit = $('#unitResponden').val();
    var survey = $('#surveyResponden').val();

    if (nip == '' || nama == '' || unit == '' || survey == null) {
      event.preventDefault(); // Mencegah formulir dikirim jika ada input yang kosong
      showPopup('Harap lengkapi semua inputan!');
    } else {
      $('#form-tambah').off('submit').submit(); // Mengaktifkan pengiriman formulir jika semua input telah diisi
    }
  }

  function showPopup(message) {
    $('#popupMessage').text(message);
    $('#popupModal').modal('show');
  }
</script>
 -->
