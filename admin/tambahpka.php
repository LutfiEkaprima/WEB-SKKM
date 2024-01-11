<?php
    include "../koneksi.php";

    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $username = $_POST['username'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $email = $_POST['email'];

    $nama_gambar = $_FILES['foto']['name'];
    $tmp_nama_gambar = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp_nama_gambar,'../asset/foto/pka/'.$nama_gambar);

    $querySQL = "INSERT INTO pka(nama,jabatan,username,alamat,password,tgl_lahir,email,foto) VALUES ('$nama','$jabatan','$username','$alamat','$password','$tgl_lahir','$email','$nama_gambar')";

    try {
        $hasil = $koneksi->query($querySQL);

        if(!$hasil) {
            throw new Exception("Terjadi kesalahan. Data tidak dapat disimpan.");
        }
        sleep(2);
        header('Location: datapka.php');
    } catch (Exception $e) {
        echo '<script>alert("' . $e->getMessage() . '");</script>';
        echo '<script>window.location.href = "create.php";</script>'; 
    }
?>
