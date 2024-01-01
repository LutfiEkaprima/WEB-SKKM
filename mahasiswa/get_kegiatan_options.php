<?php
$selectedNamaKegiatan = $_GET['nama_kegiatan'];

include "../koneksi.php";

$sqlBentukKegiatan = "SELECT DISTINCT bentuk_kegiatan FROM jenis_kegiatan WHERE nama_kegiatan = '$selectedNamaKegiatan'";
$resultBentukKegiatan = mysqli_query($koneksi, $sqlBentukKegiatan);

$bentukKegiatanOptions = [];
if ($resultBentukKegiatan && mysqli_num_rows($resultBentukKegiatan) > 0) {
    while ($row = mysqli_fetch_assoc($resultBentukKegiatan)) {
        $bentukKegiatanOptions[] = $row['bentuk_kegiatan'];
    }
}

$sqlTingkatan = "SELECT DISTINCT tingkatan FROM jenis_kegiatan WHERE nama_kegiatan = '$selectedNamaKegiatan'";
$resultTingkatan = mysqli_query($koneksi, $sqlTingkatan);

$tingkatanOptions = [];
if ($resultTingkatan && mysqli_num_rows($resultTingkatan) > 0) {
    while ($row = mysqli_fetch_assoc($resultTingkatan)) {
        $tingkatanOptions[] = $row['tingkatan'];
    }
}

$response = [
    'bentukKegiatanOptions' => $bentukKegiatanOptions,
    'tingkatanOptions' => $tingkatanOptions
];

// Mengirimkan respon sebagai JSON
header('Content-Type: application/json');
echo json_encode($response);
?>