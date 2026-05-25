<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
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
                        <h3>Data Mahasiswa</h3>
                        
                        <div style="margin-bottom: 15px;">
                            <a href="mahasiswaAdd.php" class="btn btn-danger">Mahasiswa Add</a>
                        </div>

                        <!-- Panel dengan warna Danger (Merah) -->
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                Data Mahasiswa
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <!-- Tabel dengan Striped, Bordered, dan Hover -->
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nim</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Tempat lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>No HP</th>
                                                <th>Kode Jurusan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM tb_mahasiswa";
                                            $result = mysqli_query($koneksi, $sql);
                                            $no = 1; 
                                            
                                            while($data = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $no++; ?></td>
                                                <td><?php echo $data['nim']; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['tempat_lahir']; ?></td>
                                                <td><?php echo $data['tanggal_lahir']; ?></td>
                                                <td><?php echo $data['no_hp']; ?></td>
                                                <td><?php echo $data['kode_jurusan']; ?></td>
                                                <td align="center">
                                                    <!-- Tombol tanpa ikon -->
                                                    <a href="mahasiswaEdit.php?nim=<?php echo $data['nim']; ?>" class="btn btn-warning btn-xs">Edit</a>
                                                    <a href="mahasiswaHapus.php?nim=<?php echo $data['nim']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/startmin.js"></script>
</body>
</html>