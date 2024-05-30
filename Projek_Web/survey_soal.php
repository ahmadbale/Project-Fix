<?php 
  $menu = 'survey_soal'; 

  include_once('model/survey_soal_model.php');

  $status = isset($_GET['status'])? strtolower($_GET['status']) : null;
  $message= isset($_GET['message'])? strtolower($_GET['message']) : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bank Survey Soal</title>

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
  <?php include_once('layouts/header.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once('layouts/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bank Survey Soal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Bank Survey Soal</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Soal Survey</h3>

          <div class="card-tools">
           <a href="survey_soal_form.php?act=tambah" class="btn btn-sm btn-primary">Tambah Soal</a>
          </div>
        </div>
        <div class="card-body">
          
          <?php 
            if($status == 'sukses'){
                echo '<div class="alert alert-success">
                      '.$message.'
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div>';
            }
          ?>  

          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>No Urut</th>
                <th>Soal</th>
                <th>Jenis Soal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $bank = new BankSoal();
                $list = $bank->getData();

                $i = 1;
                while($row = $list->fetch_assoc()){
                  echo '<tr>
                      <td>'.$i.'</td>
                      <td>'.$row['no_urut'].'</td>
                      <td>'.$row['soal_nama'].'</td>
                      <td>'.$row['soal_jenis'].'</td>
                      <td>
                        <a title="Edit Data" href="survey_soal_form.php?act=edit&id='.$row['soal_id'].'" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')" title="Hapus Data" href="survey_soal_action.php?act=hapus&id='.$row['soal_id'].'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td>
      
                    </tr>';

                    $i++;
                }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include_once('layouts/footer.php'); ?>
  
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

<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>

</body>
</html>
