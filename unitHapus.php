<?php
include "koneksi.php"; 
if (isset($_GET['kode_unit'])) {
    $kode_unit = mysqli_real_escape_string($koneksi, $_GET['kode_unit']); 
    $sql = "DELETE FROM tb_unit WHERE kode_unit = '$kode_unit'"; 
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        echo "<script> alert('Data Berhasil Dihapus'); window.location='unit.php';</script>";
    } else {
        echo "<script> alert('Data Gagal Dihapus: " . mysqli_error($koneksi) . "');window.location='unit.php';</script>";
    }
} else {
    header("Location: unit.php");
}
?>