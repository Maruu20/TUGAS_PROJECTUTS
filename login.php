<?php
// Mulai sesi
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$error = "";

// Sertakan koneksi.php (yang nanti akan diproteksi)
include "koneksi.php";

// Jika sudah login, alihkan ke dashboard index.php
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Username dan Password wajib diisi!";
    } else {
        $query = "SELECT * FROM tb_user WHERE username = '$username'";
        $result = mysqli_query($koneksi, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
                
                header("Location: index.php");
                exit;
            } else {
                $error = "Password salah!";
            }
        } else {
            $error = "Username tidak terdaftar!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD - Sign In</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color: #f8f8f8;">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-danger" style="margin-top: 25%;">
                    <div class="panel-heading">
                        <h3 class="panel-title">SIAKAD - Silakan Masuk</h3>
                    </div>
                    <div class="panel-body">
                        <?php if (!empty($error)) { ?>
                            <div class="alert alert-danger text-center">
                                <?php echo htmlspecialchars($error); ?>
                            </div>
                        <?php } ?>
                        <form role="form" method="POST" action="">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>
                                <button type="submit" name="login" class="btn btn-lg btn-danger btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Metis Menu JavaScript -->
    <script src="js/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/startmin.js"></script>
</body>
</html>
