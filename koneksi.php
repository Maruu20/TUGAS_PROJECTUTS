<?php
    session_start();
    
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