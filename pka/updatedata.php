<?php

include '../koneksi.php';
include "role.php";

$sqlQuery = "SELECT * from pka where username='$username'";
$result = $koneksi->query($sqlQuery);

if (isset($_POST['submit'])) {
    $id = $row1['idpka'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];

    $nama_gambar = $_FILES['foto']['name'];
    $timestamp = time();
    $nama_gambar_baru = $timestamp . '_' . $nama_gambar;

    $tmp_nama_gambar = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp_nama_gambar,'../asset/foto/pka/'.$nama_gambar_baru);

    $fotoLama = $_POST['fotoLama'];

    if ($nama_gambar_baru) {
        // Periksa apakah foto lama ada di direktori
        $fotoPath = '../asset/foto/pka/' . $fotoLama;
        if (file_exists($fotoPath)) {
            // Hapus foto lama jika ada
            unlink($fotoPath);
        }

        // Buat query untuk update dengan foto baru
        move_uploaded_file($tmp_nama_gambar,'../asset/foto/mhs/'.$nama_gambar_baru);
        
        $querySQL = "UPDATE pka SET nama = '$nama', email = '$email', alamat ='$alamat', username ='$username', foto = '$nama_gambar_baru' WHERE idpka = '$id'";

    } else {
        // Buat query untuk update tanpa mengubah foto
        $querySQL = "UPDATE pka SET nama = '$nama', email = '$email', alamat ='$alamat', username ='$username' WHERE idpka = '$id'";
          }
          
    $hasil = $koneksi->query($querySQL);
    echo "<script type='text/javascript'>
                  window.onload = function () {
                    $('#successModal').modal('show');
                  }
                  setTimeout(function(){
                    window.location.href = 'profile.php?username=$username';
                  }, 2000);
                </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKA - Ubah Data Diri</title>
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

  <div class="isi-content">
  <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; height: auto; min-height: 100vh;">
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
          <a href="index.php" class="nav-link link-body-emphasis">
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
          <a href="pengajuan.php" class="nav-link link-body-emphasis">
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
          <a href="profile.php" class="nav-link active">
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
      <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0 d-flex">
          <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
            <h1 class="h2 pt-xl-1 pb-3">Account Details</h1>
            <div>
              <div>
                <div class="bg-body rounded-3 shadow-sm mb-4 p-4 d-flex">
                  <div class="d-flex align-items-center mb-4 me-5">
                  <img src="../asset/foto/pka/<?php echo $row1['foto']?>" class="rounded-circle me-3" width="180" height="180" alt="Admin">
              </div>

              <div>
                <form class="border-bottom pb-3 pb-lg-4" method="post" action="" enctype="multipart/form-data">
                  <div class="row pb-2">
                    <div class="col-sm-6 mb-4">
                      <label for="nama" class="form-label fs-base">Nama Lengkap</label>
                      <input type="text" class="form-control form-control-lg" name="nama" id="nama" value="<?php echo $row1['nama'] ?>">
                    </div>
                    <div class="col-sm-6 mb-4">
                      <label for="username" class="form-label fs-base">Username</label>
                      <input type="username" class="form-control form-control-lg" name="username" id="username" value="<?php echo $row1['username'] ?>">
                    </div>
                    <div class="col-sm-12 mb-4">
                      <label for="email" class="form-label fs-base">Email</label>
                      <input type="text" class="form-control form-control-lg" name="email" id="email" value="<?php echo $row1['email'] ?>">
                    </div>
                    <div class="col-sm-12 mb-4">
                    <label for="alamat" class="form-label fs-base">Alamat</small></label>
                    <textarea type="text" name="alamat" class="form-control form-control-lg" id="alamat" placeholder="Alamat" rows="5"><?php echo $row1['alamat']?></textarea>
                  </div>
                    <div class="col-sm-12 mb-4">
                      <label for="fotoLama" class="form-label fs-base">Foto</label>
                      <br>
                      <input type="file" class="form-control form-control-lg" name="foto" id="foto" value="<?php echo $row1['foto'] ?>"></td>
                      <input type="hidden" class="form-control form-control-lg" name="fotoLama" value="<?php echo $row1['foto'] ?>">
                    </div>

                    <div class="d-flex mb-3">
                      <button type="submit" name="submit" class='btn btn-danger me-4' role='button'>Submit</button>
                      <a class='btn btn-primary' role='button' href='profile.php'>Kembali</a>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>

          </div>
        </div>
        </div>
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
                Data Berhasil Diubah
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