<?php

include "model/koneksi.php";
include "model/survey_model.php";
include "model/survey_soal_model.php";
include "model/kategori_model.php";
include "model/jawaban_model.php";
include "model/responden_model.php";

session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}

$survey = new Survey($db);
$list_soal = new BankSoal($db);
$kategori = new Kategori($db);
$jawaban = new Jawaban($db);
$responden = new Responden($db);

$list_kategori = $kategori->getData();
$list_survey = $survey->getDataByKategori("tendik");
$list_jawaban = $jawaban->getData("tendik");

$menu = 'report';
$data_kategori = [];
while($row = $list_kategori->fetch_assoc()){
  array_push($data_kategori, $row);
}

function countSurvey($list_jawaban, $soal_id){
  $tidak_puas = 0;
  $tidak_puas_users = [];
  $kurang_puas = 0;
  $kurang_puas_users = [];
  $cukup_puas = 0;
  $cukup_puas_users = [];
  $puas = 0;
  $puas_users = [];
  $sangat_puas = 0;
  $sangat_puas_users = [];

  foreach ($list_jawaban as $response) {
    if ($response['jawaban'] === 'tidak_puas' && $response['soal_id'] == $soal_id) {
      array_push($tidak_puas_users, $response['responden_nama']);
      $tidak_puas++;
    } else if($response['jawaban'] === 'kurang_puas' && $response['soal_id'] == $soal_id) {
      array_push($kurang_puas_users, $response['responden_nama']);
      $kurang_puas++;
    } else if($response['jawaban'] === 'cukup_puas' && $response['soal_id'] == $soal_id) {
      array_push($cukup_puas_users, $response['responden_nama']);
      $cukup_puas++;
    } else if($response['jawaban'] === 'puas' && $response['soal_id'] == $soal_id) {
      array_push($puas_users, $response['responden_nama']);
      $puas++;
    } else if($response['jawaban'] === 'sangat_puas' && $response['soal_id'] == $soal_id) {
      array_push($sangat_puas_users, $response['responden_nama']);
      $sangat_puas++;
    }
  }

  $dataSurvey = [
    'Tidak Puas' => [$tidak_puas, $tidak_puas_users],
    'Kurang Puas' => [$kurang_puas, $kurang_puas_users],
    'Cukup Puas' => [$cukup_puas, $cukup_puas_users],
    'Puas' => [$puas, $puas_users],
    'Sangat Puas' => [$sangat_puas, $sangat_puas_users]
  ];

  $totalResponses = $tidak_puas + $kurang_puas + $cukup_puas + $puas + $sangat_puas;

  return ["data_survey" => $dataSurvey, "total_response" => $totalResponses];
}

function jawabanSurvey($list_jawaban, $soal_id){
  $rows = [];
foreach ($list_jawaban as $response) {
  if ($response['soal_id'] == $soal_id){
    array_push($rows, $response);
  }
}

return $rows;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Survey Polinema | Tenaga Pendidik</title>
  <link rel="icon" href="dist/img/polinema.png" type="image/png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
<div class="wrapper">
  <?php include_once('layouts/header.php'); ?>
  <?php include_once('layouts/sidebar.php'); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report Tenaga Pendidik</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="report.php">Report</a></li>
              <li class="breadcrumb-item active">Report Tenaga Pendidik</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title font-weight-bold">Report</h3>
        </div>
        <div class="card-body">
          <div>
          <div class="d-flex justify-content-between align-items-center responden-title" style="cursor: pointer">
            <p class="font-weight-bold">Data Responden</p>
            <i class="fas fa-angle-left right" id="icon"></i>
          </div>
            <table class="table d-none">
              <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">No Pegawai</th>
                <th scope="col">Nama</th>
                <th scope="col">Nama Survey</th>
                <th scope="col">Aksi</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $no = 1;
              foreach ($responden->getData("tendik") as $datum):
              ?>
              <tr>
                <th scope="row"><?= $no ?></th>
                <td><?= $datum['responden']['responden_nopeg'] ?></td>
                <td><?= $datum['responden']['responden_nama'] ?></td>
                <td><?= $datum['responden']['survey_nama'] ?></td>
                <td>
                  <div class="modal fade" id="viewRespondenModal<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="viewRespondenModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="viewRespondenModalLabel"><?= $datum['responden']['responden_nama'] ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <?php
                          foreach ($datum['jawaban'] as $jwb):
                          ?>
                          <p style="font-weight: 800;"><?= $jwb['soal_nama'] ?></p>
                          <p>Jawab: <?= $jwb['jawaban'] ?></p>
                          <?php
                          endforeach;
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#viewRespondenModal<?= $no ?>">Lihat</button>
                </td>
              </tr>
              <?php
              $no++;
              endforeach;
              ?>
              </tbody>
            </table>
          </div>
          <hr/>
          <div>
            <div class="d-flex justify-content-between align-items-center jawaban-title" style="cursor: pointer">
              <p class="font-weight-bold">Data Responden</p>
              <i class="fas fa-angle-left right" id="icon"></i>
            </div>
          <div class="d-none">
          <?php foreach ($list_survey as $survey): ?>
            <div>
              <div class="d-flex justify-content-between align-items-center survey-title">
                <p class="font-weight-bold"><?= htmlspecialchars($survey['survey_nama']); ?></p>
                <i class="fas fa-angle-left right" id="icon"></i>
              </div>
              <ul class="survey-items">
                <?php foreach ($list_soal->getDataBySurveyId($survey['survey_id']) as $soal): ?>
                  <li>
                    <p><?= htmlspecialchars($soal['soal_nama']); ?></p>
                    <div>
                      <?php
                      $data = countSurvey($list_jawaban, $soal['soal_id']);
                      if ($data['total_response'] > 0) {
                        foreach ($data['data_survey'] as $key => $value):
                          $percentage = ($value[0] / $data['total_response']) * 100;
                          ?>
                          <div class="mb-2">
                            <strong><?= htmlspecialchars($key); ?>:</strong>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: <?= htmlspecialchars(number_format($percentage, 2)); ?>%;" aria-valuenow="<?= htmlspecialchars(number_format($percentage, 2)); ?>" aria-valuemin="0" aria-valuemax="100">
                                <?= htmlspecialchars(number_format($percentage, 2)); ?>%
                              </div>
                            </div>
                            <div class="mt-3">
                              <?php
                              foreach ($value[1] as $name):
                              ?>
                              <span style="font-size: 14px; padding: 4px 8px; background-color: #0c84ff; font-weight: 600; color: white; border-radius: 3px"><?= $name ?></span>
                                <?php
                              endforeach;
                                ?>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      <?php } else {
                        $rows = jawabanSurvey($list_jawaban, $soal['soal_id']);
                        foreach ($rows as $row):
                        ?>
                        <p style="padding: 4px; background-color: #e6e5e3;"><?= $row['responden_nama'] ?> : <?= $row['jawaban'] ?></p>
                      <?php
                      endforeach;
                      } ?>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endforeach; ?>
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/demo.js"></script>
  <script>
    document.querySelector('.responden-title').addEventListener('click', function(e) {
        let surveyItems = this.nextElementSibling;
        surveyItems.classList.toggle('d-none');

        let icon = this.querySelector('#icon');
        if (!surveyItems.classList.contains('d-none')) {
          icon.classList.remove('fa-angle-left');
          icon.classList.add('fa-angle-down');
        } else {
          icon.classList.remove('fa-angle-down');
          icon.classList.add('fa-angle-left');
        }
    });

    document.querySelector('.jawaban-title').addEventListener('click', function(e) {
        let surveyItems = this.nextElementSibling;
        surveyItems.classList.toggle('d-none');

        let icon = this.querySelector('#icon');
        if (!surveyItems.classList.contains('d-none')) {
          icon.classList.remove('fa-angle-left');
          icon.classList.add('fa-angle-down');
        } else {
          icon.classList.remove('fa-angle-down');
          icon.classList.add('fa-angle-left');
        }
    });

    document.querySelectorAll('.survey-title').forEach(title => {
      title.addEventListener('click', function(e) {
        if (e.target.closest('.btn-icon')) {
          e.stopPropagation();
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
  </script>
</body>
</html>
