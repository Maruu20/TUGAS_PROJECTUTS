<?php
include "koneksi.php";
if (isset($_POST['simpan'])) {
    $kode_unit = $_POST['kode_unit'];
    $nama_unit = $_POST['nama_unit'];
    $query = mysqli_query($koneksi, "INSERT INTO tb_unit VALUES ('$kode_unit', '$nama_unit')");
    if ($query) { echo "<script>alert('Data Berhasil Disimpan'); window.location='unit.php';</script>"; }
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
                        <h3>Form Unit Add</h3>
                        <div style="margin-bottom: 15px;">
                            <a href="unitAdd.php" class="btn btn-danger">Unit Add</a>
                        </div>
                        <div class="panel panel-danger">
                            <div class="panel-heading">Form Unit Add</div>
                            <div class="panel-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label><strong>Input Kode Unit</strong></label>
                                        <input class="form-control" name="kode_unit" required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Nama Unit</strong></label>
                                        <input class="form-control" name="nama_unit" required>
                                    </div>
                                    <button type="submit" name="simpan" class="btn btn-danger">Simpan</button>
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