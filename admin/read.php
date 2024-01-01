<?php

include "../koneksi.php";
include "role.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Data</title>
</head>
<body>
    <header>
        <h1>Halaman Read Data</h1>
        <nav>
            <a href="datapka.php">Home</a>
        </nav>
    </header>
    <?php
        //tangkap id mhs yang ingin di read
        $id = $_GET['id']; 
        //query
        $sqlQuery = "SELECT * FROM mahasiswa WHERE id_mhs = '$id'";

        //eksekusi query
        $result = $koneksi->query($sqlQuery);

        //menyimpan hasil
        $row = $result->fetch_assoc();
    ?>

    <section>
        <h3>Nama: <?php echo $row['nama']?></h3>
        <h3>NRP: <?php echo $row['nrp']?></h3>
        <h3>Jurusan: <?php echo $row['jurusan']?></h3>
        <h3>Semester: <?php echo $row['semester']?></h3>
        <h3>Tanggal Lahir: <?php echo $row['tgl_lahir']?></h3>
        <h3>Nilai: <?php echo $row['nilai']?></h3>
        <h3>Alamat: <?php echo $row['alamat']?></h3>
        <!-- <h3>File Foto: <?php echo $row['foto']?></h3> -->
         <div>
            <img src="../asset/foto/mhs/<?php echo $row['foto']?>" alt="tidak ada foto">
        </div>    
    </section>

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
  
</body>
</html> 