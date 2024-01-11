<?php

include '../koneksi.php';
include "role.php";

$nrp = $row1['nrp'];

$sqlQuery = "SELECT * from mahasiswa where nrp='$nrp'";
$result = $koneksi->query($sqlQuery);

if (isset($_POST['submit'])) {
    $id = $row1['id_mhs'];
    $nrp = $_POST['nrp'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $semester = $_POST['semester'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $nama_gambar = $_FILES['foto']['name'];
    $timestamp = time();
    $nama_gambar_baru = $timestamp . '_' . $nama_gambar;

    $tmp_nama_gambar = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp_nama_gambar,'../asset/foto/mhs/'.$nama_gambar_baru);

    $fotoLama = $_POST['fotoLama'];

    if ($nama_gambar_baru) {
        // Periksa apakah foto lama ada di direktori
        $fotoPath = '../asset/foto/mhs/' . $fotoLama;
        if (file_exists($fotoPath)) {
            // Hapus foto lama jika ada
            unlink($fotoPath);
        }

        // Buat query untuk update dengan foto baru
        move_uploaded_file($tmp_nama_gambar,'../asset/foto/mhs/'.$nama_gambar_baru);
        
        $querySQL = "UPDATE mahasiswa SET nrp = '$nrp', nama = '$nama', jurusan ='$jurusan', semester ='$semester', alamat = '$alamat', tgl_lahir='$tgl_lahir', email = '$email' , foto = '$nama_gambar_baru' WHERE id_mhs = '$id'";
    } else {
        // Buat query untuk update tanpa mengubah foto
        $querySQL = "UPDATE mahasiswa SET nrp = '$nrp', nama = '$nama', jurusan ='$jurusan', semester ='$semester', alamat = '$alamat', tgl_lahir='$tgl_lahir', email = '$email' WHERE id_mhs = '$id'";
    }

    $hasil = $koneksi->query($querySQL);
    header("Refresh: 2; url=profilmahasiswa.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa - Ubah Data Diri</title>
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

    <div class="d-flex flex-column w-100">
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
              <form class="border-bottom pb-3 pb-lg-4" method="post" action="" enctype="multipart/form-data">
                <input type="hidden" class="form-control form-control-lg" name="nrp" id="nrp" value="<?php echo $row1['nrp'] ?>">
                <div class="row pb-2">
                  <div class="col-sm-12 mb-4">
                    <label for="nama" class="form-label fs-base">Nama Lengkap</label>
                    <input type="text" class="form-control form-control-lg" name="nama" id="nama" value="<?php echo $row1['nama'] ?>">
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="email" class="form-label fs-base">Email address</label>
                    <input type="email" class="form-control form-control-lg" name="email" id="email" value="<?php echo $row1['email'] ?>">
                  </div>
                  <div class="col-sm-6 mb-4">
                        <label for="nama" class="form-label fs-base">Jurusan</label>
                        <select class="form-select form-select-lg" id="jurusan" name="jurusan">
                            <option selected disabled>Jurusan</option>
                            <option value="Teknik Informatika" <?php if ($row1['jurusan'] === "Teknik Informatika") echo "selected"; ?>>Teknik Informatika</option>
                            <option value="Teknik Sipil" <?php if ($row1['jurusan'] === "Teknik Sipil") echo "selected"; ?> >Teknik Sipil</option>
                            <option value="Teknik Industri" <?php if ($row1['jurusan'] === "Teknik Industri") echo "selected"; ?> >Teknik Industri</option>
                            <option value="Teknik Mesin" <?php if ($row1['jurusan'] === "Teknik Mesin") echo "selected"; ?> >Teknik Mesin</option>
                            <option value="Teknik Kimia" <?php if ($row1['jurusan'] === "Teknik Kimia") echo "selected"; ?> >Teknik Kimia</option>
                            <option value="Teknik Elektro" <?php if ($row1['jurusan'] === "Teknik Elektro") echo "selected"; ?> >Teknik Elektro</option>
                            <option value="Arsitektur" <?php if ($row1['jurusan'] === "Arsitektur") echo "selected"; ?> >Arsitektur</option>
                            <option value="Perencanaan Wilayah Dan Kota" <?php if ($row1['jurusan'] === "Perencanaan Wilayah Dan Kota") echo "selected"; ?> >Perencanaan Wilayah Dan Kota</option>
                            <option value="Teknologi Industri Pertanian" <?php if ($row1['jurusan'] === "Teknologi Industri Pertanian") echo "selected"; ?> >Teknologi Industri Pertanian</option>
                            <option value="Manajemen" <?php if ($row1['jurusan'] === "Manajemen") echo "selected"; ?> >Manajemen</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <label for="semester" class="form-label fs-base">Semester</label>
                        <select class="form-select form-select-lg" id="semester" name="semester">
                            <option selected disabled>Semester</option>
                            <option value="1" <?php if ($row1['semester'] === "1") echo "selected"; ?>>1</option>
                            <option value="2" <?php if ($row1['semester'] === "2") echo "selected"; ?>>2</option>
                            <option value="3" <?php if ($row1['semester'] === "3") echo "selected"; ?>>3</option>
                            <option value="4" <?php if ($row1['semester'] === "4") echo "selected"; ?>>4</option>
                            <option value="5" <?php if ($row1['semester'] === "5") echo "selected"; ?>>5</option>
                            <option value="6" <?php if ($row1['semester'] === "6") echo "selected"; ?>>6</option>
                            <option value="7" <?php if ($row1['semester'] === "7") echo "selected"; ?>>7</option>
                        </select>
                    </div>
                  <div class="col-sm-6 mb-4">
                    <label for="tgl_lahir" class="form-label fs-base">Tanggal Lahir</small></label>
                    <input type="date" class="form-control form-control-lg" name="tgl_lahir" id="tgl_lahir" value="<?php echo $row1['tgl_lahir'] ?>">
                  </div>
                  <div class="col-sm-12 mb-4">
                    <label for="fotoLama" class="form-label fs-base">Foto</label>
                    <br>
                    <input type="file" class="form-control form-control-lg" name="foto" id="foto" value="<?php echo $row1['foto'] ?>"></td>
                    <input type="hidden" class="form-control form-control-lg" name="fotoLama" value="<?php echo $row1['foto'] ?>">
                  </div>
                  <div class="col-sm-12 mb-4">
                    <label for="alamat" class="form-label fs-base">Alamat</small></label>
                    <textarea type="text" name="alamat" class="form-control form-control-lg" id="alamat" placeholder="Alamat" rows="5"><?php echo $row1['alamat']?></textarea>
                  </div>

                  <div class="d-flex mb-3">
                    <button type="submit" name="submit" class='btn btn-danger me-4' role='button'>Submit</button>
                    <a class='btn btn-primary' role='button' href='profilmahasiswa.php'>Kembali</a>
                  </div>
                </div>
              </form>
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