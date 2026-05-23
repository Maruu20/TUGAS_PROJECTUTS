<?php
include "koneksi.php";

if (isset($_GET['nidn'])) {
    $nidn_get = $_GET['nidn'];

    // Query hapus data berdasarkan nidn
    $query = mysqli_query($koneksi, "DELETE FROM tb_dosen WHERE nidn = '$nidn_get'");

    if ($query) {
        echo "<script>alert('Data Dosen Berhasil Dihapus!'); window.location='dosen.php';</script>";
    } else {
        echo "<script>alert('Gagal Hapus Data: " . mysqli_error($koneksi) . "'); window.location='dosen.php';</script>";
    }
} else {
    // Jika diakses tanpa parameter langsung kembalikan ke halaman utama
    header("Location: dosen.php");
}
?>