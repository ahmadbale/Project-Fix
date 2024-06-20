<?php

global $menu;

$isAdmin = false;
if (isset($_SESSION['username'])) {
  $isAdmin = true;
}

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/polinema.png" alt="polinema Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Survey Polinema</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <?php if ($isAdmin): ?>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/admin.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['username'] ?></a>
        </div>
      </div>
    <?php endif; ?>
      <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php if ($isAdmin): ?>
          <li class="nav-item">
            <a href="leaderboard.php" class="nav-link <?php echo ($menu == 'leaderboard') ? 'active' : '' ?>">
              <i class="nav-icon fab fa-flipboard"></i>
              <p>
                Leaderboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="report.php" class="nav-link <?php echo ($menu == 'report') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Report
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="survey_soal.php" class="nav-link <?php echo ($menu == 'survey_soal') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Soal Survey
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data_pengguna.php" class="nav-link <?php echo ($menu == 'pengguna') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kategori.php" class="nav-link <?php echo ($menu == 'kategori') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="m_survey.php" class="nav-link <?php echo ($menu == 'survey') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Survey
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a href="homepage_bio.php" class="nav-link <?php echo ($menu == 'homepage') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="biodata.php" class="nav-link <?php echo ($menu == 'biodata') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Biodata
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Form Survey
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="survey-mahasiswa.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="survey-dosen.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dosen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="survey-industri.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Industri</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="survey-alumni.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alumni Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="survey-ortu.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orang Tua</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="survey-tendik.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tenaga Pendidik</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="login.php" class="nav-link ">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Kembali
              </p>
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>