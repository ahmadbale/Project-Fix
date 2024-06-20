<?php

include "model/koneksi.php";
include "model/survey_model.php";
include "model/survey_soal_model.php";
include "model/kategori_model.php";

$survey = new Survey($db);
$list_soal = new BankSoal($db);
$kategori = new Kategori($db);
$list_kategori = $kategori->getData();
$list_survey = $survey->getDataByKategori("mahasiswa");

session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}
$menu = 'leaderboard';
$data_kategori = [];
while($row = $list_kategori->fetch_assoc()){
  array_push($data_kategori, $row);
}

if (isset($_POST['create'])) {
  $data = [
    "user_id" => $_SESSION['user_id'],
    "survey_jenis" => "mahasiswa",
    "survey_kode" => $_POST['survey_kode'],
    "survey_nama" => $_POST['survey_nama'],
    "survey_deskripsi" => $_POST['survey_deskripsi'],
  ];

  if ($survey->createDataSurvey($data)) {
    echo "<script>
          alert('Data berhasil ditambahkan!');
          window.location.href = 'leaderboard-mahasiswa.php';
          </script>";
  }
}

if (isset($_POST['update'])) {
  $data = [
    "survey_id" => $_POST['survey_id'],
    "survey_kode" => $_POST['survey_kode'],
    "survey_nama" => $_POST['survey_nama'],
    "survey_deskripsi" => $_POST['survey_deskripsi'],
  ];

  if ($survey->editSurveyById($data)) {
    echo "<script>
          alert('Data berhasil diupdate!');
          window.location.href = 'leaderboard-mahasiswa.php';
          </script>";
  }
}

if(isset($_GET['delete'])){
  if($survey->deleteDataById($_GET['delete'])){
    echo "<script>
          alert('Data berhasil dihapus!');
          window.location.href = 'leaderboard-mahasiswa.php';
          </script>";
  }
}

if (isset($_POST['tambah-soal'])) {
  $data = [
    "soal_id" => $_POST['soal_id'],
    "survey_id" => $_POST['survey_id'],
    "kategori_id" => $_POST['kategori_id'],
    "no_urut" => $_POST['no_urut'],
    "soal_jenis" => $_POST['editsoal_jenis'],
    "soal_nama" => $_POST['soal_nama'],
  ];

  if ($list_soal->insertData($data)) {
    echo "<script>
          alert('Data berhasil ditambahkan!');
          window.location.href = 'leaderboard-mahasiswa.php';
          </script>";
  }
}

if (isset($_POST['update-soal'])) {
  $data = [
    "soal_id" => $_POST['soal_id'],
    "kategori_id" => $_POST['kategori_id'],
    "no_urut" => $_POST['no_urut'],
    "soal_jenis" => $_POST['editsoal_jenis'],
    "soal_nama" => $_POST['soal_nama'],
  ];

  if ($list_soal->updateData($data)) {
    echo "<script>
          alert('Data berhasil diupdate!');
          window.location.href = 'leaderboard-mahasiswa.php';
          </script>";
  }
}

if(isset($_GET['delete-soal'])){
  if($list_soal->deleteData($_GET['delete-soal'])){
    echo "<script>
          alert('Data berhasil dihapus!');
          window.location.href = 'leaderboard-mahasiswa.php';
          </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Survey Polinema | Mahasiswa</title>
  <link rel="icon" href="dist/img/polinema.png" type="image/png">
  
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    .survey-title {
      cursor: pointer;
    }

    .survey-items {
      display: none;
    }

    .survey-items.show {
      display: block;
    }

    .btn-custom {
      padding: 2px 6px !important;
      font-size: 14px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">

<!--Add Survey-->
<div class="modal fade" id="addSurvey" tabindex="-1" role="dialog" aria-labelledby="addSurveyLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSurveyLabel">Tambah Survey</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="form-group">
            <label for="kode">Kode Survey</label>
            <input type="text" class="form-control" id="kode" name="survey_kode" required>
          </div>
          <div class="form-group">
            <label for="name">Nama Survey</label>
            <input type="text" class="form-control" id="name" name="survey_nama" required>
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi Survey</label>
            <textarea class="form-control" id="deskripsi" name="survey_deskripsi" rows="2" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="create">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Edit Survey-->
<div class="modal fade" id="editSurvey" tabindex="-1" role="dialog" aria-labelledby="editSurveyLabel"
     aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editSurveyLabel">Edit Survey</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="form-group">
            <label for="edit-kode">Kode Survey</label>
            <input type="text" class="form-control" id="edit-kode" name="survey_kode" required>
          </div>
          <div class="form-group">
            <label for="edit-name">Nama Survey</label>
            <input type="text" class="form-control" id="edit-name" name="survey_nama" required>
          </div>
          <div class="form-group">
            <label for="edit-deskripsi">Deskripsi Survey</label>
            <textarea class="form-control" id="edit-deskripsi" name="survey_deskripsi" rows="2" required></textarea>
          </div>
          <input type="hidden" id="edit-id" name="survey_id">
          <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Soal -->
<div class="modal fade" id="editSoal" tabindex="-1" role="dialog" aria-labelledby="editSoalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editSoalLabel">Edit Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="form-group">
            <label for="editkategori_soal">Kategori Soal</label>
            <select class="custom-select" id="editkategori_soal" name="kategori_id">
              <option selected disabled>Pilih Kategori Soal</option>
              <?php foreach($data_kategori as $row): ?>
                <option value="<?= $row['kategori_id'] ?>">
                  <?= $row['kategori_nama'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="editno-urut">Nomor Urut</label>
            <input type="text" class="form-control" id="editno-urut" name="no_urut" required>
          </div>
          <div class="form-group">
            <label>Jenis Soal</label>
            <div class="d-flex" style="gap: 8px;">
              <div>
                <input type="radio" id="rate" name="editsoal_jenis" value="rate">
                <label for="rate">Rate</label>
              </div>
              <div>
                <input type="radio" id="essai" name="editsoal_jenis" value="esai">
                <label for="essai">Essai</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="editnama-soal">Nama Soal</label>
            <input type="text" class="form-control" id="editnama-soal" name="soal_nama" required>
          </div>
          <input type="hidden" id="editsoal-id" name="soal_id">
          <button type="submit" class="btn btn-primary" name="update-soal">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Tambah Soal-->
<div class="modal fade" id="tambahSoal" tabindex="-1" role="dialog" aria-labelledby="tambahSoalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahSoalLabel">Tambah Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="form-group">
            <label for="editkategori_soal">Kategori Soal</label>
            <select class="custom-select" id="editkategori_soal" name="kategori_id">
              <option selected disabled>Pilih Kategori Soal</option>
              <?php foreach($data_kategori as $row): ?>
                <option value="<?= $row['kategori_id'] ?>">
                  <?= $row['kategori_nama'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="jenis_survey">Jenis Survey</label>
            <select class="custom-select" id="jenis_survey" name="survey_id">
              <option selected disabled>Pilih Jenis Survey</option>
              <?php
              foreach ($list_survey as $survey):
              ?>
                <option value="<?= $survey['survey_id'] ?>">
                  <?= $survey['survey_nama'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="editno-urut">Nomor Urut</label>
            <input type="text" class="form-control" id="editno-urut" name="no_urut" required>
          </div>
          <div class="form-group">
            <label>Jenis Soal</label>
            <div class="d-flex" style="gap: 8px;">
              <div>
                <input type="radio" id="rate" name="editsoal_jenis" value="rate">
                <label for="rate">Rate</label>
              </div>
              <div>
                <input type="radio" id="essai" name="editsoal_jenis" value="esai">
                <label for="essai">Essai</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="editnama-soal">Nama Soal</label>
            <input type="text" class="form-control" id="editnama-soal" name="soal_nama" required>
          </div>
          <input type="hidden" id="editsoal-id" name="soal_id">
          <button type="submit" class="btn btn-primary" name="tambah-soal">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="wrapper">
  <?php include_once('layouts/header.php'); ?>
  <?php include_once('layouts/sidebar.php'); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leaderboard Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="leaderboard.php">Leaderboard</a></li>
              <li class="breadcrumb-item active">Leaderboard Mahasiswa</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title font-weight-bold">Survey</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addSurvey">Tambah
              Survey
            </button>
          </div>
        </div>
        <div class="card-body">
          <?php
          foreach ($list_survey as $survey):
            ?>
            <div>
            <div class="d-flex justify-content-between align-items-center survey-title">
                <!-- <div class="d-flex align-items-center justify-content-center"> -->
                  <p class="font-weight-bold"><?= $survey['survey_nama'] ?></p>
                  <div class="d-flex align-items-center">
                  <div class="dropdown">
                  <button type="button" id="dropdownMenuButton" class="btn-icon edit-survey" style="border: none; outline: none;">
                    <i class="fas fa-angle-left right" id="icon" ></i>
                  </button>
                  <!-- <div class="dropdown"> -->
                    <button type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: none; padding: 1px; background-color: none;">
                      <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editSurvey"
                          data-id="<?= $survey['survey_id']; ?>" data-name="<?= $survey['survey_nama']; ?>"
                          data-kode="<?= $survey['survey_kode'] ?>" data-deskripsi="<?= $survey['survey_deskripsi'] ?>" >
                          <i class="fas fa-pen text-info" style="margin-right: 6px;"></i>
                        Edit
                      </a>
                      <a class="dropdown-item" href="?delete=<?= $survey['survey_id'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">
                      <i class="fas fa-trash-alt text-danger"></i>
                        Hapus
                      </a>
                   </div>
                   </div>
                  <!-- <i class="fas fa-angle-left right" id="icon"></i> -->
                  </div>
                <!-- <i class="fas fa-angle-left right" id="icon"></i> -->
                </div>
      
              <ul class="survey-items">
                <?php
                foreach ($list_soal->getDataBySurveyId($survey['survey_id']) as $soal):
                  ?>
                  <li>
                    <p><?= $soal['soal_nama']; ?></p>
                    <div>
                      <button type="button" class="btn btn-warning btn-custom edit-soal"  data-toggle="modal" data-target="#editSoal"
                              data-id="<?= $soal['soal_id']; ?>" data-name="<?= $soal['soal_nama']; ?>"
                              data-kategori="<?= $soal['kategori_id'] ?>" data-jenis="<?= $soal['soal_jenis'] ?>" data-urut="<?= $soal['no_urut'] ?>" 
                              style="background: none; border: none; outline: none;" title="Edit">
                              <i class="fas fa-pen-square text-warning"></i>
                            </button>
                      <a href="?delete-soal=<?= $soal['soal_id'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger btn-custom" 
                      style="background: none; border: none; outline: none;" title="Hapus">
                      <i class="fas fa-trash-alt text-danger"></i>
                      </a>
                    </div>
                  </li>
                <?php
                endforeach;
                ?>
                <button type="button" class="btn mt-3 btn-sm btn-primary" data-toggle="modal" data-target="#tambahSoal">Tambah
                  Soal
                </button>
              </ul>
            </div>
          <?php
          endforeach;
          ?>
        </div>
      </div>
    </section>
  </div>

  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/demo.js"></script>
  <script>
    document.querySelectorAll('.survey-title').forEach(title => {
      title.addEventListener('click', function(e) {
        if (e.target.closest('.fas fa-ellipsis-v')) {
          return;
        }

        let surveyItems = this.nextElementSibling;
        surveyItems.classList.toggle('show');

        let icon = this.querySelector('#icon');
        if (surveyItems.classList.contains('show')) {
          icon.classList.remove('fa-angle-left');
          icon.classList.add('fa-angle-down');
        } else {
          icon.classList.remove('fa-angle-down');
          icon.classList.add('fa-angle-left');
        }
      });
    });

    $(document).ready(function () {
      $('.edit-survey').on('click', function () {
        let id = $(this).data('id');
        let name = $(this).data('name');
        let kode = $(this).data('kode');
        let deskripsi = $(this).data('deskripsi');

        $('#edit-id').val(id);
        $('#edit-name').val(name);
        $('#edit-kode').val(kode);
        $('#edit-deskripsi').val(deskripsi);
      });
    });

    $(document).ready(function () {
      $('.edit-soal').on('click', function () {
        let id = $(this).data('id');
        let name = $(this).data('name');
        let kategori = $(this).data('kategori');
        let jenis = $(this).data('jenis');
        let urut = $(this).data('urut');

        $('#editsoal-id').val(id);
        $('#editkategori_soal').val(kategori);
        $('#editno-urut').val(urut);
        $('input[name="editsoal_jenis"][value="' + jenis + '"]').prop('checked', true);
        $('#editnama-soal').val(name);
      });
    });

  </script>
</body>
</html>
