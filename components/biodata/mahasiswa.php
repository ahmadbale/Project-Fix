<?php
include("model/koneksi.php");
include("model/biodata_model.php");
include("model/survey_model.php");

$survey = new Survey($db);
$list_survey = $survey->getDataByKategori("mahasiswa");
?>

<form action="survey-mahasiswa.php" method="post" id="form-tambah">
  <div class="d-flex">
    <div class="form-group col-6">
      <label for="idResponden">NIM</label>
      <input type="text" class="form-control" id="idResponden" name="nim" aria-describedby="nim">
    </div>
    <div class="form-group col-6">
      <label for="namaResponden">Nama</label>
      <input type="text" class="form-control" id="namaResponden" name="nama" aria-describedby="nama">
    </div>
  </div>
  <div class="d-flex">
    <div class="form-group col-6">
      <label for="nipResponden">Prodi</label>
       <select class="custom-select" name="prodi" id="surveyResponden">
      <option selected>Pilih Prodi</option>
        <option value="D3-Teknik Elektronika">D3-Teknik Elektronika</option>
        <option value="D3-Teknik Telekomunikasi">D3-Teknik Telekomunikasi</option>
        <option value="D3-Teknik Listrik">D3-Teknik Listrik</option>
        <option value="D3-Teknik Kimia">D3-Teknik Kimia</option>
        <option value="D3-Teknik Mesin">D3-Teknik Mesin</option>
        <option value="D3-Teknik Pemeiliharaan Pesawat Udara">D3-Teknik Pemeliharaan Pesawat Udara</option>
        <option value="D3-Teknik Sipil">D3-Teknik Sipil</option>
        <option value="D3-Teknik Pertambangan">D3-Teknik Pertambangan</option>
        <option value="D3-Teknik Konstruksi Jalan, Jembatan, dan Bangunan Air">D3-Teknik Konstruksi Jalan, Jembatan, dan Bangunan Air</option>
        <option value="D3-Akuntansi">D3-Akuntansi</option>
        <option value="D3-Administrasi Bisnis">D3-Administrasi Bisnis</option>
        <option value="D4-Teknik Informatika">D4-Teknik Informatika</option>
        <option value="D4-Sistem Informasi Bisnis">D4-Sistem Informasi Bisnis</option>
        <option value="D4-Teknik Elektronika">D4-Teknik Elektronika</option>
        <option value="D4-Sistem Kelistrikan">D4-Sistem Kelistrikan</option>
        <option value="D4-Jaringan Telekomunikasi Digital">D4-Jaringan Telekomunikasi Digital</option>
        <option value="D4-Teknologi Kimia Industri">D4-Teknologi Kimia Industri</option>
        <option value="D4-Teknik Otomotif Elektronik">D4-Teknik Otomotif Elektronik</option>
        <option value="D4-Teknik Mesin Produksi dan Perawatan">D4-Teknik Mesin Produksi dan Perawatan</option>
        <option value="D4-Manajemen Rekayasa Konstruksi">D4-Manajemen Rekayasa Konstruksi</option>
        <option value="D4-Manajemen Rekayasa Konstruksi">D4-Teknologi Rekayasa Konstruksi Jalan dan Jembatan</option>
        <option value="D4-Akuntansi Manajemen">D4-Akuntansi Manajemen</option>
        <option value="D4-Keuangan">D4-Keuangan</option>
        <option value="D4-Manajemen Pemasaran">D4-Manajemen Pemasaran</option>
        <option value="D4-Pengelolaan Arsip Dan Rekaman Informasi">D4-Pengelolaan Arsip Dan Rekaman Informasi</option>
        <option value="D4-Usaha Perjalanan Wisata">D4-Usaha Perjalanan Wisata</option>
        <option value="D4-Bahasa Inggris Untuk Komunikasi Bisnis Dan Profesional">D4-Bahasa Inggris Untuk Komunikasi Bisnis Dan Profesional</option>
        <option value="D4-Bahasa Inggris Untuk Industri Pariwisata">D4-Bahasa Inggris Untuk Industri Pariwisata</option>
      </select>
    </div>
    <div class="form-group col-6">
      <label for="nipResponden">Email</label>
      <input type="email" class="form-control" id="nipResponden" name="email" aria-describedby="email">
    </div>
  </div>
  <div class="d-flex">
    <div class="form-group col-6">
      <label for="unitResponden">No HP</label>
      <input type="text" class="form-control" id="unitResponden" name="hp" aria-describedby="hp">
    </div>
    <div class="form-group col-6">
      <label for="tanggalResponden">Tahun Masuk</label>
      <input type="text" class="form-control" id="tanggalResponden" name="tahun_masuk" aria-describedby="tahun_masuk">
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
  <button class="btn btn-primary" name="mahasiswa" type="submit">Simpan</button>
</form>


