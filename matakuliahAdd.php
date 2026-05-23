<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $kode_mk      = $_POST['kode_mk'];
    $nama_mk      = $_POST['nama_mk'];
    $sks          = $_POST['sks'];
    $semester     = $_POST['semester'];
    $kode_jurusan = $_POST['kode_jurusan']; 

    $query = mysqli_query($koneksi, "INSERT INTO tb_matakuliah (kode_mk, nama_mk, sks, semester, kode_jurusan) 
              VALUES ('$kode_mk', '$nama_mk', '$sks', '$semester', '$kode_jurusan')");

    if ($query) {
        echo "<script>alert('Data Matakuliah Berhasil Disimpan'); window.location='matakuliah.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - Tambah Matakuliah</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <link href="css/startmin.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
        <?php include "navbar.php"; include "sidebar.php"; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Form Matakuliah Add</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div style="margin-bottom: 15px;">
                            <a href="matakuliahAdd.php" class="btn btn-danger">Matakuliah Add</a>
                        </div>

                        <div class="panel panel-danger">
                            <div class="panel-heading">Form Matakuliah Add</div>
                            <div class="panel-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label><strong>Input Kode MK</strong></label>
                                        <input type="text" class="form-control" name="kode_mk" required />
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Nama MK</strong></label>
                                        <input type="text" class="form-control" name="nama_mk" required />
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input SKS</strong></label>
                                        <input type="number" class="form-control" name="sks" required />
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Semester</strong></label>
                                        <input type="number" class="form-control" name="semester" required />
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Pilih Jurusan</strong></label>
                                        <select class="form-control" name="kode_jurusan" required>
                                            <option value="">-- Pilih Jurusan --</option>
                                            <?php
                                            // Mengambil data dari tb_jurusan
                                            $sql_jurusan = mysqli_query($koneksi, "SELECT * FROM tb_jurusan");
                                            while ($jurusan = mysqli_fetch_array($sql_jurusan)) {
                                                echo "<option value='" . $jurusan['kode_jurusan'] . "'>" . $jurusan['kode_jurusan'] . " - " . $jurusan['nama_jurusan'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-danger" name="simpan">Simpan</button>
                                    <a href="matakuliah.php" class="btn btn-warning">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/metisMenu.min.js"></script>
    <script src="js/startmin.js"></script>
</body>
</html>