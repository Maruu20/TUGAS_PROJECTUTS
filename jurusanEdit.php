<?php
include "koneksi.php";

// 1. Memeriksa apakah ada parameter 'kode_jurusan' di URL (Proses Pengambilan Data)
if (isset($_GET['kode_jurusan'])) {
    $kode_jurusan_get = $_GET['kode_jurusan'];
    
    // Ambil data jurusan berdasarkan kode yang dipilih
    $sqlEdit = "SELECT * FROM tb_jurusan WHERE kode_jurusan = '$kode_jurusan_get'";
    $resultEdit = mysqli_query($koneksi, $sqlEdit);
    $data = mysqli_fetch_array($resultEdit);

    // Jika data tidak ditemukan di database, kembalikan ke halaman utama
    if (!$data) {
        echo "<script>alert('Data tidak ditemukan!'); window.location='jurusan.php';</script>";
        exit;
    }
} else {
    // Jika diakses langsung tanpa 'kode_jurusan' di URL, tendang kembali ke jurusan.php
    header("Location: jurusan.php");
    exit;
}

// 2. Memeriksa apakah tombol 'edit' (Submit Form) sudah ditekan
if (isset($_POST['edit'])) { 
    $kode_jurusan      = $_POST['kode_jurusan'];
    $nama_jurusan      = $_POST['nama_jurusan'];
    $kode_unit         = $_POST['kode_unit'];

    // Proses update data ke tabel tb_jurusan
    $query = mysqli_query($koneksi, "UPDATE tb_jurusan SET nama_jurusan = '$nama_jurusan', kode_unit = '$kode_unit' WHERE kode_jurusan = '$kode_jurusan'");

    if ($query) {
        echo "<script>alert('Data Berhasil Di Update'); window.location='jurusan.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Di Update: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Jurusan</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
        <?php
            // Memanggil layout komponen navigasi
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
                        <h3>Edit Data Jurusan</h3>
                        
                        <div style="margin-bottom: 15px;">
                            <a href="jurusanAdd.php" class="btn btn-danger">Tambah Jurusan</a>
                        </div>

                        <!-- Panel dengan tema Danger (Merah) -->
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                Form Edit Jurusan
                            </div>
                            <div class="panel-body">
                                <form method="POST" action="">
                                    
                                    <!-- Input Kode Jurusan (Readonly karena Primary Key) -->
                                    <div class="form-group">
                                        <label>Kode Jurusan</label>
                                        <input type="text" class="form-control" name="kode_jurusan" value="<?php echo $data['kode_jurusan']; ?>" readonly />
                                    </div>
                                    
                                    <!-- Input Nama Jurusan -->
                                    <div class="form-group">
                                        <label>Nama Jurusan</label>
                                        <input type="text" class="form-control" name="nama_jurusan" value="<?php echo $data['nama_jurusan']; ?>" required />
                                    </div>
                                    
                                    <!-- Select Dropdown Relasi dengan tabel tb_unit -->
                                    <div class="form-group">
                                        <label>Fakultas / Unit</label>
                                        <select class="form-control" name="kode_unit" required>
                                            <option value="">-- Pilih Fakultas --</option>
                                            <?php
                                            $sqlU = "SELECT * FROM tb_unit";
                                            $resultU = mysqli_query($koneksi, $sqlU);
                                            
                                            while ($dataU = mysqli_fetch_array($resultU)) {
                                                // Jika kode_unit dari tb_unit cocok dengan kode_unit di tb_jurusan, berikan atribut selected
                                                $selected = ($dataU['kode_unit'] == $data['kode_unit']) ? 'selected' : '';
                                                
                                                echo "<option value='".$dataU['kode_unit']."' ".$selected.">".$dataU['nama_unit']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <!-- Bagian Action Buttons -->
                                    <div class="form-group" style="margin-top: 20px;">
                                        <button type="submit" class="btn btn-danger" name="edit">Update Data</button>
                                        <a href="jurusan.php" class="btn btn-default">Batal</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jalur Javascript (Mengikuti template Startmin Bootstrap) -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/metisMenu.min.js"></script>
    <script src="js/startmin.js"></script>
</body>
</html>