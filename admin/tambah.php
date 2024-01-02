<?php
    include "../koneksi.php";

    $nrp = $_POST['nrp'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $semester = $_POST['semester'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $nilai = $_POST['nilai'];
    $email = $_POST['email'];

    $nama_gambar = $_FILES['foto']['name'];
    $tmp_nama_gambar = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp_nama_gambar,'../asset/foto/mhs/'.$nama_gambar);

    $querySQL = "INSERT INTO mahasiswa(nrp,nama,jurusan,semester,alamat,password,tgl_lahir,nilai,foto,email) VALUES ('$nrp','$nama','$jurusan','$semester','$alamat','$password','$tgl_lahir','$nilai','$nama_gambar','$email')";

    try {
        $hasil = $koneksi->query($querySQL);

        if(!$hasil) {
            throw new Exception("Terjadi kesalahan. Data tidak dapat disimpan.");
        }

        header('Location: datamahasiswa.php');
    } catch (Exception $e) {
        echo '<script>alert("' . $e->getMessage() . '");</script>';
        echo '<script>window.location.href = "create.php";</script>'; 
    }
?>
