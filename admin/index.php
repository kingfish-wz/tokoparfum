<?php
include '../config.php';
session_start();
if (!empty($_SESSION['username'])) {
    header('location: ./dashboard/');
}
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $query = mysqli_fetch_assoc($koneksi->query("SELECT * FROM tb_users WHERE username = '$username'"));
    # if (password_verify($password, $query['password']))
    if ($query) {
        if ($password == $query['password']) {
            $_SESSION['username'] =  $query['username'];
            $_SESSION['nama'] = $query['nama_lengkap']; 
            $_SESSION['grade'] = $query['grade']; 
            header('location: index.php?page=dashboard');
        }
        else{
            echo '<script>alert("Salah sia anying")</script>';
        }
    }
    else {
        echo '<script>alert("Salah username")</script>';
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
    <link href=".../assets/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="../assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="../assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../assets/css/argon-dashboard.css?v=1.1.3" rel="stylesheet" />
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
</head>

<body class="bg-primary">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-6 mt-5">
                <div class="card">
                    <div class="card-body p-5">
                        <form method="post" class="px-4" action="">
                            <div class="container text-center">
                                <img src="../fotologo/h.png" alt="login" width="180">
                            </div><hr>
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
                            <button type="submit" name="login" class="btn btn-primary">LOGIN</button>
                            <button type="reset" class="btn btn-danger">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>