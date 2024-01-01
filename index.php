<?php
session_start();

// Periksa apakah sesi login telah terverifikasi
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: login.php");
    exit;

} else {
    header("Location: login.php");
}

?>