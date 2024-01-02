<?php

include "role.php";
include "../koneksi.php";

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if($op == "setuju"){
  $id = $_GET['id'];

  $querySQL = "Select * FROM pengajuan WHERE id_pengajuan = '$id'";
  $hasil = $koneksi->query($querySQL);
  $rowcek = $hasil->fetch_assoc();

  $querySQL12 = "UPDATE mahasiswa SET nilai = nilai + '{$rowcek['nilai']}' WHERE nrp = '{$rowcek['nrp']}'";
  $querySQL = "UPDATE pengajuan SET status = 1 WHERE id_pengajuan = '$id'";
  $hasil = $koneksi->query($querySQL);
  $hasil = $koneksi->query($querySQL12);
} else if($op == "tolak"){
  $id = $_GET['id'];
  $querySQL = "UPDATE pengajuan SET status = 2 WHERE id_pengajuan = '$id'";
  $hasil = $koneksi->query($querySQL);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Pengajuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/style/style.css">
    <script src="asset/javascript/index.js"></script>
</head>

<body>
<nav class="navbar" style="background-color: #e3f2fd;">
    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="./asset/img/iti.png" alt="Logo" width="75" height="75" class="d-inline-block align-text-center">
          <span class="fs-1"><span class="me-5"></span>Institut Teknologi Indonesia</span>
        </a>
        <button type="button" onclick="location.href='pengajuan.php'" class="btn btn-primary position-relative">
          Inbox
            <?php
              $querySQL = "SELECT COUNT(*) as total FROM pengajuan where status = 0";
              $result = $koneksi->query($querySQL);
              $row = $result->fetch_assoc();
              $totalData = $row['total'];
              if ($totalData > 0) {
                echo "<span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>";
                echo "<span class='visually-hidden'>unread messages</span>";
                echo $totalData;
                echo "</span>";
              }
            ?>
            <span class="visually-hidden">unread messages</span>
          </span>
        </button>
      </div>
    </nav>
  </nav>

  <div class="isi-content">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; height: 100vh;">
      <div class="side-judul">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor" class="bi bi-house me-2" viewBox="0 0 16 16">
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
          </svg>
          <span class="fs-2">Menu</span>
        </a>
      </div>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link link-body-emphasis" >
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
          <a href="pengajuan.php" class="nav-link active">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
            Approved Kegiatan
          </a>
        </li>
        <li>
          <a href="datamahasiswa.php" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
            Data Mahasiswa
          </a>
        </li>
        <li>
          <a href="datapka.php" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
            Data PKA
          </a>
        </li>
        <li>
          <a href="profile.php" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
            Profile
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle me-2" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
          </svg>
          <strong><?php echo $row1['nama'] ?></strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
          <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
        </ul>
      </div>
    </div>

    <section class="data_mhs">
      <h4>Pengajuan Nilai SKKM</h4>
      <a class='btn btn-primary' role='button' href='pengajuan.php'>Kembali</a>
      <br>
        <table class="table align-middle">
            <thead>
              <tr>
                <th scope="col">Id Pengajuan</th>
                <th scope="col">NRP</th>
                <th scope="col">Nama Kegiatan</th>
                <th scope="col">Bentuk Kegiatan</th>
                <th scope="col">Tingkatan</th>
                <th scope="col">Tanggal Pengajuan</th>
                <th scope="col">Nilai</th>
                <th scope="col">Sertifikat</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody class="table-body">
              <?php
                $sql = "SELECT pengajuan.id_pengajuan, pengajuan.nrp, jenis_kegiatan.nama_kegiatan, jenis_kegiatan.bentuk_kegiatan, jenis_kegiatan.tingkatan, pengajuan.foto, pengajuan.tanggal_pengajuan, pengajuan.nilai, pengajuan.status
                FROM pengajuan
                INNER JOIN jenis_kegiatan ON pengajuan.id_jnskegiatan = jenis_kegiatan.id_jnskegiatan";

                $result = $koneksi->query($sql);
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    if ($row['status'] == 1){
                        $info = "<button type='button' class='btn btn-success' data-bs-container='body' data-bs-toggle='popover' data-bs-placement='left' data-bs-content='Disetujui'>
                        <div class='status'> 
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-lg' viewBox='0 0 16 16'>
                                <path d='M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022'/>
                            </svg>
                        </div>
                        </button>";
                        } else if ($row['status'] == 2){
                        $info = "<button type='button' class='btn btn-danger' data-bs-container='body' data-bs-toggle='popover' data-bs-placement='left' data-bs-content='Ditolak'> 
                        <div class='status'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                                <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z'/>
                            </svg>
                        </div>
                        </button>";
                        } else {
                        $info = "<button type='button' class='btn btn-warning' data-bs-container='body' data-bs-toggle='popover' data-bs-placement='left' data-bs-content='Pending'>
                            <span class='spinner-border spinner-border-sm' aria-hidden='true'></span>
                            <span class='visually-hidden' role='status'>Pending</span>
                        </button>";
                    }
                    echo"
                      <tr> 
                        <td>".$row["id_pengajuan"]."</td>
                        <td>".$row["nrp"]."</td>
                        <td>".$row["nama_kegiatan"]."</td>
                        <td>".$row["bentuk_kegiatan"]."</td>
                        <td>".$row["tingkatan"]."</td>
                        <td>".$row["tanggal_pengajuan"]."</td>
                        <td>".$row["nilai"]."</td>
                        <td>
                          <div> 
                            <a class='btn btn-primary' role='button' href='readsertif.php?id=".$row["id_pengajuan"]."'>Lihat Sertifikat</a>
                          </div>
                        </td>
                        <td>
                          <div>
                            $info
                          </div>
                        </td>
                      </tr>";
                  }
                }
              ?>
            </tbody>
        </table>
    </section>
    </div>
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

  <script src="asset/javascript/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>