<?php
session_start();

// Periksa apakah sesi login telah terverifikasi
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Index</h1>
    <!-- Konten halaman index -->
    <a href="logout.php">quit</a>
</body>
</html>
