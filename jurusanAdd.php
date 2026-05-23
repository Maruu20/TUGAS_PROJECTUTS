<?php
include "koneksi.php";
if (isset($_POST['simpan'])) {
    $kode_jurusan = $_POST['kode_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];
    // Mengambil kode_unit langsung dari hasil pilihan dropdown select
    $kode_unit    = $_POST['kode_unit']; 

    $query = mysqli_query($koneksi, "INSERT INTO tb_jurusan VALUES ('$kode_jurusan', '$nama_jurusan', '$kode_unit')");
    if ($query) { 
        echo "<script>alert('Data Berhasil Disimpan'); window.location='jurusan.php';</script>"; 
    } else { 
        echo "<script>alert('Gagal: " . mysqli_error($koneksi) . "');</script>"; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/startmin.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title>Tambah Jurusan</title>
</head>
<body>
    <div id="wrapper">
        <?php include "navbar.php"; include "sidebar.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Form Jurusan Add</h3>
                        <div style="margin-bottom: 15px;">
                            <a href="jurusanAdd.php" class="btn btn-danger">Jurusan Add</a>
                        </div>
                        <div class="panel panel-danger">
                            <div class="panel-heading">Form Jurusan Add</div>
                            <div class="panel-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label><strong>Input Kode Jurusan</strong></label>
                                        <input class="form-control" name="kode_jurusan" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label><strong>Input Nama Jurusan</strong></label>
                                        <input class="form-control" name="nama_jurusan" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label><strong>Pilih Fakultas / Unit</strong></label>
                                        <select class="form-control" name="kode_unit" required>
                                            <option value="">-- Pilih Fakultas --</option>
                                            <?php
                                            $sqlU = "SELECT * FROM tb_unit";
                                            $resultU = mysqli_query($koneksi, $sqlU);
                                            
                                            // Perbaikan typo: dari mysqli_fect_array menjadi mysqli_fetch_array
                                            while ($dataU = mysqli_fetch_array($resultU)) {
                                                echo "<option value='".$dataU['kode_unit']."'>".$dataU['nama_unit']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <br>
                                    <button type="submit" name="simpan" class="btn btn-danger">Simpan</button>
                                    <a href="jurusan.php" class="btn btn-warning">Kembali</a>
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