<?php
include "koneksi.php"; 
if (isset($_GET['kode_mk'])) {
    $kode_mk = mysqli_real_escape_string($koneksi, $_GET['kode_mk']); 
    $sql = "DELETE FROM tb_matakuliah WHERE kode_mk = '$kode_mk'"; 
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        echo "<script> alert('Data Berhasil Dihapus'); window.location='matakuliah.php';</script>";
    } else {
        echo "<script> alert('Data Gagal Dihapus: " . mysqli_error($koneksi) . "');window.location='matakuliah.php';</script>";
    }
} else {
    header("Location: matakuliah.php");
}
?>