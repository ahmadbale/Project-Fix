<?php
include("model/koneksi.php");
include("model/biodata_model.php");
include("model/survey_model.php");

$survey = new Survey($db);
$list_survey = $survey->getDataByKategori("tendik");
?>

<form action="survey-tendik.php" method="post">
  <div class="d-flex">
    <div class="form-group col-6">
      <label for="nipResponden">NIP</label>
      <input type="text" class="form-control" id="nipResponden" name="nopeg" aria-describedby="nipResponden">
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
  <button class="btn btn-primary" name="tendik" type="submit">Simpan</button>
</form>
