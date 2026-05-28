<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // Cek apakah pengguna sudah login, kecuali di halaman login.php
    $current_page = basename($_SERVER['PHP_SELF']);
    if ($current_page !== 'login.php' && !isset($_SESSION['username'])) {
        header("Location: login.php");
        exit;
    }
    
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "db_maru";

    $koneksi = mysqli_connect($host, $user, $pass, $db);
    if (!$koneksi) {
      echo "Koneksi_Gagal : " . mysqli_connect_error();
    } else {
      echo "";
    }
?>