<?php
error_reporting(0); // Untuk menyembunyikan pesan error, tapi sebaiknya dihindari di lingkungan produksi
session_start();

include "koneksi.php";

$err        = "";
$username   = "";


if (isset($_POST["username"], $_POST["password"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == '' or $password == '') {
        $err = "Username / Password tidak boleh kosong";
    } else {
        $sql1 = "SELECT * FROM mahasiswa WHERE nrp = '$username' AND password = '$password'";
        $sql2 = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        
        $q1 = mysqli_query($koneksi, $sql1);
        $q2 = mysqli_query($koneksi, $sql2);

        if (mysqli_num_rows($q1) > 0) {
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["role"] = 'mahasiswa'; // Menambahkan informasi peran
            header("location: ./mahasiswa?nrp=$username");
        } elseif (mysqli_num_rows($q2) > 0) {
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["role"] = 'admin'; // Menambahkan informasi peran
            header("location: ./admin?username=$username");
        } else {
            $err = "Username atau Password yang anda masukkan salah";
        }
    }
    echo "<script>alert('$err');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="asset/css/csslogin.css">
</head>
<body>
    <div class="login-ngab">
        <h1>Login SIKM</h1>
        <form action="" method="post">
            <input id="username" type="text" name="username" placeholder="Username">
            <input id="password" type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
        <br>
    </div>
</body>
</html>