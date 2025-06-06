<?php 
session_start();
include "../../config.php";
if(empty($_SESSION['username'])) {
  echo "<script>
  window.location.href = '..';
</script>";
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
    <link href="../../assets/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="../../assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="../../assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../../assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
    <link rel="stylesheet" href="../../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    </head>
    <body class="">
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
        <!-- Brand -->
        <div class="navbar-brand pt-0">
            <a href="halamanUtama.php"><img src="../../assets/img/brand/brand.png" class="navbar-brand-img"></a>
        </div>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
            <div class="row">
                <div class="col-6 collapse-brand">
                    <a href="../index.php">
                        <img src="../../assets/img/brand/blue.png">
                    </a>
                </div>
                <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                    <span></span>
                    <span></span>
                </button>
                </div>
            </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav mt-2">
                <?php 
                    @$page = $_GET['page'];
                    ?>
                        <li class="nav-item <?php if ($page == 'dashboard' or $page == '') echo 'active' ?>">
                            <a class="nav-link <?php if ($page == 'dashboard' or $page == '') echo 'active' ?> " href="?page=dashboard">
                            <i class="bi bi-house <?php if ($page == 'dashboard' or $page == '') echo 'text-primary' ?>"></i> Home </a>
                        </li>
                        <?php
                            if ($_SESSION['group'] == 'developer' or $_SESSION['group'] == 'owner') {
                                ?>
                                    <li class="nav-item <?php if ($page == 'adminmenu' or $page == 'tambahadmin') echo 'active' ?>">
                                        <a class="nav-link <?php if ($page == 'adminmenu' or $page == 'tambahadmin') echo 'active' ?> " href="?page=adminmenu">
                                        <i class="bi bi-person-check-fill <?php if ($page == 'adminmenu' or $page == 'tambahadmin') echo 'text-primary' ?>"></i> Admin Menu </a>
                                    </li>
                                <?php
                            }
                        ?>
                        <li class="nav-item <?php if ($page == 'produk' or $page == 'tambah_produk') echo 'active' ?>">
                            <a href="?page=produk" class="nav-link <?php if ($page == 'produk' or $page == 'tambah_produk') echo 'active' ?>">
                            <i class="bi bi-shop-window <?php if ($page == 'produk' or $page == 'tambah_produk') echo 'text-primary' ?>"></i></i>Produk</a>
                        </li>
                        <li class="nav-item <?php if ($page == 'about') echo 'active' ?>">
                            <a href="?page=about" class="nav-link <?php if ($page == 'about') echo 'active' ?>">
                            <i class="bi bi-file-earmark-person <?php if ($page == 'about') echo 'text-primary' ?>"></i>About</a>
                        </li>
                    <?php
                ?>
            </ul>
        </div>
        </div>
    </nav>
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.php"></a>
            <!-- Form -->
            <!-- admin -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="../../assets/img/theme/images.jpeg">
                    </span>
                    <div class="media-body ml-2 d-none d-lg-block">
                        <span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION['nama']?></span>
                    </div>
                </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="./logout.php" class="nav-link"><i class="fas fa-power-off"></i></a>
            </li>
            </ul>
        </div>
        </nav>
        <?php 
        @$page = $_GET['page'];
        if ($page == 'dashboard') {
            include './dashboard.php';
        } elseif ($page == 'produk'){
            include './produk.php';
        } elseif ($page == 'tambah_produk') {
            include './tambah.php';
        } elseif ($page == 'about') {
            include './about.php';
        }
        elseif ($page == 'adminmenu'){
            include './adminmenu.php';
        }
        elseif ($page == 'tambahadmin'){
            include './tambahadmin.php';
        }
        else {
            include "./dashboard.php";
        }
        ?>
    </div>
    <!--   Core   -->
    <script src="../../assets/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <script src="../../assets/js/plugins/chart.js/dist/Chart.min.js"></script>
    <script src="../../assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
    <!--  JS   -->
    <script src="../../assets/js/argon-dashboard.min.js?v=1.1.2"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
        TrackJS.install({
            token: "ee6fab19c5a04ac1a32a645abde4613a",
            application: "argon-dashboard-free"
        });
        var password = document.getElementById("exampleInputPassword1")
        , confirm_password = document.getElementById("examplereInputPassword1");

        function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
    </body>
</html>