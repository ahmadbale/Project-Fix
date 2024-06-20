<html lang="en">
<?php
$menu = 'biodata';
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="dist/img/polinema.png" type="image/png">
  <title>Survey Polinema | Biodata Responden</title>
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include_once('layouts/sidebar.php'); ?>
  
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Biodata Responden</h1>
          </div>
        </div>
      </div> <!-- Menambahkan penutupan div yang hilang -->
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title font-weight-bold">Biodata Anda</h3>
        </div>
        <div class="card-body">
          <form action="" method="get" id="formKategori" class="form-group col-6">
            <?php
            $kategori = "";
            if (isset($_GET['kategori'])):
            $kategori = $_GET['kategori'];
            ?>
            <label for="jenisResponden">Jenis Responden</label>
            <select class="custom-select" id="jenisResponden" name="kategori" onchange="submitForm()">
              <option selected value disabled>Pilih Jenis Responden</option>
              <option value="mahasiswa" <?php echo ($kategori == "mahasiswa") ? "selected" : ""; ?>>Mahasiswa</option>
              <option value="dosen" <?php echo ($kategori == "dosen") ? "selected" : ""; ?>>Dosen</option>
              <option value="industri" <?php echo ($kategori == "industri") ? "selected" : ""; ?>>Industri</option>
              <option value="tendik" <?php echo ($kategori == "tendik") ? "selected" : ""; ?>>Tenaga Pendidik</option>
              <option value="alumni" <?php echo ($kategori == "alumni") ? "selected" : ""; ?>>Alumni Mahasiswa</option>
              <option value="ortu" <?php echo ($kategori == "ortu") ? "selected" : ""; ?>>Orang Tua</option>
            </select>
            <?php
            else:
            ?>
            <label for="jenisResponden">Jenis Responden</label>
            <select class="custom-select" id="jenisResponden" name="kategori" onchange="submitForm()">
              <option selected value disabled>Pilih Jenis Responden</option>
              <option value="mahasiswa">Mahasiswa</option>
              <option value="dosen">Dosen</option>
              <option value="industri">Industri</option>
              <option value="tendik">Tenaga Pendidik</option>
              <option value="alumni">Alumni Mahasiswa</option>
              <option value="ortu">Orang Tua</option>
            </select>
            <?php
            endif;
            ?>
          </form>
          <div id="biodataContent">
            <?php
              if ($kategori == "mahasiswa"){
                include "components/biodata/mahasiswa.php";
              }else if($kategori == "dosen"){
                include "components/biodata/dosen.php";
              }else if($kategori == "industri"){
                include "components/biodata/industri.php";
              }else if($kategori == "tendik"){
                include "components/biodata/tendik.php";
              }else if($kategori == "alumni"){
                include "components/biodata/alumni.php";
              }else if($kategori == "ortu"){
                include "components/biodata/ortu.php";
              }
            ?>
          </div>
        </div>
      </div>

    </section>
  </div>


  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script>
  function loadBiodata() {
    var respondenType = document.getElementById("jenisResponden").value;
    var biodataContent = document.getElementById("biodataContent");
    if (respondenType !== "Pilih Jenis Responden") {
      $.ajax({
        url: 'components/biodata/' + respondenType + '.php',
        success: function(data) {
          biodataContent.innerHTML = data;
        }
      });
    } else {
      biodataContent.innerHTML = '';
    }
  }
  function submitForm() {
    document.getElementById("formKategori").submit();
  }
</script>
</body>
</html>
