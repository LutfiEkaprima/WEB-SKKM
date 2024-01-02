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
            <a href="index.php">Home</a>a
        </nav>
    </header>
    <?php
        //tangkap id mhs yang ingin di read
        $id = $_GET['id']; 
        //query
        $sqlQuery = "SELECT * FROM pka WHERE idpka = '$id'";

        //eksekusi query
        $result = $koneksi->query($sqlQuery);

        //menyimpan hasil
        $row = $result->fetch_assoc();
    ?>

    <section>
        <h3>Nama: <?php echo $row['nama']?></h3>
        <h3>Jabatan: <?php echo $row['jabatan']?></h3>
        <h3>Email: <?php echo $row['email']?></h3>
        <h3>Username: <?php echo $row['username']?></h3>
        <h3>Tanggal Lahir: <?php echo $row['tgl_lahir']?></h3>
        <h3>Alamat: <?php echo $row['alamat']?></h3>
            <div>
                <img src="../asset/foto/mhs/<?php echo $row['foto']?>" alt="tidak ada foto">
            </div>    
    </section>

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

</body>
</html> 