<?php
include "koneksi.php";

$nim_get = $_GET['nim'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa WHERE nim='$nim_get'"));

if (isset($_POST['update'])) {
    $nama          = $_POST['nama'];
    $tempat_lahir  = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_hp         = $_POST['no_hp'];
    $kode_jurusan  = $_POST['kode_jurusan']; // Mengambil perubahan kode jurusan dari dropdown


    $query = mysqli_query($koneksi, "UPDATE tb_mahasiswa SET 
        nama          = '$nama', 
        tempat_lahir  = '$tempat_lahir', 
        tanggal_lahir = '$tanggal_lahir', 
        no_hp         = '$no_hp',
        kode_jurusan  = '$kode_jurusan' 
        WHERE nim     = '$nim_get'");
    
    if ($query) { 
        echo "<script>alert('Data Mahasiswa Berhasil Diupdate'); window.location='mahasiswa.php';</script>"; 
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
    <title>Data Mahasiswa</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <link href="css/startmin.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
        <?php
            include "navbar.php";
            include "sidebar.php";
        ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h3>Form Mahasiswa Edit</h3>
                        
                        <div style="margin-bottom: 15px;">
                            <a href="mahasiswaAdd.php" class="btn btn-danger">Mahasiswa Add</a>
                        </div>

                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                Form Mahasiswa Edit
                            </div>
                            <div class="panel-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label><strong>Input NIM</strong></label>
                                        <input type="text" class="form-control" name="nim" value="<?php echo $data['nim']; ?>" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Nama</strong></label>
                                        <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Tempat Lahir</strong></label>
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input Tanggal Lahir</strong></label>
                                        <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Input No HP</strong></label>
                                        <input type="number" class="form-control" name="no_hp" value="<?php echo $data['no_hp']; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Pilih Jurusan</strong></label>
                                        <select class="form-control" name="kode_jurusan" required>
                                            <option value="">-- Pilih Jurusan --</option>
                                            <?php
                                            $sql_jurusan = mysqli_query($koneksi, "SELECT * FROM tb_jurusan");
                                            while ($jurusan = mysqli_fetch_array($sql_jurusan)) {
                                                $selected = ($jurusan['kode_jurusan'] == $data['kode_jurusan']) ? 'selected' : '';

                                                echo "<option value='" . $jurusan['kode_jurusan'] . "' $selected>" . $jurusan['kode_jurusan'] . " - " . $jurusan['nama_jurusan'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-danger" name="update">Simpan</button>
                                    <a href="mahasiswa.php" class="btn btn-warning">Kembali</a>
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