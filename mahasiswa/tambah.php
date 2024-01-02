<?php

include '../koneksi.php';


$nrp = $_POST['nrp'];
$bentuk_kegiatan = $_POST['bentuk_kegiatan'];
$nama_kegiatan = $_POST['nama_kegiatan'];
$tingkatan = $_POST['tingkatan'];
$tgl_pengajuan = $_POST['tgl_pengajuan'];

$nama_gambar = $_FILES['foto']['name'];
$tmp_nama_gambar = $_FILES['foto']['tmp_name'];
move_uploaded_file($tmp_nama_gambar,'../asset/sertif/'.$nama_gambar);

// Ambil id_jnskegiatan dari tabel jenis_kegiatan berdasarkan inputan form
$stmt = $koneksi->prepare("SELECT id_jnskegiatan, nilai_kegiatan FROM jenis_kegiatan WHERE bentuk_kegiatan = ? AND nama_kegiatan = ? AND tingkatan = ?");
$stmt->bind_param("sss", $bentuk_kegiatan, $nama_kegiatan, $tingkatan);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Jika data ditemukan, simpan ke tabel pengajuan
    $row = $result->fetch_assoc();
    $id_jnskegiatan = $row['id_jnskegiatan'];
    $nilai_kegiatan = $row['nilai_kegiatan'];

    // Lakukan insert ke tabel pengajuan
    $sql_insert = "INSERT INTO pengajuan (nrp, id_jnskegiatan, nilai, status, tanggal_pengajuan, foto)
                   VALUES ('$nrp', ?, '$nilai_kegiatan', 0, '$tgl_pengajuan', '$nama_gambar')";
    $stmt_insert = $koneksi->prepare($sql_insert);
    $stmt_insert->bind_param("s", $id_jnskegiatan);

    if ($stmt_insert->execute()) {
        echo "Pengajuan berhasil diajukan!";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $koneksi->error;
    }
} else {
    echo "Data kegiatan tidak ditemukan!";
}

// Tutup koneksi database
$koneksi->close();

header("Location: pengajuan.php");

?>