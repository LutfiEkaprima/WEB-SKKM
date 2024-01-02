<?php

include '../koneksi.php';
include "role.php";

$nrp = $row1['nrp'];
$status = "";

$sqlQuery = "SELECT * from pengajuan where nrp='$nrp'";
$result = $koneksi->query($sqlQuery);

$sql = "SELECT mahasiswa.nrp, jenis_kegiatan.nama_kegiatan, jenis_kegiatan.bentuk_kegiatan, jenis_kegiatan.tingkatan, pengajuan.foto, pengajuan.tanggal_pengajuan, pengajuan.nilai, pengajuan.status
        FROM pengajuan
        INNER JOIN mahasiswa ON pengajuan.nrp = mahasiswa.nrp
        INNER JOIN jenis_kegiatan ON pengajuan.id_jnskegiatan = jenis_kegiatan.id_jnskegiatan";

$result = $koneksi->query($sql);
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
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; height: auto; min-height:100vh;">
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
          <a href="index.php" class="nav-link link-body-emphasis" aria-current="page">
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
          <a href="Profilmahasiswa.php" class="nav-link active">
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

    

    <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0 d-flex">
        <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
          <h1 class="h2 pt-xl-1 pb-3">Account Details</h1>
          <div>
            <div>
              <div class="bg-body rounded-3 shadow-sm mb-4 p-4 d-flex">
                <div class="d-flex align-items-center mb-4 me-5">
                <img src="../asset/foto/mhs/<?php echo $row1['foto']?>" class="rounded-circle me-3" width="180" height="180" alt="<?php $row1['nama'] ?>">
            </div>

            <div>
              <form class="border-bottom pb-3 pb-lg-4">
                <div class="row pb-2">
                  <div class="col-sm-6 mb-4">
                    <label for="fn" class="form-label fs-base">Nama Lengkap</label>
                    <input type="text" class="form-control form-control-lg" value="<?php echo $row1['nama'] ?>" disabled>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="sn" class="form-label fs-base">NRP</label>
                    <input type="text" class="form-control form-control-lg" value="<?php echo $row1['nrp'] ?>" disabled>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="email" class="form-label fs-base">Email address</label>
                    <input type="email" class="form-control form-control-lg" value="<?php echo $row1['email'] ?>" disabled>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="jurusan" class="form-label fs-base">Jurusan</small></label>
                    <input type="text" class="form-control form-control-lg" value="<?php echo $row1['jurusan'] ?>" disabled>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="semester" class="form-label fs-base">Semester</small></label>
                    <input type="text" class="form-control form-control-lg" value="<?php echo $row1['semester']?>" disabled>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="tgl_lahir" class="form-label fs-base">Tanggal Lahir</small></label>
                    <input type="text" class="form-control form-control-lg" value="<?php echo $row1['tgl_lahir'] ?>" disabled>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="nilai" class="form-label fs-base">Nilai</small></label>
                    <input type="text" class="form-control form-control-lg" value="<?php echo $row1['nilai'] ?>" disabled>
                  </div>
                  <div class="col-sm-12 mb-4">
                    <label for="alamat" class="form-label fs-base">Alamat</small></label>
                    <input type="text" class="form-control form-control-lg" value="<?php echo $row1['alamat'] ?>" disabled>
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <a class='btn btn-danger me-4' role='button' href='resetpassword.php?id="<?php echo $row1['id_mhs']?>"'>Ganti Password</a>
                  <a class='btn btn-primary' role='button' href='update.php?id="<?php echo $row1['id_mhs']?>"'>Ubah Data Diri</a>
                </div>
              </form>
              </div>
            </div>
          </div>

        </div>
      </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>