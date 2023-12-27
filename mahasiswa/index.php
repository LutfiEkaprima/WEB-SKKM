<?php

include "role.php";

$nrp = $_SESSION['username'];

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
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; height: 88vh;">
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
          <a href="Sertifikatmahasiswa.php" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
            Sertifikat
          </a>
        </li>
        <li>
          <a href="pengajuanmahasiswa.php?nrp=<?php echo $nrp;?>" class="nav-link link-body-emphasis">
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
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
          <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
        </ul>
      </div>
    </div>

    <div class="card-content">
      <div class="card-box">
      <div class="card" style="width: 18rem;">
          <img src="asset/img/nilaikegiatan.png" class="card-img-top" alt="nilaikegiatan.png">
          <div class="card-body">
            <h5 class="card-title">Status Kegiatan</h5>
            <a href="statusmahasiswa.php" class="px-2 py-1 m-2 btn btn-primary">Click</a>
          </div>
        </div>
      </div>

      <div class="card-box">
      <div class="card" style="width: 18rem">
          <img src="asset/img/nilaikegiatan.png" class="card-img-top" alt="nilaikegiatan.png">
          <div class="card-body">
          <h5 class="card-title">Nilai Kegiatan</h5>
            <a href="nilaimahasiswa.php" class="px-2 py-1 m-2 btn btn-primary">Click</a>
          </div>
        </div>
      </div>

      <div class="card-box">
        <div class="card" style="width: 18rem;">
          <img src="asset/img/jumlahkegiatan.png" class="card-img-top" alt="jumlahkegiatan.png">
          <div class="card-body">
          <h5 class="card-title">Jumlah Kegiatan</h5>
            <a href="jumlahkegiatan.php" class="px-2 py-1 m-2 btn btn-primary">Click</a>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>