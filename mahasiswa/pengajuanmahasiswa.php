<?php

include "role.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
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
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; height: auto;">
      <div class="side-judul">
        <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor" class="bi bi-house me-2" viewBox="0 0 16 16">
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
          </svg>
          <span class="fs-2">Menu</span>
        </a>
      </div>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link link-body-emphasis" aria-current="page">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#home"></use>
            </svg>
            Dashboard
          </a>
        </li>
        <li>
          <a href="Sertifikatmahasiswa.php" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#speedometer2"></use>
            </svg>
            Sertifikat
          </a>
        </li>
        <li>
          <a href="pengajuanmahasiswa.php" class="nav-link active">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#table"></use>
            </svg>
            Ajukan Kegiatan
          </a>
        </li>
        <li>
          <a href="Profilmahasiswa.php" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#grid"></use>
            </svg>
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

    <Section class="pengajuan-form">
      <h3>PENGAJUAN SKKM</h3>
      <form class="form-data" method="post" action="tambah.php" enctype="multipart/form-data">
          <div class="mb-3">
              <label for="nrp" class="form-label">NRP</label>
              <input type="hidden" name="nrp" class="form-control" id="nrp" placeholder="NRP" value="">
          </div>
          <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
          </div>
          <div class="mb-3">
              <label for="nama" class="form-label">Jurusan</label>
              <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Jurusan">
          </div>
          <div class="mb-3">
              <label for="semester" class="form-label">Semester</label>
              <select class="form-select" id="semester" name="semester">
                  <option selected disabled>Semester</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="3">4</option>
                  <option value="3">5</option>
                  <option value="3">6</option>
                  <option value="3">7</option>
              </select>
          </div>
          <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea type="text" name="alamat"class="form-control" id="alamat" placeholder="Alamat" rows="5"></textarea>
          </div>
          <div class="mb-3">
              <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
              <input type="date" name="tgl_lahir"class="form-control" id="tgl_lahir" placeholder="">
          </div>
          <div class="mb-3">
              <label for="nilai" class="form-label">Nilai</label>
              <input type="text" name="nilai"class="form-control" id="nilai" placeholder="nilai" value="0">
          </div>
          <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password"class="form-control" id="password" placeholder="password" value="">
          </div>
          <div class="mb-3">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" name="foto" class="form-control" id="foto" placeholder="foto">
          </div>
          <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit form</button>
          </div>
      </form>
    </Section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>