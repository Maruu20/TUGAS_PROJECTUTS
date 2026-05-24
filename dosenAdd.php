<?php
include "koneksi.php";

$error = "";
$success = false;

if (isset($_POST['simpan'])) {
    $nidn          = isset($_POST['nidn']) ? trim($_POST['nidn']) : "";
    $nama          = isset($_POST['nama']) ? trim($_POST['nama']) : "";
    $email         = isset($_POST['email']) ? trim($_POST['email']) : "";
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? trim($_POST['jenis_kelamin']) : "";
    $telepon       = isset($_POST['telepon']) ? trim($_POST['telepon']) : "";

    // Validasi input
    if (empty($nidn)) {
        $error = "NIDN harus diisi!";
    } else if (empty($nama)) {
        $error = "Nama Dosen harus diisi!";
    } else if (empty($email)) {
        $error = "Email harus diisi!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid!";
    } else if (empty($jenis_kelamin) || $jenis_kelamin === "") {
        $error = "Jenis Kelamin harus dipilih!";
    } else if (empty($telepon)) {
        $error = "Telepon harus diisi!";
    } else {
        // Gunakan prepared statement untuk keamanan
        $stmt = $koneksi->prepare("INSERT INTO tb_dosen (nidn, nama, email, jenis_kelamin, telepon) VALUES (?, ?, ?, ?, ?)");
        
        if (!$stmt) {
            $error = "Error prepare: " . $koneksi->error;
        } else {
            $stmt->bind_param("sssss", $nidn, $nama, $email, $jenis_kelamin, $telepon);
            
            if ($stmt->execute()) {
                $success = true;
                echo "<script>alert('Data Dosen Berhasil Disimpan'); window.location='dosen.php';</script>";
                exit;
            } else {
                $error = "Gagal menyimpan data: " . $stmt->error;
            }
            $stmt->close();
        }
    }
    
    if ($error) {
        echo "<script>alert('" . addslashes($error) . "'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/startmin.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <?php include "navbar.php"; include "sidebar.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Form Dosen Add</h3>
                        <div style="margin-bottom: 15px;">
                            <a href="dosenAdd.php" class="btn btn-danger">Dosen Add</a>
                        </div>
                        <div class="panel panel-danger">
                            <div class="panel-heading">Form Dosen Add</div>
                            <div class="panel-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label><strong>Input NIDN</strong></label>
                                        <input class="form-control" name="nidn" required placeholder="Contoh: 081234567">
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Nama Dosen</strong></label>
                                        <input class="form-control" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Email</strong></label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Jenis Kelamin</strong></label>
                                        <select class="form-control" name="jenis_kelamin" required>
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Telepon</strong></label>
                                        <input class="form-control" name="telepon" required>
                                    </div>
                                    <button type="submit" name="simpan" class="btn btn-danger">Simpan</button>
                                    <a href="dosen.php" class="btn btn-warning">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>