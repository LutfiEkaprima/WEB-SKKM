<?php
include "../koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$username = $_POST['username'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];
$tgl_lahir = $_POST['tgl_lahir'];
$email = $_POST['email'];

$nama_gambar = $_FILES['foto']['name'];
$timestamp = time();
$nama_gambar_baru = $timestamp . '_' . $nama_gambar;

$tmp_nama_gambar = $_FILES['foto']['tmp_name'];

$fotoLama = $_POST['fotoLama'];

if ($nama_gambar_baru) {
    // Periksa apakah foto lama ada di direktori
    $fotoPath = '../asset/foto/pka/' . $fotoLama;
    if (file_exists($fotoPath)) {
        // Hapus foto lama jika ada
        unlink($fotoPath);
    }

    // Jika foto baru memiliki nama yang sama dengan foto lama, tetap gunakan nama yang sama
    if ($nama_gambar_baru === $fotoLama) {
        $nama_gambar_baru= $fotoLama; // Gunakan nama foto lama
    } else {
        // Simpan gambar baru dengan nama yang berbeda
        move_uploaded_file($tmp_nama_gambar, '../asset/foto/pka/' . $nama_gambar_baru);
    }

    // Buat query untuk update dengan foto baru
    $querySQL = "UPDATE pka SET nama = '$nama', jabatan = '$jabatan', username ='$username', alamat ='$alamat', password='$password', tgl_lahir='$tgl_lahir', email = '$email', foto = '$nama_gambar_baru' WHERE idpka = '$id'";
} else {
    // Buat query untuk update tanpa mengubah foto
    $querySQL = "UPDATE pka SET nama = '$nama', jabatan = '$jabatan', username ='$username', alamat ='$alamat', password='$password', tgl_lahir='$tgl_lahir', email = '$email' WHERE idpka = '$id'";
}

$hasil = $koneksi->query($querySQL);

sleep(2);
header('Location: datapka.php');
?>
