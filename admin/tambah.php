<?php

    // inisialisasi koneksi db
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_sikm";

    //pembuatan koneksi db
    $conn = new mysqli($servername,$username,$password,$dbname);

    //pengecekan koneksi db
    if($conn -> connect_error){
        die("connection Failed" . $conn -> connect_error);
    }

    //tangkap input user
    $nrp = $_POST['nrp'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $semester = $_POST['semester'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $nilai = $_POST['nilai'];

    //tangkap nama gambar
    $nama_gambar = $_FILES['foto']['name'];
    $tmp_nama_gambar = $_FILES['foto']['tmp_name'];

    //menyimpan gambar ke dalam folder
    move_uploaded_file($tmp_nama_gambar,'asset/foto/'.$nama_gambar);

    //echo $nama_gambar;

    //membuat query
    $querySQL = "INSERT INTO mahasiswa(nrp,nama,jurusan,semester,alamat,password,tgl_lahir,nilai,foto) VALUES ('$nrp','$nama','$jurusan','$semester','$alamat','$password','$tgl_lahir','$nilai','$nama_gambar')";

    //mengeksekusi query
    $hasil = $conn->query($querySQL);

    //kembali ke halaman index
    header('Location: datamahasiswa.php');

?>