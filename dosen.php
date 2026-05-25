<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>

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
                        <h3>Data Dosen</h3>
                        
                        <div style="margin-bottom: 15px;">
                            <a href="dosenAdd.php" class="btn btn-danger">Tambah Dosen</a>
                        </div>

                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                Tabel Data Dosen
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="50px">No</th>
                                                <th>NIDN</th>
                                                <th>Nama Dosen</th>
                                                <th>Email</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Telepon</th>
                                                <th width="150px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Gunakan prepared statement untuk keamanan
                                            $stmt = $koneksi->prepare("SELECT * FROM tb_dosen");
                                            
                                            if (!$stmt) {
                                                echo "<tr><td colspan='7' align='center'><strong>Error: " . $koneksi->error . "</strong></td></tr>";
                                            } else {
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                $no = 1; 
                                                
                                                if ($result->num_rows === 0) {
                                                    echo "<tr><td colspan='7' align='center'><strong>Data Dosen Kosong</strong></td></tr>";
                                                } else {
                                                    while($data = $result->fetch_array()) {
                                                    ?>
                                            <tr>
                                                <td align="center"><?php echo $no++; ?></td>
                                                <td><?php echo htmlspecialchars($data['nidn']); ?></td>
                                                <td><?php echo htmlspecialchars($data['nama']); ?></td>
                                                <td><?php echo htmlspecialchars($data['email']); ?></td>
                                                <td><?php echo htmlspecialchars($data['jenis_kelamin']); ?></td>
                                                <td><?php echo htmlspecialchars($data['telepon']); ?></td>
                                                <td align="center">
                                                    <a href="dosenEdit.php?nidn=<?php echo urlencode($data['nidn']); ?>" class="btn btn-warning btn-xs">Edit</a>
                                                    <a href="dosenHapus.php?nidn=<?php echo urlencode($data['nidn']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data dosen ini?')">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php
                                                    }
                                                }
                                                $stmt->close();
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