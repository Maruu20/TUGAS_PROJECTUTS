<?php
include "koneksi.php";
$kode_get = $_GET['kode_unit'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_unit WHERE kode_unit='$kode_get'"));

if (isset($_POST['update'])) {
    $nama_unit = $_POST['nama_unit'];
    $query = mysqli_query($koneksi, "UPDATE tb_unit SET nama_unit='$nama_unit' WHERE kode_unit='$kode_get'");
    if ($query) { echo "<script>alert('Data Berhasil Diupdate'); window.location='unit.php';</script>"; }
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
                        <h3>Form Unit Edit</h3>
                        <div style="margin-bottom: 15px;">
                            <a href="unitAdd.php" class="btn btn-danger">Unit Add</a>
                        </div>
                        <div class="panel panel-danger">
                            <div class="panel-heading">Form Unit Edit</div>
                            <div class="panel-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label><strong>Input Kode Unit</strong></label>
                                        <input class="form-control" name="kode_unit" value="<?php echo $data['kode_unit']; ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Nama Unit</strong></label>
                                        <input class="form-control" name="nama_unit" value="<?php echo $data['nama_unit']; ?>" required>
                                    </div>
                                    <button type="submit" name="update" class="btn btn-danger">Simpan</button>
                                    <a href="unit.php" class="btn btn-warning">Kembali</a>
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