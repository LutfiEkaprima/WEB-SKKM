<?php

include "role.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/style/style.css">
    <title>Admin - Tambah Data Mahasiswa</title>
    
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
        <h1>Halaman Tambah Data Mahasiswa</h1>
    </header>

    <form class="form-data1" method="post" action="tambah.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nrp" class="form-label">NRP</label>
            <input type="text" name="nrp" class="form-control" id="nrp" placeholder="NRP">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Jurusan</label>
            <select class="form-select" id="jurusan" name="jurusan">
                <option selected disabled>Jurusan</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Sipil">Teknik Sipil</option>
                <option value="Teknik Industri">Teknik Industri</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Teknik Kimia">Teknik Kimia</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
                <option value="Arsitektur">Arsitektur</option>
                <option value="Perencanaan Wilayah Dan Kota">Perencanaan Wilayah Dan Kota</option>
                <option value="Teknologi Industri Pertanian">Teknologi Industri Pertanian</option>
                <option value="Manajemen">Manajemen</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <select class="form-select" id="semester" name="semester">
                <option selected disabled>Semester</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
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
            <input type="text" name="nilai"class="form-control" id="nilai" placeholder="nilai" value="0" aria-label="Disabled input example" disabled>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password"class="form-control" id="password" placeholder="Password">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" id="foto" placeholder="Foto">
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>

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