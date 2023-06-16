<?php 
include '../config.php';
session_start();
if(isset($_POST['registrasi'])){
    echo "MASUk";
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    echo $username;
    echo $nama;
    echo $password;
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = mysqli_query( $koneksi,"INSERT INTO tb_admin VALUES (NULL, '$nama','$username','$password')");
    if($query) {
        echo "<script>
        window.location.href = './login.php';
    </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Admin | Parfum.id
    </title>
    <!-- Favicon -->
    <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="./assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS -->
    <link href="./assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
</head>
<body class="bg-primary">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-6 mt-5">
                <div class="card">
                    <div class="card-body p-5">
                        <form method="POST" class="px-4" action="">
                            <h1>Daftar Akun</h1>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa-solid fa-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa-solid fa-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
                                    </div>
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                                </div>
                            </div>
                                <button type="submit" name="registrasi" class="btn btn-primary btn-block">REGISTRASI</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>