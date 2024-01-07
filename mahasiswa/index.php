<?php

include "role.php";
include "../koneksi.php";

$nrp = $row1['nrp'];
$querySQL = "SELECT COUNT(*) as total FROM pengajuan where nrp = $nrp and status = 0";
$result = $koneksi->query($querySQL);
$row = $result->fetch_assoc();
$totalData = $row['total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/style/style.css">
</head>
<body>
  <nav class="navbar" style="background-color: #e3f2fd;">
    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="./asset/img/iti.png" alt="Logo" width="75" height="75" class="d-inline-block align-text-center">
          <span class="fs-1"><span class="me-5"></span>Institut Teknologi Indonesia</span>
        </a>
      </div>
    </nav>
  </nav>

  <div class="isi-content">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; height: auto; min-height: 100vh;">
      <div class="side-judul">
        <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor" class="bi bi-house me-2" viewBox="0 0 16 16">
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
          </svg>
          <span class="fs-2">Menu</span>
        </a>
      </div>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link active" aria-current="page">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
            Dashboard
          </a>
        </li>
        <li>
          <a href="informasi.php" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
            Informasi SKKM
          </a>
        </li>
        <li>
          <a href="Sertifikatmahasiswa.php" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
            Sertifikat
          </a>
        </li>
        <li>
          <a href="pengajuan.php" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
            Ajukan Kegiatan
          </a>
        </li>
        <li>
          <a href="Profilmahasiswa.php" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
            Profile
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="../asset/foto/mhs/<?php echo $row1['foto']?>" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong><?php echo $row1['nama']?></strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
          <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
        </ul>
      </div>
    </div>

    <div class="d-flex flex-column w-100">
      <div class="p-5">
          <div class="card mb-5 shadow-lg p-3 mb-5">
            <div class="row">
              <div class="col col-12 col-lg-6 main-content">
                <h1>Dashboard</h1>
                <div class="row">
                  <div class="col col-12 col-9 d-flex ">
                    <img class="me-3" src="https://assets.siakadcloud.com/assets/v1/v2/icon/dashboard/sevi.svg" alt="">
                    <div class="align-self-center ">
                      <h4>Halo <strong> <?php echo $row1['nama'] ?></strong> <br> Selamat Datang di Website SKKM Institute Teknologi Indonesia<br></h4>
                      <p>Saat ini terdapat <strong> <?php echo $totalData ?></strong> Pengajuan yang sedang menunggu disetujui</p>
                    </div>
                  </div>								
                </div>
              </div>             
            </div>
        </div>

        <div class="card shadow-lg p-3">
          <div class="row">
            <h1>Informasi</h1>
            <div class="col-lg-6 col-xl-3 mb-4">
              <div class="card bg-primary text-white" style="width: 18rem; height: 10rem; ">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                      <div class="text-white-75 small">
                        Jumlah Total Pengajuan
                      </div>
                      <div class="text-lg fw-bold fs-3">
                        <?php
                          $nrp = $row1['nrp'];
                          $querySQL = "SELECT COUNT(*) as total FROM pengajuan where nrp = $nrp ";
                          $result = $koneksi->query($querySQL);
                          $row = $result->fetch_assoc();
                          $totalData = $row['total'];
                          echo $totalData;
                          ?>
                      </div>
                    </div>
                    <svg  xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                      <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                      <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z"/>
                    </svg>
                  </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                  <a class="text-white stretched-link" href="pengajuan.php">Lihat Data</a>
                  <div class="text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com -->
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6 col-xl-3 mb-4">
              <div class="card bg-warning text-white" style="width: 18rem; height: 10rem; ">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                      <div class="text-white-75 small">
                        Pengajuan Yang Diterima</div>
                      <div class="text-lg fw-bold fs-3">
                        <?php
                          $querySQL = "SELECT COUNT(*) as total FROM pengajuan where nrp = $nrp and status = 1";
                          $result = $koneksi->query($querySQL);
                          $row = $result->fetch_assoc();
                          $totalData = $row['total'];
                          echo $totalData;
                        ?>
                      </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                  </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                  <a class="text-white stretched-link" href="pengajuan.php">Lihat Data</a>
                  <div class="text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                </div>
              </div>
          </div>
      
            <div class="col-lg-6 col-xl-3 mb-4">
              <div class="card bg-success text-white" style="width: 18rem; height: 10rem; ">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                      <div class="text-white-75 small">
                        Pengajuan Yang Ditolak </div>
                      <div class="text-lg fw-bold fs-3">
                        <?php
                          $querySQL = "SELECT COUNT(*) as total FROM Pengajuan where nrp = $nrp and status = 2";
                          $result = $koneksi->query($querySQL);
                          $row = $result->fetch_assoc();
                          $totalData = $row['total'];
                          echo $totalData;
                        ?>
                      </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
                      <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                      <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708Z"/>
                    </svg>
                  </div>
                </div>
                  <div class="card-footer d-flex align-items-center justify-content-between small">
                    <a class="text-white stretched-link" href="pengajuan.php">Lihat Data</a>
                    <div class="text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                  </div>
              </div>
            </div>
      
            <div class="col-lg-6 col-xl-3 mb-4">
              <div class="card bg-danger text-white" style="width: 18rem; height: 10rem; ">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                      <div class="text-white-75 small">
                        Jumlah Kegiatan
                      </div>
                      <div class="text-lg fw-bold fs-3">
                        <?php
                          $querySQL = "SELECT COUNT(*) as total FROM jenis_kegiatan";
                          $result = $koneksi->query($querySQL);
                          $row = $result->fetch_assoc();
                          $totalData = $row['total'];
                          echo $totalData;
                        ?>
                      </div>
                    </div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-arms-up" viewBox="0 0 16 16">
                        <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                        <path d="m5.93 6.704-.846 8.451a.768.768 0 0 0 1.523.203l.81-4.865a.59.59 0 0 1 1.165 0l.81 4.865a.768.768 0 0 0 1.523-.203l-.845-8.451A1.492 1.492 0 0 1 10.5 5.5L13 2.284a.796.796 0 0 0-1.239-.998L9.634 3.84a.72.72 0 0 1-.33.235c-.23.074-.665.176-1.304.176-.64 0-1.074-.102-1.305-.176a.72.72 0 0 1-.329-.235L4.239 1.286a.796.796 0 0 0-1.24.998l2.5 3.216c.317.316.475.758.43 1.204Z"/>
                      </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="footer mt-auto mb-1 bg-body-tertiary">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
          <div class="footer-content">
            <div class="col-md-4 px-2 d-flex align-items-center">
              <a href="#" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                <img src="./asset/img/iti.png" alt="Logo" width="25" height="25" class="d-inline-block align-text-center">
              </a>
              <span class="mb-3 mb-md-0 text-body-secondary">© 2024 Institut Teknologi Indonesia</span>
            </div>
          </div>
        </footer>
      </div>       
    </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>