<?php
include("model/koneksi.php");
include("model/biodata_model.php");
include("model/survey_model.php");

$survey = new Survey($db);
$list_survey = $survey->getDataByKategori("alumni");
?>

<form action="survey-alumni.php" method="post"  id="form-tambah">
  <div class="d-flex">
    <div class="form-group col-6">
      <label for="idResponden">NIM</label>
      <input type="text" class="form-control" id="idResponden" name="nim" aria-describedby="idResponden">
    </div>
    <div class="form-group col-6">
      <label for="namaResponden">Nama</label>
      <input type="text" class="form-control" id="namaResponden" name="nama" aria-describedby="namaResponden">
    </div>
  </div>
  <div class="d-flex">
    <div class="form-group col-6">
      <label for="prodiResponden">Prodi</label>
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
      <label for="emailResponden">Email</label>
      <input type="email" class="form-control" id="emailResponden" name="email" aria-describedby="emailResponden">
    </div>
  </div>
  <div class="d-flex">
    <div class="form-group col-6">
      <label for="hpResponden">No HP</label>
      <input type="text" class="form-control" id="hpResponden" name="hp" aria-describedby="hpResponden">
    </div>
    <div class="form-group col-6">
      <label for="tanggalResponden">Tahun Lulus</label>
      <input type="text" class="form-control" id="tanggalResponden" name="tahun_lulus" aria-describedby="tahun_lulus">
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
  <button class="btn btn-primary" name="alumni" type="submit" onclick="validateForm(event)">Simpan</button>
</form>
<!-- <div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
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

    var nim = $('#idResponden').val();
    var nama = $('#namaResponden').val();
    var prodi = $('#surveyResponden').val();
    var email = $('#emailResponden').val();
    var hp = $('#hpResponden').val();
    var tahun_lulus = $('#tanggalResponden').val();
    var survey = $('#surveyResponden').val();

    if (nim == '' || nama == '' || prodi == '' || email == '' || hp == '' || tahun_lulus == '' || survey == '') {
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
