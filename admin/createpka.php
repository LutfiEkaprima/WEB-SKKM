<?php

include "role.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tambah Data PKA</title>
    <link rel="icon" type="image/x-icon" href="asset/img/Institut Teknologi Indonesia.ico">
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
    <header class="judul-tbhdata">
        <h1>Halaman Tambah Data PKA</h1>
    </header>

    <form class="form-data1" method="post" action="tambahpka.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="jabatan">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username"class="form-control" id="username" placeholder="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password"class="form-control" id="password" placeholder="password">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email"class="form-control" id="email" placeholder="email">
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
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" id="foto" placeholder="foto">
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>

    <div class="footer">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <a href="#" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
          <img src="./asset/img/iti.png" alt="Logo" width="25" height="25" class="d-inline-block align-text-center">
        </a>
        <span class="mb-3 mb-md-0 text-body-secondary">© 2024 Institut Teknologi Indonesia</span>
      </div>
    </footer>
  </div>

  <div class="footer">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>