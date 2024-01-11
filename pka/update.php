<?php

include "role.php";
include "../koneksi.php";

$id = $_GET['id'];
$nrp = $_GET['nrp'];

$sqlQuery = "SELECT * FROM mahasiswa WHERE id_mhs = '$id'";

//eksekusi query
$result = $koneksi->query($sqlQuery);

//menyimpan hasil
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/style/style.css">
    <title>PKA - Edit Data Mahasiswa </title>
    <link rel="icon" type="image/x-icon" href="asset/img/Institut Teknologi Indonesia.ico">
    
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
                    <a href="pengajuan.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                        Approved Kegiatan
                    </a>
                </li>
                <li>
                    <a href="datamahasiswa.php" class="nav-link active">
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
                    <li>
                        <a class="dropdown-item" href="logout.php">Sign out</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="d-flex flex-column w-100">
            <form class="form-data1 my-5" method="post" action="edit.php" enctype="multipart/form-data">
                <h2 class="text-center">EDIT DATA MAHASISWA</h2>
                <input type="hidden" name="id" value =<?php echo $row['id_mhs']?>>
                <div class="mb-3">
                    <input type="hidden" name="nrp" class="form-control" id="nrp" placeholder="NRP" value="<?php echo $row['nrp']?>">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?php echo $row['nama']?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $row['email']?>">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Jurusan</label>
                    <select class="form-select" id="jurusan" name="jurusan">
                        <option selected disabled>Jurusan</option>
                        <option value="Teknik Informatika" <?php if ($row['jurusan'] === "Teknik Informatika") echo "selected"; ?>>Teknik Informatika</option>
                        <option value="Teknik Sipil" <?php if ($row['jurusan'] === "Teknik Sipil") echo "selected"; ?> >Teknik Sipil</option>
                        <option value="Teknik Industri" <?php if ($row['jurusan'] === "Teknik Industri") echo "selected"; ?> >Teknik Industri</option>
                        <option value="Teknik Mesin" <?php if ($row['jurusan'] === "Teknik Mesin") echo "selected"; ?> >Teknik Mesin</option>
                        <option value="Teknik Kimia" <?php if ($row['jurusan'] === "Teknik Kimia") echo "selected"; ?> >Teknik Kimia</option>
                        <option value="Teknik Elektro" <?php if ($row['jurusan'] === "Teknik Elektro") echo "selected"; ?> >Teknik Elektro</option>
                        <option value="Arsitektur" <?php if ($row['jurusan'] === "Arsitektur") echo "selected"; ?> >Arsitektur</option>
                        <option value="Perencanaan Wilayah Dan Kota" <?php if ($row['jurusan'] === "Perencanaan Wilayah Dan Kota") echo "selected"; ?> >Perencanaan Wilayah Dan Kota</option>
                        <option value="Teknologi Industri Pertanian" <?php if ($row['jurusan'] === "Teknologi Industri Pertanian") echo "selected"; ?> >Teknologi Industri Pertanian</option>
                        <option value="Manajemen" <?php if ($row['jurusan'] === "Manajemen") echo "selected"; ?> >Manajemen</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <select class="form-select" id="semester" name="semester">
                        <option selected disabled>Semester</option>
                        <option value="1" <?php if ($row['semester'] === "1") echo "selected"; ?>>1</option>
                        <option value="2" <?php if ($row['semester'] === "2") echo "selected"; ?>>2</option>
                        <option value="3" <?php if ($row['semester'] === "3") echo "selected"; ?>>3</option>
                        <option value="4" <?php if ($row['semester'] === "4") echo "selected"; ?>>4</option>
                        <option value="5" <?php if ($row['semester'] === "5") echo "selected"; ?>>5</option>
                        <option value="6" <?php if ($row['semester'] === "6") echo "selected"; ?>>6</option>
                        <option value="7" <?php if ($row['semester'] === "7") echo "selected"; ?>>7</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea type="text" name="alamat"class="form-control" id="alamat" placeholder="Alamat" rows="5"><?php echo $row['alamat']?></textarea>
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir"class="form-control" id="tgl_lahir" placeholder="" value="<?php echo $row['tgl_lahir']?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" name="password"class="form-control" id="password" placeholder="password" value="<?php echo $row['password']?>">
                </div>
                <div class="mb-3">
                    <label for="fotoLama" class="form-label">Foto</label>
                    <br>
                    <img src="../asset/foto/mhs/<?php echo $row['foto']?>" alt="" class="mb-2" width="500" height="500">
                    <input type="file" class="form-control" name="foto" id="foto" value="<?php echo $row['foto']?>"></td>
                    <input type="hidden" name="fotoLama" value ="<?php echo $row['foto']?>">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary me-2" type="submit">Submit form</button>
                    <a class="btn btn-primary" role="button" href="datamahasiswa.php">Kembali</a>
                </div>
            </form>
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>