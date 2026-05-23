<?php
include "koneksi.php";

$kode_get = $_GET['kode_mk'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_matakuliah WHERE kode_mk='$kode_get'"));

if (isset($_POST['update'])) {
    $nama_mk      = $_POST['nama_mk'];
    $sks          = $_POST['sks'];
    $semester     = $_POST['semester'];
    $kode_jurusan = $_POST['kode_jurusan']; // Menangkap perubahan jurusan dari dropdown

    // Query UPDATE termasuk mengubah kolom kode_jurusan
    $query = mysqli_query($koneksi, "UPDATE tb_matakuliah SET 
        nama_mk      = '$nama_mk', 
        sks          = '$sks', 
        semester     = '$semester',
        kode_jurusan = '$kode_jurusan' 
        WHERE kode_mk = '$kode_get'");
    
    if ($query) { 
        echo "<script>alert('Data Matakuliah Berhasil Diupdate'); window.location='matakuliah.php';</script>"; 
    } else {
        echo "<script>alert('Gagal Update: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - Edit Matakuliah</title>
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
                        <h1 class="page-header">Form Matakuliah Edit</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div style="margin-bottom: 15px;">
                            <a href="matakuliahAdd.php" class="btn btn-danger">Matakuliah Add</a>
                        </div>

                        <div class="panel panel-danger">
                            <div class="panel-heading">Form Matakuliah Edit</div>
                            <div class="panel-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label><strong>Input Kode MK</strong></label>
                                        <input type="text" class="form-control" name="kode_mk" value="<?php echo $data['kode_mk']; ?>" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Nama MK</strong></label>
                                        <input type="text" class="form-control" name="nama_mk" value="<?php echo $data['nama_mk']; ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input SKS</strong></label>
                                        <input type="number" class="form-control" name="sks" value="<?php echo $data['sks']; ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Semester</strong></label>
                                        <input type="number" class="form-control" name="semester" value="<?php echo $data['semester']; ?>" required />
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Pilih Jurusan</strong></label>
                                        <select class="form-control" name="kode_jurusan" required>
                                            <option value="">-- Pilih Jurusan --</option>
                                            <?php
                                            $sql_jurusan = mysqli_query($koneksi, "SELECT * FROM tb_jurusan");
                                            while ($jurusan = mysqli_fetch_array($sql_jurusan)) {
                                                // Logika selected untuk mengunci jurusan yang sudah diinput sebelumnya
                                                $selected = ($jurusan['kode_jurusan'] == $data['kode_jurusan']) ? 'selected' : '';
                                                
                                                echo "<option value='" . $jurusan['kode_jurusan'] . "' $selected>" . $jurusan['kode_jurusan'] . " - " . $jurusan['nama_jurusan'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-danger" name="update">Simpan</button>
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