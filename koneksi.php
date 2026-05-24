<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "db_maru";

    // Menggunakan object-oriented style untuk prepared statements
    $koneksi = new mysqli($host, $user, $pass, $db);
    
    // Set charset untuk keamanan
    $koneksi->set_charset("utf8");
    
    if ($koneksi->connect_error) {
        die("Koneksi Gagal: " . $koneksi->connect_error);
    }

    // Proteksi halaman: periksa apakah pengguna telah masuk (logged in)
    $current_page = basename($_SERVER['SCRIPT_NAME']);
    if (!isset($_SESSION['user_id']) && $current_page != 'login.php' && $current_page != 'logout.php') {
        header("Location: login.php");
        exit;
    }
?>