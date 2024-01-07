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
    <title>Admin - Edit Data Mahasiswa </title>
    
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
        <h1>Halaman Edit Data Mahasiswa</h1>
    </header>

    <form class="form-data1" method="post" action="edit.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value =<?php echo $row['id_mhs']?>>
        <div class="mb-3">
            <label for="nrp" class="form-label">NRP</label>
            <input type="text" name="nrp" class="form-control" id="nrp" placeholder="NRP" value="<?php echo $row['nrp']?>">
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
            <img src="../asset/foto/mhs/<?php echo $row['foto']?>" alt=""><br>
            <input type="file" class="form-control" name="foto" id="foto" value="<?php echo $row['foto']?>"></td>
            <input type="hidden" name="fotoLama" value ="<?php echo $row['foto']?>">
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>