<?php
include "koneksi.php";

$nidn_get = $_GET['nidn'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_dosen WHERE nidn='$nidn_get'"));

if (isset($_POST['update'])) {
    $nama          = $_POST['nama'];
    $email         = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telepon       = $_POST['telepon'];

    // Proses Update ke tabel tb_dosen
    $query = mysqli_query($koneksi, "UPDATE tb_dosen SET nama='$nama', email='$email', jenis_kelamin='$jenis_kelamin', telepon='$telepon' WHERE nidn='$nidn_get'");
    
    if ($query) { 
        echo "<script>alert('Data Dosen Berhasil Diupdate'); window.location='dosen.php';</script>"; 
    } else {
        echo "<script>alert('Gagal Update: " . mysqli_error($koneksi) . "');</script>";
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
                                        <input class="form-control" name="nidn" value="<?php echo $data['nidn']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Nama Dosen</strong></label>
                                        <input class="form-control" name="nama" value="<?php echo $data['nama']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Email</strong></label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>" required>
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
                                        <input class="form-control" name="telepon" value="<?php echo $data['telepon']; ?>" required>
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