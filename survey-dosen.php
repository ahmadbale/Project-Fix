<?php
include "model/koneksi.php";
include "model/biodata_model.php";
include "model/survey_soal_model.php";
include "model/responden_model.php";

$biodata = new Biodata($db);
$kategori = true;
$bank_soal = new BankSoal($db);
$responden = new Responden($db);
$soal = [];
$status = false;

if(isset($_POST['dosen'])) {
  $kategori = false;
  $data = [
    "survey_id" => $_POST['survey'],
    "responden_nip" => $_POST['nip'],
    "responden_nama" => $_POST['nama'],
    "responden_unit" => $_POST['unit']
  ];

  $inserdata = $biodata->insertBiodata("dosen", $data);
$list_soal = $bank_soal->getDataBySurveyId($inserdata['survey_id']);
while ($row = $list_soal->fetch_assoc()){
  $row['id_responden'] = $inserdata['id_responden'];
  array_push($soal, $row);
}
}

$dataTemporary = [];

if (isset($_GET['submit'])) {
  $currentNumber = 1;
  $dataInput = [];

  foreach ($_GET as $key => $value) {
    if (preg_match('/^(.+?)_(\d+)$/', $key, $matches)) {
      $prefix = $matches[1];
      $number = $matches[2];

      if ($number == $currentNumber) {
        array_push($dataInput, [$prefix => $value]);
      } else if ($key == "submit") {
        return;
      } else {
        array_push($dataTemporary, $dataInput);
        $dataInput = [];
        $currentNumber = $number;
        array_push($dataInput, [$prefix => $value]);
      }
    }
  }
  array_push($dataTemporary, $dataInput);
  if($responden->insertData("dosen", $dataTemporary)){
    echo "<script>
alert('Data kamu berhasil kami simpan!');
              window.location = 'biodata.php?kategori=dosen';
</script>";
  }

  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="dist/img/polinema.png" type="image/png">
  <title>Survey Polinema | Dosen</title>

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <style>
    .icon-rate {
      cursor: pointer;
    }

    .icon-rate:hover {
      background: #007BFF;
      color: white;
      transition: 0.3s ease-in-out;
    }

    input[type="radio"]:checked ~ span{
      background: #0c84ff;
      color: white;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  

  <?php include_once('layouts/sidebar.php'); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Survey</h1>
          </div>
        </div>
      </div
    </section>
    <section class="content">
      <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title font-weight-bold">Form Survey Dosen</h3>
        </div>
        <?php
        if (isset($_GET['submit'])) {
          echo "<script>alert({$_GET})</script>";
          var_dump($_GET);
        }
        ?>
        <form action="" method="get" class="card-body">
          <?php
          $no = 1;
          foreach ($soal as $row):
            ?>
            <div>
              <p><?= $no . ". " . $row["soal_nama"] ?></p>
                  <input type="text" class="d-none" name="soal_id_<?= $no ?>" value="<?= $row['soal_id'] ?>">
                  <input type="text" class="d-none" name="responden_dosen_id_<?= $no ?>" value="<?= $row['id_responden'] ?>">
              <?php
              if ($row["soal_jenis"] == "rate"):
                ?>
                <div class="d-flex justify-content-center" style="column-gap: 12px">
                  <label for="jawaban_1_<?= $no ?>" class="d-flex flex-column align-items-center">
                    <input type="radio" class="d-none" name="jawaban_<?= $no ?>" id="jawaban_1_<?= $no ?>" value="tidak_puas">
              <span class="py-2 px-3 rounded border icon-rate">
                <i class="far fa-angry"></i>
              </span>
                    <small>Tidak Puas</small>
                  </label>
                  <label for="jawaban_2_<?= $no ?>" class="d-flex flex-column align-items-center">
                    <input type="radio" class="d-none" name="jawaban_<?= $no ?>" id="jawaban_2_<?= $no ?>" value="kurang_puas">
              <span class="py-2 px-3 rounded border icon-rate">
                <i class="far fa-frown"></i>
              </span>
                    <small>Kurang Puas</small>
                  </label>
                  <label for="jawaban_3_<?= $no ?>" class="d-flex flex-column align-items-center">
                    <input type="radio" class="d-none" name="jawaban_<?= $no ?>" id="jawaban_3_<?= $no ?>" value="cukup_puas">
              <span class="py-2 px-3 rounded border icon-rate">
                <i class="far fa-meh"></i>
              </span>
                    <small>Cukup Puas</small>
                  </label>
                  <label for="jawaban_4_<?= $no ?>" class="d-flex flex-column align-items-center">
                    <input type="radio" class="d-none" name="jawaban_<?= $no ?>" id="jawaban_4_<?= $no ?>" value="puas">
              <span class="py-2 px-3 rounded border icon-rate">
                <i class="far fa-grin"></i>
              </span>
                    <small>Puas</small>
                  </label>
                  <label for="jawaban_5_<?= $no ?>" class="d-flex flex-column align-items-center">
                    <input type="radio" class="d-none" name="jawaban_<?= $no ?>" id="jawaban_5_<?= $no ?>" value="sangat_puas">
              <span class="py-2 px-3 rounded border icon-rate">
                <i class="far fa-grin-beam"></i>
              </span>
                    <small>Sangat Puas</small>
                  </label>
                </div>
              <?php
              else:
                ?>
                <div class="form-group">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            name="jawaban_<?= $no ?>"></textarea>
                </div>
              <?php
              endif;
              ?>
              <hr>
            </div>
            <?php
            $no++;
          endforeach;
          ?>
          <button class="btn btn-primary" name="submit" type="submit">Kirim</button>
        </form>
      </div>
    </section>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<?php
if(!isset($_POST['dosen'])){
  echo "<script>
            Swal.fire({
              title: 'Oops!',
              text: 'Silahkan isi biodata kamu terlebih dahulu!',
              icon: 'warning',
              confirmButtonText: 'OK'
            }).then(function() {
              window.location = 'biodata.php?kategori=dosen';
            });
          </script>";
  exit();
}
?>
