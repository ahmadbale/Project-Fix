<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}

$menu = 'leaderboard';

include "model/koneksi.php";
include "model/kategori_model.php";
$kategori = new Kategori($db);
$list_kategori = $kategori->getData();

if(isset($_POST['create'])){
if($kategori->insertData($_POST['name'])){
  echo "<script>
    alert('Data berhasil ditambahkan!');
    </script>";
  } else {
  echo "<script>
    alert('Data gagal diproses!');
    </script>";
}
  header("Location: leaderboard.php");
}

if(isset($_POST['update'])){
  if($kategori->updateData($_POST['id'] ,$_POST['name'])) {
    echo "<script>
    alert('Data berhasil diedit!');
    </script>";
  }else {
      echo "<script>
    alert('Data gagal diproses!');
    </script>";
    }

    header("Location: leaderboard.php");
}

if(isset($_GET['delete'])){
  if ($kategori->deleteData($_GET['delete'])) {
    echo "<script>
    alert('Data berhasil dihapus!');
    </script>";
  }else {
    echo "<script>
    alert('Data gagal diproses!');
    </script>";
  }
  header("Location: leaderboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="dist/img/polinema.png" type="image/png">
  <title>Survey Polinema | Leaderboard</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="modal fade" id="addKategoriModal" tabindex="-1" role="dialog" aria-labelledby="addKategoriModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addKategoriModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <button type="submit" class="btn btn-primary" name="create">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editKategoriModal" tabindex="-1" role="dialog" aria-labelledby="editKategoriModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKategoriModalLabel">Edit Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <input type="hidden" id="edit_id" name="id">
          <div class="form-group">
            <label for="edit_name">Nama Kategori</label>
            <input type="text" class="form-control" id="edit_name" name="name" required>
          </div>
          <button type="submit" class="btn btn-primary" name="update">Update</button>
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
            <h1>Leaderboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Leaderboard</li>
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
          <a href="leaderboard-dosen.php" class="p-3 d-flex justify-content-between text-success">
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
          <a href="leaderboard-mahasiswa.php" class="p-3 d-flex justify-content-between text-primary">
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
          <a href="leaderboard-industri.php" class="p-3 d-flex justify-content-between text-warning">
            <h5 class="card-title font-weight-bold">Lihat Data</h5>
            <i class="fas fa-eye"></i>
          </a>
        </div>
        <div class="card" style="width: 18rem; overflow: hidden;">
          <div class="bg-danger" style="width: 100%; height: 150px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <i class="fas fa-id-badge text-light" style="font-size: 42px; margin-bottom: 12px"></i>
            <p class="text-light" style="font-weight: 800; font-size: 42px; line-height: 32px;">004</p>
            <p class="text-light" style="font-weight: 800; font-size: 24px; line-height: 0;">Tenaga Pendidik</p>
          </div>
          <a href="leaderboard-tendik.php" class="p-3 d-flex justify-content-between text-danger">
            <h5 class="card-title font-weight-bold">Lihat Data</h5>
            <i class="fas fa-eye"></i>
          </a>
        </div>
        <div class="card" style="width: 18rem; overflow: hidden;">
          <div class="bg-info" style="width: 100%; height: 150px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <i class="fas fa-user-tie text-light" style="font-size: 42px; margin-bottom: 12px"></i>
            <p class="text-light" style="font-weight: 800; font-size: 42px; line-height: 32px;">005</p>
            <p class="text-light" style="font-weight: 800; font-size: 24px; line-height: 0;">Orang Tua Mahasiswa</p>
          </div>
          <a href="leaderboard-ortu.php" class="p-3 d-flex justify-content-between text-info">
            <h5 class="card-title font-weight-bold">Lihat Data</h5>
            <i class="fas fa-eye"></i>
          </a>
        </div>
        <div class="card" style="width: 18rem; overflow: hidden;">
          <div class="bg-secondary" style="width: 100%; height: 150px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <i class="fas fa-user-graduate text-light" style="font-size: 42px; margin-bottom: 12px"></i>
            <p class="text-light" style="font-weight: 800; font-size: 42px; line-height: 32px;">005</p>
            <p class="text-light" style="font-weight: 800; font-size: 24px; line-height: 0;">Alumni Mahasiswa</p>
          </div>
          <a href="leaderboard-alumni.php" class="p-3 d-flex justify-content-between text-info">
            <h5 class="card-title font-weight-bold">Lihat Data</h5>
            <i class="fas fa-eye"></i>
          </a>
      </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title font-weight-bold">Kategori Survey</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addKategoriModal">Tambah Kategori</button>
          </div>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            while($row = $list_kategori->fetch_assoc()):
            ?>
            <tr>
              <th scope="row"><?= $no ?></th>
              <td class="text-uppercase"><?= $row['kategori_nama'] ?></td>
              <td>
                <button type="button" class="btn btn-sm btn-warning editBtn" data-toggle="modal" data-target="#editKategoriModal" data-id="<?php echo $row['kategori_id']; ?>" data-name="<?php echo $row['kategori_nama']; ?>">Edit</button>
                <a href="?delete=<?php echo $row['kategori_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
              </td>
            </tr>
            <?php
            $no++;
            endwhile;
            ?>
            </tbody>
          </table>
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