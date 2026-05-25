<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Unit</title>

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
                        <h3>Data Unit</h3>
                        
                        <div style="margin-bottom: 15px;">
                            <a href="unitAdd.php" class="btn btn-danger">Tambah Unit</a>
                        </div>

                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                Tabel Data Unit
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="50px">No</th>
                                                <th>Kode Unit</th>
                                                <th>Nama Unit</th>
                                                <th width="150px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Mengambil data dari tabel tb_unit sesuai gambar database
                                            $sql = "SELECT * FROM tb_unit"; 
                                            $result = mysqli_query($koneksi, $sql);
                                            $no = 1; 
                                            
                                            // Menampilkan data menggunakan while loop
                                            while($data = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $no++; ?></td>
                                                <td><?php echo $data['kode_unit']; ?></td>
                                                <td><?php echo $data['nama_unit']; ?></td>
                                                <td align="center">
                                                    <a href="unitEdit.php?kode_unit=<?php echo $data['kode_unit']; ?>" class="btn btn-warning btn-xs">Edit</a>
                                                    <a href="unitHapus.php?kode_unit=<?php echo $data['kode_unit']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus unit ini?')">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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