<?php
include "koneksi.php";

if (isset($_GET['nidn']) && !empty($_GET['nidn'])) {
    $nidn_get = trim($_GET['nidn']);

    // Gunakan prepared statement untuk DELETE
    $stmt = $koneksi->prepare("DELETE FROM tb_dosen WHERE nidn = ?");
    
    if (!$stmt) {
        echo "<script>alert('Error prepare: " . $koneksi->error . "'); window.location='dosen.php';</script>";
    } else {
        $stmt->bind_param("s", $nidn_get);

        if ($stmt->execute()) {
            echo "<script>alert('Data Dosen Berhasil Dihapus!'); window.location='dosen.php';</script>";
        } else {
            echo "<script>alert('Gagal Hapus Data: " . $stmt->error . "'); window.location='dosen.php';</script>";
        }
        $stmt->close();
    }
} else {
    header("Location: dosen.php");
    exit;
}
?>