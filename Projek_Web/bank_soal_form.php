<?php 
  $menu = 'bank_soal'; 
  include_once('model/bank_soal_model.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form - Bank Soal</title>

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
            <h1>Soal Survey</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Soal Survey</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->          
      <?php 
        $act = (isset($_GET['act']))? $_GET['act'] : '';

        if($act == 'tambah'){
      ?>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Soal Survey</h3>
          <div class="card-tools"></div>
        </div>
        <div class="card-body">
          <form action="bank_soal_action.php?act=simpan" method="post" id="form-tambah">
            <div class="form-group">
              <label for="kode_soal">Kode Soal</label>
              <input type="text" name="kode_soal" id="kode_soal" class="form-control">
            </div>
            <div class="form-group">
              <label for="nama_soal">Nama Soal</label>
              <input required type="text" name="nama_soal" id="nama_soal" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
              <a href="bank_soal.php" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>

        <?php } else if($act == 'edit') { ?>
         
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Soal Survey</h3>
            <div class="card-tools"></div>
          </div>
          <div class="card-body">
            
            <?php 
              $id = $_GET['id'];

              $bank_soal = new BankSoal();
              $data = $bank_soal->getDataById($id);

              $data = $data->fetch_assoc();
            ?>

            <form action="bank_soal_action.php?act=edit&id=<?php echo $id?>" method="post" id="form-tambah">
              <div class="form-group">
                <label for="kode_soal">Kode Soal</label>
                <input type="text" name="kode_soal" id="kode_soal" class="form-control" value="<?php echo $data['kode_soal']?>">
              </div>
              <div class="form-group">
                <label for="nama_soal">Nama Soal</label>
                <input type="text" name="nama_soal" id="nama_soal" class="form-control" value="<?php echo $data['nama_soal']?>">
              </div>
              <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="bank_soal.php" class="btn btn-warning">Kembali</a>
              </div>
            </form>
        </div>
      </div>
          
        <?php }?>

        </div>
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
<script src="plugins/jquery-validation/localization/messages_id.min.js"></script>


<script>
  $(document).ready(function(){ // maksud nya adl ketika dokumen sudah siap (html telah d render oleh browser) maka jalankan fungsi berikut ini
    
    $('#form-tambah').validate({
      rules: {
        kode_soal: {
          required: true,
          minlength: 3,
          maxlength: 10
        },
        nama_soal: {
          required: true,
          minlength: 5,
          maxlength: 255
        }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });   

  });
</script>

</body>
</html>
