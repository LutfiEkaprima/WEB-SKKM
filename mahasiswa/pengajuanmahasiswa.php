<?php

include "role.php";
include '../koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="asset/style/style.css">
  <script src="asset/js/scripts.js"></script>

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
          <a href="pengajuan.php" class="nav-link active">
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
      <Section class="pengajuan-form">
        <h3>PENGAJUAN SKKM</h3>
        <form class="form-data" method="post" action="tambah.php" enctype="multipart/form-data">
          <div class="mb-3">
            <input type="hidden" name="nrp" class="form-control" id="nrp" placeholder="NRP" value="<?php echo $row1['nrp']?>">
          </div>
          <div class="mb-3">
            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
            <select class="form-select" id="nama_kegiatan" name="nama_kegiatan">
              <option selected disabled>Nama Kegiatan</option>
              <?php
                $sql1 = "SELECT DISTINCT nama_kegiatan FROM jenis_kegiatan";
                $q1 = mysqli_query($koneksi, $sql1);
  
                if ($q1 && mysqli_num_rows($q1) > 0) {
                  while ($row = mysqli_fetch_array($q1)) {
                     echo '<option value="' . $row['nama_kegiatan'] . '">' . $row['nama_kegiatan'] . '</option>';
                  }
                } else {
                  echo '<option value="">Data Belum Tersedia</option>';
                }
              ?>
            </select>
            </div>
            <div class="mb-3">
              <label for="bentuk_kegiatan">Bentuk Kegiatan</label>
              <select class="form-select" id="bentuk_kegiatan" name="bentuk_kegiatan">
                <option selected disabled>Bentuk Kegiatan</option>
                <?php
                  $sql1 = "SELECT DISTINCT bentuk_kegiatan FROM jenis_kegiatan";
                  $q1 = mysqli_query($koneksi, $sql1);
  
                  if ($q1 && mysqli_num_rows($q1) > 0) {
                    while ($row = mysqli_fetch_array($q1)) {
                      echo '<option value="' . $row['bentuk_kegiatan'] . '">' . $row['bentuk_kegiatan'] . '</option>';
                    }
                  } else {
                    echo '<option value="">Data Belum Tersedia</option>';
                  }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="tingkatan">Tingkatan</label>
              <select class="form-select" id="tingkatan" name="tingkatan">
                <option selected disabled>Bentuk Kegiatan</option>
                <?php
                  $sql1 = "SELECT DISTINCT tingkatan FROM jenis_kegiatan";
                  $q1 = mysqli_query($koneksi, $sql1);
  
                  if ($q1 && mysqli_num_rows($q1) > 0) {
                    while ($row = mysqli_fetch_array($q1)) {
                      echo '<option value="' . $row['tingkatan'] . '">' . $row['tingkatan'] . '</option>';
                    }
                  } else {
                    echo '<option value="">Data Belum Tersedia</option>';
                  }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="tgl_pengajuan" class="form-label">Tanggal Pengajuan</label>
              <input type="date" name="tgl_pengajuan"class="form-control" id="tgl_pengajuan" placeholder="" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="mb-3">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" name="foto" class="form-control" id="foto" placeholder="foto" required="">
          </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>
      </Section>

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
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const namaKegiatanDropdown = document.getElementById("nama_kegiatan");
      const bentukKegiatanDropdown = document.getElementById("bentuk_kegiatan");
      const tingkatanDropdown = document.getElementById("tingkatan");

      namaKegiatanDropdown.addEventListener("change", function() {
        const selectedNamaKegiatan = this.value;

        fetch(`get_kegiatan_options.php?nama_kegiatan=${selectedNamaKegiatan}`)
          .then(response => response.json())
          .then(data => {

            bentukKegiatanDropdown.innerHTML = "";
            tingkatanDropdown.innerHTML = "";

            data.bentukKegiatanOptions.forEach(option => {
              const optionElement = document.createElement("option");
              optionElement.value = option;
              optionElement.textContent = option;
              bentukKegiatanDropdown.appendChild(optionElement);
            });

            data.tingkatanOptions.forEach(option => {
              const optionElement = document.createElement("option");
              optionElement.value = option;
              optionElement.textContent = option;
              tingkatanDropdown.appendChild(optionElement);
            });
          })
          .catch(error => {
            console.error('Error:', error);
          });
      });
  });
</script>
</body>

</html>