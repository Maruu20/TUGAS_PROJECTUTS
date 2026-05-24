<?php
include "koneksi.php"; 
if (isset($_GET['kode_jurusan'])) {
    $kode_jurusan = mysqli_real_escape_string($koneksi, $_GET['kode_jurusan']); 
    $sql = "DELETE FROM tb_jurusan WHERE kode_jurusan = '$kode_jurusan'"; 
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