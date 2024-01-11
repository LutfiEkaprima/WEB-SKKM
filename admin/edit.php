<?php
include "../koneksi.php";

$id = $_POST['id'];
$nrp = $_POST['nrp'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$semester = $_POST['semester'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];
$tgl_lahir = $_POST['tgl_lahir'];
$email = $_POST['email'];

$nama_gambar = $_FILES['foto']['name'];
$tmp_nama_gambar = $_FILES['foto']['tmp_name'];
$fotoLama = $_POST['fotoLama'];

if ($nama_gambar) {
    // Periksa apakah foto lama ada di direktori
    $fotoPath = '../asset/foto/mhs/' . $fotoLama;
    if (file_exists($fotoPath)) {
        // Hapus foto lama jika ada
        unlink($fotoPath);
    }

    // Jika foto baru memiliki nama yang sama dengan foto lama, tetap gunakan nama yang sama
    if ($nama_gambar === $fotoLama) {
        $nama_gambar = $fotoLama; // Gunakan nama foto lama
    } else {
        // Simpan gambar baru dengan nama yang berbeda
        move_uploaded_file($tmp_nama_gambar, '../asset/foto/mhs/' . $nama_gambar);
    }

    // Buat query untuk update dengan foto baru
    $querySQL = "UPDATE mahasiswa SET nrp = '$nrp', nama = '$nama', jurusan ='$jurusan', semester ='$semester', alamat = '$alamat', password='$password', tgl_lahir='$tgl_lahir', email = '$email' , foto = '$nama_gambar' WHERE id_mhs = '$id'";
} else {
    // Buat query untuk update tanpa mengubah foto
    $querySQL = "UPDATE mahasiswa SET nrp = '$nrp', nama = '$nama', jurusan ='$jurusan', semester ='$semester', alamat = '$alamat', password='$password', tgl_lahir='$tgl_lahir', email = '$email' WHERE id_mhs = '$id'";
}

$hasil = $koneksi->query($querySQL);
sleep(2);
header('Location: datamahasiswa.php');
?>
