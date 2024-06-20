
<?php
include("model/koneksi.php");
include("model/biodata_model.php");
include("model/survey_model.php");

$survey = new Survey($db);
$list_survey = $survey->getDataByKategori("ortu");
?>

<form action="survey-ortu.php" method="post">
<div class="d-flex">
    <div class="form-group col-6">
      <label for="idResponden">Nama</label>
      <input type="text" class="form-control" id="idResponden" name="nama" aria-describedby="idResponden">
    </div>
    <div class="form-group col-6">
      <label for="jkResponden">Jenis Kelamin</label>
       <select class="custom-select" id="jkResponden" name="jk">
      <option selected>Pilih Kelamin</option>
      <option value="L">Laki - Laki</option>
      <option value="P">Perempuan</option>
      </select>
    </div>
</div>
<div class="d-flex">
    <div class="form-group col-6">
      <label for="idResponden">Umur</label>
      <input type="text" class="form-control" id="umurResponden" name="umur" aria-describedby="umurResponden">
    </div>
    <div class="form-group col-6">
      <label for="noHp">No HP</label>
      <input type="text" class="form-control" id="noHp" name="hp" aria-describedby="unitResponden">
    </div>
</div>

  <div class="d-flex">
    <div class="form-group col-6">
      <label for="namaResponden">Pekerjaan</label>
       <select class="custom-select" id="surveyResponden" name="pekerjaan">
      <option selected>Pilih Pekerjaan</option>
      <option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>
      <option value="Pensiunan">Pensiunan</option>
      <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
      <option value="Tentara Nasional indonesia">Tentara Nasional Indonesia</option>
      <option value="Petani/Pekebun">Petani/Pekebun</option>
      <option value="Nelayan">Nelayan</option>
      <option value="Dewan Perwakilan Rakyat">Dewan Perwakilan Rakyat</option>
      <option value="Gubernur">Gubernur</option>
      <option value="Wakil Gubernur">Wakil Gubernur</option>
      <option value="Bupati/Walikota">Bupati/Walikota</option>
      <option value="Wakil Bupati/Walikota">Wakil Bupati/Walikota</option>
      <option value="Wiraswasta">Wiraswasta</option>
      <option value="Polisi">Polisi</option>
      </select>
    </div>
    <div class="form-group col-6">
      <label for="namaResponden">Tingkat Pendidikan</label>
       <select class="custom-select" id="surveyResponden" name="pendidikan">
      <option selected>Pilih Pendidikan</option>
      <option value="SD/MI">SD/MI</option>
      <option value="SD/MI">SMP/MTs</option>
      <option value="SMA/MA/SMK">SMA/MA/SMK</option>
      <option value="Diploma I">Diploma I</option>
      <option value="Diploma II">Diploma II</option>
      <option value="Diploma III">Diploma III</option>
      <option value="Sarjana/Diploma IV">Sarjana/Diploma IV</option>
      <option value="Magister">Magister</option>
      <option value="Doktor">Doktor</option>
      </select>
    </div>
</div>

<div class="d-flex">
<div class="form-group col-6">
      <label for="namaResponden">Penghasilan</label>
       <select class="custom-select" id="surveyResponden" name="penghasilan">
      <option selected>Pilih Penghasilan</option>
      <option value="Kurang dari 2,5 Juta">Kurang dari 2,5 Juta</option>
      <option value="2,5 - 5 Juta">2,5 - 5 Juta</option>
      <option value="5 - 10 Juta">5 - 10 Juta</option>
      <option value="Lebih dari 10 Juta">Lebih dari 10 Juta</option>
      </select>
    </div>
    <div class="form-group col-6">
      <label for="namaResponden">NIM Mahasiswa</label>
      <input type="NIM" class="form-control" id="namaResponden" name="nim" aria-describedby="tanggalResponden">
    </div>
  </div>

  <div class="d-flex">
  <div class="form-group col-6">
      <label for="namaResponden">Nama Mahasiswa</label>
      <input type="NIM" class="form-control" id="namaResponden" name="namaMHS" aria-describedby="tanggalResponden">
    </div>
  <div class="form-group col-6">
      <label for="nipResponden">Prodi Mahasiswa</label>
       <select class="custom-select" id="surveyResponden" name="prodi">
      <option selected>Pilih Prodi Mahasiswa</option>
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
  <button class="btn btn-primary" name="ortu" type="submit">Simpan</button>
</form>
