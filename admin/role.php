<?php
session_start();

include "../koneksi.php";

$username = $_SESSION['username'];

$querySQL1 = "SELECT * FROM admin WHERE username = '$username'";

$result1 = $koneksi->query($querySQL1);
$row1 = $result1->fetch_assoc();

// Jika sesi role tidak sesuai, redirect ke halaman login
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("location: ../login.php");
    exit;
}

?>