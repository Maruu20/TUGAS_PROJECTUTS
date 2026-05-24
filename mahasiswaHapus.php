<?php
include "koneksi.php"; 
$nim = $_GET['nim']; 
$sql = "DELETE FROM tb_mahasiswa WHERE nim ='$nim'"; 
$result = mysqli_query($koneksi, $sql);

if ($result) {
    echo "<script> alert('Data Berhasil Dihapus'); window.location='mahasiswa.php';</script>";
} else {
    echo "<script> alert('Data Gagal Dihapus: ".mysqli_error($koneksi)."'); window.location='mahasiswa.php';</script>";
}
?>
