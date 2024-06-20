<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}

$menu = 'report';

include "model/koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="dist/img/polinema.png" type="image/png">
  <title>Survey Polinema | Report</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
            <h1>Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Report</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="d-flex" style="gap: 12px;">
        <div class="card" style="width: 18rem; overflow: hidden;">
          <div class="bg-success" style="width: 100%; height: 150px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <i class="fas fa-chalkboard-teacher" style="font-size: 42px; margin-bottom: 12px"></i>
            <p style="font-weight: 800; font-size: 42px; line-height: 32px;">001</p>
            <p style="font-weight: 800; font-size: 24px; line-height: 0;">Dosen</p>
          </div>
          <a href="report-dosen.php" class="p-3 d-flex justify-content-between text-success">
            <h5 class="card-title font-weight-bold">Lihat Data</h5>
            <i class="fas fa-eye"></i>
          </a>
        </div>
        <div class="card" style="width: 18rem; overflow: hidden;">
          <div class="bg-primary" style="width: 100%; height: 150px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <i class="fas fa-graduation-cap" style="font-size: 42px; margin-bottom: 12px"></i>
            <p style="font-weight: 800; font-size: 42px; line-height: 32px;">002</p>
            <p style="font-weight: 800; font-size: 24px; line-height: 0;">Mahasiswa</p>
          </div>
          <a href="report-mahasiswa.php" class="p-3 d-flex justify-content-between text-primary">
            <h5 class="card-title font-weight-bold">Lihat Data</h5>
            <i class="fas fa-eye"></i>
          </a>
        </div>
        <div class="card" style="width: 18rem; overflow: hidden;">
          <div class="bg-warning" style="width: 100%; height: 150px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <i class="fas fa-briefcase text-light" style="font-size: 42px; margin-bottom: 12px"></i>
            <p class="text-light" style="font-weight: 800; font-size: 42px; line-height: 32px;">003</p>
            <p class="text-light" style="font-weight: 800; font-size: 24px; line-height: 0;">Industri</p>
          </div>
          <a href="report-industri.php" class="p-3 d-flex justify-content-between text-warning">
            <h5 class="card-title font-weight-bold">Lihat Data</h5>
            <i class="fas fa-eye"></i>
          </a>
        </div>
        <div class="card" style="width: 18rem; overflow: hidden;">
          <div class="bg-danger" style="width: 100%; height: 150px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <i class="fas fa-briefcase text-light" style="font-size: 42px; margin-bottom: 12px"></i>
            <p class="text-light" style="font-weight: 800; font-size: 42px; line-height: 32px;">003</p>
            <p class="text-light" style="font-weight: 800; font-size: 24px; line-height: 0;">Tenaga Pendidik</p>
          </div>
          <a href="report-tendik.php" class="p-3 d-flex justify-content-between text-danger">
            <h5 class="card-title font-weight-bold">Lihat Data</h5>
            <i class="fas fa-eye"></i>
          </a>
        </div>
        <div class="card" style="width: 18rem; overflow: hidden;">
          <div class="bg-info" style="width: 100%; height: 150px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <i class="fas fa-briefcase text-light" style="font-size: 42px; margin-bottom: 12px"></i>
            <p class="text-light" style="font-weight: 800; font-size: 42px; line-height: 32px;">003</p>
            <p class="text-light" style="font-weight: 800; font-size: 24px; line-height: 0;">Orang Tua Mahasiswa</p>
          </div>
          <a href="report-ortu.php" class="p-3 d-flex justify-content-between text-info">
            <h5 class="card-title font-weight-bold">Lihat Data</h5>
            <i class="fas fa-eye"></i>
          </a>
        </div>
        <div class="card" style="width: 18rem; overflow: hidden;">
          <div class="bg-secondary" style="width: 100%; height: 150px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <i class="fas fa-briefcase text-light" style="font-size: 42px; margin-bottom: 12px"></i>
            <p class="text-light" style="font-weight: 800; font-size: 42px; line-height: 32px;">003</p>
            <p class="text-light" style="font-weight: 800; font-size: 24px; line-height: 0;">Alumni Mahasiswa</p>
          </div>
          <a href="report-alumni.php" class="p-3 d-flex justify-content-between text-secondary">
            <h5 class="card-title font-weight-bold">Lihat Data</h5>
            <i class="fas fa-eye"></i>
          </a>
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
<script src="dist/js/demo.js"></script>
<script>
  $('.editBtn').click(function() {
    var id = $(this).data('id');
    var name = $(this).data('name');
    var email = $(this).data('email');
    $('#edit_id').val(id);
    $('#edit_name').val(name);
    $('#edit_email').val(email);
  });
</script>
</body>
</html>