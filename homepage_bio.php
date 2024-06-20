<?php
$menu = 'homepage';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="dist/img/polinema.png" type="image/png">
  <title>Survey Polinema | Home</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include_once('layouts/sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Selamat Datang !</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
    <style>
    .col-sm-6 h1{
      font-weight: bold;
      font-size: 40px;
    }
    .guide-box{
      
      padding: 10px;
      margin-bottom: 10px;
      margin-top: 10px;
      border-radius: 5px;
      background-color: #383c44;
      color: #fff;
      font-size: 17px;
    }
    .guide-container {
      background-color:#DDDDDD;
      border-radius: 10px;
      padding: 10px;
      margin-bottom: 20px;
    }
    .card-body{
    background-image: url('dist/img/gambar-polinema.jpg'); /* Ganti dengan path ke gambar kamu */
    background-size: 100% 100%; /* Agar gambar mencakup seluruh halaman */
    background-position: center; /* Agar gambar terpusat */
    background-repeat: no-repeat; 
    color: #fff;  
    
    }
    .card-body h1{
    font-size: 30px;
    }
    .title {
      text-align: center;
      color: #ffff;
    }
    .icon-center {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
      height: 20px;
      color: black;
    }
    .card-header{
        background-color: #383c44;
        color: #ffff;
    }
    .card-header h1{
        text-align: left;
        font-weight: bold;
        font-size:35px;
        
    }
    .btn{
      width: 150px;
      height: 40px;
      font-size: 14px;
      background-color: #007bff;
      color: #ffff;
    }
    .btn:hover {
      background-color: #0056b3;
    }
    .card-header p{
      text-align: justify;
      font-size: 16px;
    }
    
    .guide-container h1 {
     color: black;
     font-weight: bold;
    }
  </style>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
        <h1>SISTEM SURVEI KEPUASAN PELANGGAN POLINEMA</h1>
        <p>Sistem Survei Kepuasan Pelanggan Polinema adalah platform berbasis web yang dirancang untuk mengukur tingkat kepuasan seluruh pemangku kepentingan Polinema meliputi mahasiswa, ortu / wali mahasiswa, dosen, tenaga pendidik, alumni mahasiswa, serta mitra industri terhadap berbagai layanan yang disediakan oleh Politeknik Negeri Malang (Polinema). Survey ini dapat memberikan gambaran menyeluruh tentang kinerja polinema dalam berbagai aspek, seperti kualitas pendidikan, fasilitas, pelayanan, dan lulusan. Hasil survey dapat dimanfaatkan untuk meningkatkan kualitas polinema secara berkelanjutan. Dengan mengetahui hal-hal yang perlu diperbaiki, polinema dapat menyusun rencana perbaikan dan melakukan evaluasi secara berkala.</p>
        </div>
        
        <div class="card-body">
        <div class="guide-container">
        <div class="title-panduan">
        <h1 class="title"><strong>Panduan Pengisian Form Survey</strong></h1>
        </div>
        <div class="guide-box">
        <strong><img src="dist/img/responden.png" alt="Nama Gambar" style="width: 50px; height: 50px; margin-right: 5px;">
        1. Pilih Jenis Responden</strong>
      </div>
        <div class="icon-center">
        <i class="fas fa-arrow-down"></i>
        </div>
        <div class="guide-box">
        <strong><img src="dist/img/data.png" alt="Nama Gambar" style="width: 50px; height: 50px; margin-right: 5px;">
          2. Masukkan Data yang diperlukan sesuai dengan jenis responden yang anda pilih</strong> 
      </div>
      <div class="icon-center">
        <i class="fas fa-arrow-down"></i>
        </div>
      <div class="guide-box">
        <strong><img src="dist/img/simpan.png" alt="Nama Gambar" style="width: 50px; height: 50px; margin-right: 5px;">
          3. Klik Simpan</strong> 
      </div>
      <div class="icon-center">
        <i class="fas fa-arrow-down"></i>
        </div>
      <div class="guide-box">
        <strong><img src="dist/img/survei.png" alt="Nama Gambar" style="width: 50px; height: 50px; margin-right: 5px;">
          4. Isi Survey</strong>
      </div>
      <div class="icon-center">
        <i class="fas fa-arrow-down"></i>
        </div>
      <div class="guide-box">
        <strong><img src="dist/img/kirim.png" alt="Nama Gambar" style="width: 50px; height: 50px; margin-right: 5px;">
          5. Klik Kirim</strong>
      </div>
      </div>
      <a href="biodata.php" class="btn">
      <img src="dist/img/next.png" alt="Next" width="20" height="20">
      </a>
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
