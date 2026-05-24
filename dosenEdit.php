<?php
include "koneksi.php";

if (!isset($_GET['nidn']) || empty($_GET['nidn'])) {
    header("Location: dosen.php");
    exit;
}

$nidn_get = trim($_GET['nidn']);

// Gunakan prepared statement untuk SELECT
$stmt = $koneksi->prepare("SELECT * FROM tb_dosen WHERE nidn = ?");

if (!$stmt) {
    echo "<script>alert('Error prepare SELECT: " . $koneksi->error . "'); window.location='dosen.php';</script>";
    exit;
}

$stmt->bind_param("s", $nidn_get);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_array();
$stmt->close();

if (!$data) {
    echo "<script>alert('Data dosen tidak ditemukan!'); window.location='dosen.php';</script>";
    exit;
}

if (isset($_POST['update'])) {
    $nama          = isset($_POST['nama']) ? trim($_POST['nama']) : "";
    $email         = isset($_POST['email']) ? trim($_POST['email']) : "";
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? trim($_POST['jenis_kelamin']) : "";
    $telepon       = isset($_POST['telepon']) ? trim($_POST['telepon']) : "";

    $error = "";
    
    // Validasi input
    if (empty($nama)) {
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
        // Gunakan prepared statement untuk UPDATE
        $stmt = $koneksi->prepare("UPDATE tb_dosen SET nama=?, email=?, jenis_kelamin=?, telepon=? WHERE nidn=?");
        
        if (!$stmt) {
            $error = "Error prepare UPDATE: " . $koneksi->error;
        } else {
            $stmt->bind_param("sssss", $nama, $email, $jenis_kelamin, $telepon, $nidn_get);
            
            if ($stmt->execute()) {
                echo "<script>alert('Data Dosen Berhasil Diupdate'); window.location='dosen.php';</script>";
                exit;
            } else {
                $error = "Gagal Update: " . $stmt->error;
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
                        <h3>Form Dosen Edit</h3>
                        <div style="margin-bottom: 15px;">
                            <a href="dosenAdd.php" class="btn btn-danger">Dosen Add</a>
                        </div>
                        <div class="panel panel-danger">
                            <div class="panel-heading">Form Dosen Edit</div>
                            <div class="panel-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label><strong>Input NIDN</strong></label>
                                        <input class="form-control" name="nidn" value="<?php echo htmlspecialchars($data['nidn']); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Nama Dosen</strong></label>
                                        <input class="form-control" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Email</strong></label>
                                        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Jenis Kelamin</strong></label>
                                        <select class="form-control" name="jenis_kelamin" required>
                                            <option value="Laki-laki" <?php if($data['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                            <option value="Perempuan" <?php if($data['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Telepon</strong></label>
                                        <input class="form-control" name="telepon" value="<?php echo htmlspecialchars($data['telepon']); ?>" required>
                                    </div>
                                    <button type="submit" name="update" class="btn btn-danger">Simpan</button>
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