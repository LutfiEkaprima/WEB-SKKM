<?php
error_reporting(0);
session_start();
$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "db_skkm";
$koneksi    = mysqli_connect($host_db,$user_db,$pass_db,$nama_db);
// atur variabel
$err        = "";
$username   = "";

if(isset( $_POST["username"], $_POST["password"] )) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    if($username == '' or $password == ''){
        $err .= "<script>alert('Username / Password tidak boleh kosong')</script>";
        echo $err;
    } else {
        $sql1 = "select * from db_akun where username = '$username'";
        $q1   = mysqli_query($koneksi,$sql1);
        $r1   = mysqli_fetch_array($q1);

        if($r1['username'] == ''){
            $err .= "<script>alert('Username tidak tersedia')</script>";
            echo $err;
        }elseif($r1['password'] != md5($password)){
            $err .= "<script>alert('Password salah')</script>";
            echo $err;
        } else {
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            header("location: ./mahasiswa");
        }
    }

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