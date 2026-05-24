<?php
include "koneksi.php";

// Ambil data jumlah
$count_mahasiswa = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_mahasiswa"))['total'];
$count_dosen = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_dosen"))['total'];
$count_matakuliah = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_matakuliah"))['total'];
$count_jurusan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_jurusan"))['total'];
$count_unit = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_unit"))['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - Dashboard</title>
        
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <link href="css/timeline.css" rel="stylesheet">
    <link href="css/startmin.css" rel="stylesheet">
    <link href="css/morris.css" rel="stylesheet">
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
                
                <!-- Welcome Section -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable" style="background-color: #d9edf7; border-color: #bce8f1; color: #31708f; padding: 20px; border-radius: 4px; margin-bottom: 25px;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h3 style="margin-top: 0;"><i class="fa fa-mortar-board"></i> Selamat Datang di SIAKAD</h3>
                            Selamat Datang di <strong>Sistem Informasi Akademik Teknik (SIAKAD)</strong>. Sistem ini dirancang untuk mempermudah pengelolaan data mahasiswa, dosen, matakuliah, jurusan, dan unit fakultas secara terintegrasi.
                        </div>
                    </div>
                </div>
                
                <!-- Dashboard Cards -->
                <div class="row">
                    <!-- Mahasiswa Card -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $count_mahasiswa; ?></div>
                                        <div>Total Mahasiswa</div>
                                    </div>
                                </div>
                            </div>
                            <a href="mahasiswa.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Detail</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Dosen Card -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-graduation-cap fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $count_dosen; ?></div>
                                        <div>Total Dosen</div>
                                    </div>
                                </div>
                            </div>
                            <a href="dosen.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Detail</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Matakuliah Card -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $count_matakuliah; ?></div>
                                        <div>Mata Kuliah</div>
                                    </div>
                                </div>
                            </div>
                            <a href="matakuliah.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Detail</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Jurusan Card -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-sitemap fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $count_jurusan; ?></div>
                                        <div>Program Studi</div>
                                    </div>
                                </div>
                            </div>
                            <a href="jurusan.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Detail</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Additional Sections -->
                <div class="row" style="margin-top: 20px;">
                    <!-- Quick Stats and Info -->
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-info-circle"></i> Ringkasan Sistem Akademik
                            </div>
                            <div class="panel-body">
                                <p>Sistem Informasi Akademik Teknik (SIAKAD) ini dirancang untuk memberikan kemudahan akses bagi administrator dalam mengelola data perkuliahan secara efisien. Anda dapat menggunakan menu di sebelah kiri untuk mengelola entitas berikut:</p>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Entitas Data</th>
                                            <th>Fungsi Utama</th>
                                            <th>Status Database</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Mahasiswa</strong></td>
                                            <td>Mengelola biodata mahasiswa, NIM, TTL, dan jurusan yang ditempuh.</td>
                                            <td><span class="label label-primary"><?php echo $count_mahasiswa; ?> Data Terdaftar</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Dosen</strong></td>
                                            <td>Mencatat NIDN dosen pengajar beserta data jenis kelamin dan telepon.</td>
                                            <td><span class="label label-success"><?php echo $count_dosen; ?> Dosen Aktif</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Mata Kuliah</strong></td>
                                            <td>Mengatur kode mata kuliah, jumlah SKS, semester, dan pemetaan jurusan.</td>
                                            <td><span class="label label-warning"><?php echo $count_matakuliah; ?> Matakuliah</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Jurusan / Prodi</strong></td>
                                            <td>Mengelola program studi yang ditawarkan di bawah koordinasi fakultas/unit.</td>
                                            <td><span class="label label-danger"><?php echo $count_jurusan; ?> Jurusan</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Unit / Fakultas</strong></td>
                                            <td>Mengelompokkan jurusan ke dalam fakultas atau unit administrasi tertentu.</td>
                                            <td><span class="label label-info"><?php echo $count_unit; ?> Unit Terdaftar</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Actions Sidebar inside dashboard -->
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bolt"></i> Aksi Cepat / Tambah Data
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="mahasiswaAdd.php" class="list-group-item">
                                        <i class="fa fa-user-plus fa-fw"></i> Tambah Mahasiswa Baru
                                    </a>
                                    <a href="dosenAdd.php" class="list-group-item">
                                        <i class="fa fa-mortar-board fa-fw"></i> Tambah Dosen Baru
                                    </a>
                                    <a href="matakuliahAdd.php" class="list-group-item">
                                        <i class="fa fa-plus-circle fa-fw"></i> Tambah Mata Kuliah
                                    </a>
                                    <a href="jurusanAdd.php" class="list-group-item">
                                        <i class="fa fa-folder-open fa-fw"></i> Tambah Jurusan / Prodi
                                    </a>
                                    <a href="unitAdd.php" class="list-group-item">
                                        <i class="fa fa-building fa-fw"></i> Tambah Unit / Fakultas
                                    </a>
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