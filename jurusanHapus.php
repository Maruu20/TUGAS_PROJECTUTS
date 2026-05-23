<?php
include "koneksi.php"; 
if (isset($_GET['kode_jurusan'])) {
    $kode_mk = mysqli_real_escape_string($koneksi, $_GET['kode_jurusan']); 
    $sql = "DELETE FROM tb_matakuliah WHERE kode_mk = '$kode_mk'"; 
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        echo "<script> alert('Data Berhasil Dihapus'); window.location='jurusan.php';</script>";
    } else {
        echo "<script> alert('Data Gagal Dihapus: " . mysqli_error($koneksi) . "');window.location='jurusan.php';</script>";
    }
} else {
    header("Location: jurusan.php");
}
?>