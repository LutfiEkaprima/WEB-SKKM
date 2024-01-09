<?php

include "role.php";
include "../koneksi.php";

$page = isset($_GET['page']) ? $_GET['page'] : 1; 
$studentsPerPage = 5; 
$offset = ($page - 1) * $studentsPerPage;

$search = isset($_GET['search']) ? $_GET['search'] : '';

$whereClause = !empty($search) ? "WHERE pengajuan.nrp LIKE '%$search%' OR jenis_kegiatan.nama_kegiatan LIKE '%$search%' OR jenis_kegiatan.bentuk_kegiatan LIKE '%$search%' OR jenis_kegiatan.tingkatan LIKE '%$search%'" : '';
$sqlQuery = "SELECT pengajuan.id_pengajuan, pengajuan.nrp, jenis_kegiatan.nama_kegiatan, jenis_kegiatan.bentuk_kegiatan, jenis_kegiatan.tingkatan, pengajuan.foto, pengajuan.tanggal_pengajuan, pengajuan.nilai, pengajuan.status
            FROM pengajuan
            INNER JOIN jenis_kegiatan ON pengajuan.id_jnskegiatan = jenis_kegiatan.id_jnskegiatan
            $whereClause AND pengajuan.status = 0 LIMIT $offset, $studentsPerPage";

$result1 = $koneksi->query($sqlQuery);

$totalStudentsQuery = "SELECT COUNT(*) as total FROM pengajuan INNER JOIN jenis_kegiatan ON pengajuan.id_jnskegiatan = jenis_kegiatan.id_jnskegiatan $whereClause and pengajuan.status = 0";
$totalResult = $koneksi->query($totalStudentsQuery);
$totalData = $totalResult->fetch_assoc()['total'];
$totalPages = ceil($totalData / $studentsPerPage);


if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if($op == "setuju"){
  $id = $_GET['id'];

  $querySQL = "SELECT * FROM pengajuan WHERE id_pengajuan = '$id'";
  $hasil = $koneksi->query($querySQL);
  $rowcek = $hasil->fetch_assoc();

  // Mengambil nilai yang akan ditambahkan
  $nilai_baru = $rowcek['nilai'];

  // Mengambil nilai saat ini dari tabel mahasiswa
  $nrp = $rowcek['nrp'];
  $queryNilai = "SELECT nilai FROM mahasiswa WHERE nrp = '$nrp'";
  $hasilNilai = $koneksi->query($queryNilai);
  $rowNilai = $hasilNilai->fetch_assoc();
  $nilai_sekarang = $rowNilai['nilai'];

  // Menghitung nilai baru yang dibatasi maksimal 100
  $nilai_total = min(100, $nilai_sekarang + $nilai_baru);

  // Update nilai di tabel mahasiswa
  $querySQL12 = "UPDATE mahasiswa SET nilai = '$nilai_total' WHERE nrp = '$nrp'";
  $koneksi->query($querySQL12);

  // Update status pengajuan
  $queryUpdatePengajuan = "UPDATE pengajuan SET status = 1 WHERE id_pengajuan = '$id'";
  $koneksi->query($queryUpdatePengajuan);

  echo '<script type="text/javascript">
          window.onload = function () {
            $("#successModal").modal("show");
          }
        </script>';
  header("Refresh: 1; URL=pengajuan.php");

} else if($op == "tolak"){
  $id = $_GET['id'];
  $querySQL = "UPDATE pengajuan SET status = 2 WHERE id_pengajuan = '$id'";
  $koneksi->query($querySQL);
  echo '<script type="text/javascript">
          window.onload = function () {
            $("#tolakModal").modal("show");
          }
        </script>';
  header("Refresh: 1; URL=pengajuan.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKA - Pengajuan</title>
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
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
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

    <div class="d-flex flex-column w-100">
      <section class="data_mhs">
          <div class="d-flex justify-content-between">
            <h4 class="mb-4">Data Pengajuan Mahasiswa</h4>
            <form class="mb-3" action="pengajuan.php" method="GET">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari NRP..." name="search">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
                <?php if (!empty($search)) : ?>
                  <a href="pengajuan.php" class="btn btn-outline-secondary">Reset</a>
                <?php endif; ?>
              </div>
            </form>
          </div>
  
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
                  <th scope="col">Status</th>
                  <th scope="col">Sertifikat</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody class="table-body">
                <?php
  
                  if ($result1->num_rows > 0) {
                    // output data of each row
                    while($row = $result1->fetch_assoc()) {
                      $status = ($row['status'] == 0) ? "Belum Disetujui" : "Disetujui";
                      echo"
                        <tr> 
                          <td>".$row["id_pengajuan"]."</td>
                          <td>".$row["nrp"]."</td>
                          <td>".$row["nama_kegiatan"]."</td>
                          <td>".$row["bentuk_kegiatan"]."</td>
                          <td>".$row["tingkatan"]."</td>
                          <td>".$row["tanggal_pengajuan"]."</td>
                          <td>".$row["nilai"]."</td>
                          <td>" . $status . "</td>
                          <td>
                            <div> 
                              <a class='btn btn-primary' role='button' href='readsertif.php?id=".$row["id_pengajuan"]."'>Lihat Sertifikat</a>
                            </div>
                          </td>
                          <td>
                            <div>
                              <a class='btn btn-success' role='button' onclick='return confirm(\"Setujui Pengajuan?\")' href='pengajuan.php?op=setuju&id=".$row["id_pengajuan"]."'>Setujui</a>
                              <a class='btn btn-warning' role='button' onclick='return confirm(\"Tolak Pengajuan?\")' href='pengajuan.php?op=tolak&id=".$row["id_pengajuan"]."'>Tolak</a>
                            </div>
                          </td>
                        </tr>";
                    }
                  }
                ?>
              </tbody>
          </table>
  
          <div class='d-flex justify-content-between align-items-center'> 
              <a class='btn btn-primary' href='totalpengajuan.php' role='button'>Lihat Semua Pengajuan</a>
              <?php if ($totalPages > 0) { ?>
                <ul class='pagination justify-content-end'>
                  <li class='page-item'>
                    <a class='page-link' href='pengajuan.php?page=<?php echo ($page > 1) ? ($page - 1) : 1 ?>&search=<?php echo urlencode($search) ?>' aria-label='Previous'>
                      <span aria-hidden='true'>&laquo;</span>
                    </a>
                  </li>
                  <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <li class='page-item <?php echo ($i == $page) ? 'active' : '' ?>'>
                      <a class='page-link' href='pengajuan.php?page=<?php echo $i ?>&search=<?php echo urlencode($search) ?>'><?php echo $i ?></a>
                    </li>
                  <?php } ?>
                  <li class='page-item'>
                    <a class='page-link' href='pengajuan.php?page=<?php echo ($page < $totalPages) ? ($page + 1) : $totalPages ?>&search=<?php echo urlencode($search) ?>' aria-label='Next'>
                      <span aria-hidden='true'>&raquo;</span>
                    </a>
                  </li>
                </ul>
              <?php } ?>
            </div>
      </section>

      <div class="footer mb-1 mt-auto">
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

  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Berhasil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                Pengajuan Disetujui
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tolakModal" tabindex="-1" aria-labelledby="tolakModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="tolakModalLabel">Gagal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                Pengajuan Ditolak
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
                    

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>