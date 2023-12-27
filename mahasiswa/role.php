<?php
session_start();
// Jika sesi role tidak sesuai, redirect ke halaman login
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'mahasiswa') {
    header("location: ../login.php");
    exit;
}

?>