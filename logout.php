<?php
session_destroy();

// Redirect ke halaman login setelah logout
header("Location: login.php");
?>