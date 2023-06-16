<?php 
include './config.php' 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- font -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Parfum.id | Toko Parfum</title>
  </head>
  <body id="home">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
        <div class="container">
          <div class="navbar-brand">
            <img src="./fotologo/logo.png" alt="logo"  width="125">
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#toko">Belanja</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- jumbotron -->
      <section class="jumbotron text-center">
        <img src="./fotologo/h.png" alt="foto" width="300">
        <p class="lead"> Selamat Datang | Toko Parfum Pamekasan</p>
        <div class="medsos">
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-twitter"></i></a>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,218.7C384,213,480,235,576,213.3C672,192,768,128,864,117.3C960,107,1056,149,1152,176C1248,203,1344,213,1392,218.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>      </section>
      <!-- akhir -->

      <!-- about -->
      <section id="about">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col"> <h2>About</h2></></div>
            </div>
            <div class="row text-center justify-content-center fs-5 text-center">
                <div class="col-md-4">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni ratione asperiores facere ut? Accusantium quaerat dignissimos animi assumenda porro aspernatur odit temporibus, nostrum deleniti alias.</p>
                </div>
                <div class="col-md-4">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni ratione asperiores facere ut? Accusantium quaerat dignissimos animi assumenda porro aspernatur odit temporibus, nostrum deleniti alias.</p>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e2edff" fill-opacity="1" d="M0,160L48,160C96,160,192,160,288,144C384,128,480,96,576,106.7C672,117,768,171,864,186.7C960,203,1056,181,1152,176C1248,171,1344,181,1392,186.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
      </section>
      <!-- akhir -->

      <!-- toko -->
      <section id="toko">
        <div class="container">
            <div class="row text-center">
                <div class="col pb-2">
                    <h2>Belanja</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php 
                $getData = mysqli_query($koneksi, "SELECT * FROM tb_barang ORDER BY kode_barang DESC LIMIT 9");
                while ($d = mysqli_fetch_assoc($getData)):
                ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="./galeri/<?= $d['kode_barang'] ?>" class="card-img-top" alt="2">
                        <div class="card-body">
                          <h5 class="card-title"><?=$d['nama_barang']?></h5>
                          <p class="card-text">Stok : <?=$d['stok']?></p>
                          <div class="row">
                            <div class="col-4 d-grid">
                              <a href="https://api.whatsapp.com/send?phone=62081331121155" class="btn btn-primary">Beli</a>
                            </div>
                            <div class="col-8 text-end px-3">
                              <p><?= 'Rp. ' . $d['harga'] ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <?php endwhile ?>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,32L40,64C80,96,160,160,240,176C320,192,400,160,480,154.7C560,149,640,171,720,165.3C800,160,880,128,960,96C1040,64,1120,32,1200,32C1280,32,1360,64,1400,80L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
      </section>
      <!-- akhir -->

      <!-- contact -->
      <section id="contact">
        <div class="container">
            <div class="row text-center">
                <div class="col pb-3">
                    <h2>Contact</h2>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-md-4">
                        <h4><i class="bi bi-envelope m-1"></i>Email</h4>
                        <p>tokoparfum21@gmail.com</p>
                    </div>
                    <div class="col-md-4">
                        <h4><i class="bi bi-telephone m-1"></i></i>Telp</h4>
                        <p>(021) 12345678</p>
                    </div>
                    <div class="col-md-4">
                        <h4><i class="bi bi-phone m-1"></i>No Hp</h4>
                        <p>+6287771162040</p>
                    </div>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63335.40561573105!2d113.41428979758211!3d-7.187908763233121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd77de299b84631%3A0x362ec9563a017d15!2sKing%20Perfume!5e0!3m2!1sid!2sid!4v1658241227273!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>              </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0d6efd" fill-opacity="1" d="M0,160L48,181.3C96,203,192,245,288,250.7C384,256,480,224,576,229.3C672,235,768,277,864,266.7C960,256,1056,192,1152,170.7C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
      </section>
      <!-- akhir -->

      <!-- footer -->
      <footer class="bg-primary text-center pb-3 text-white">
        <div class="container">
          <img src="./fotologo/logo.png" alt="h" width="150" class="pb-1">
        </div>
        <div class="copyright">
          © Copyright <strong>Parfum.id. </strong>Rights Reserved
        </div>
        <div class="desain pb-2">
          Designed by <a href="" class="text-white">Ahmad Fawaid</a>
        </div>
        <div class="sosmed">
          <a href=""><i class="bi bi-instagram"></i></a>
          <a href=""><i class="bi bi-whatsapp"></i></a>
          <a href=""><i class="bi bi-twitter"></i></a>
        </div>
      </footer>
      <!-- akhir -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>