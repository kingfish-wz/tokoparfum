<?php
if (isset($_POST['tambah'])) {
  $username = $_POST['username'];
  $nama = $_POST['nama'];
  $password = md5($_POST['password']);
  if (isset($password)) {
        $query = $koneksi->query("INSERT INTO tb_users VALUES ('$username', 'user', '$password', '$nama')");
        if ($query) {
            echo "<script>
            alert('Data Berhasil ditambahkan');
            window.location.href = '?page=adminmenu';
            </script>"; 
        }
    } else {
        echo "<script>
        alert('Isi data dengan benar');
        window.location.href = '?page=tambahadmin';
        </script>";
  }
}
?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
        <!-- Card stats -->
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
  <!-- Table -->
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <!-- judul -->
          <div class="row">
            <div class="col-6">
              <h3>Tambah Admin</h3>
            </div>
          </div>
          <!-- akhir judul -->
        </div>
        <!-- isi disinin -->
        <?php
        if (isset($_GET['edit_id'])) : ?>
          <?php
            $id = $_GET['edit_id'];
            $query = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE username = $id ");
            $getData = mysqli_fetch_assoc($koneksi->query("SELECT * FROM tb_users WHERE username = '$_GET[edit_id]' ")); 
            ?>
          <form method="POST" action="" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputPassword1" required="true" value="<?= $getData['username'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="true" value="<?= $getData['nama'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required="true">
                </div>
              <button type="submit" class="btn btn-primary" name="update">Update</button>
              <a class="btn btn-danger" href="?page=adminmenu">Cancel</a>
          </form>
      </div>
    <?php else : ?>
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="container-fluid">
          <div class="form-group">
            <label for="exampleInputPassword1">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputPassword1" required="true">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="true">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required="true">
          </div>
          <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
          <a class="btn btn-danger" href="?page=adminmenu">Cancel</a>
      </form>
    </div>
    <?php endif  ?>
    <?php if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $password = md5($_POST['password']);
        if (isset($password)) {
        $query = $koneksi->query("UPDATE tb_users SET nama = '$nama',  password ='$password' WHERE username = '$_GET[edit_id]' ");
        if($query) {
            echo "<script>
            alert('Data Berhasil dirubah');
            window.location.href = '?page=adminmenu';
        </script>";
        }
        }
    } ?>
  <!-- akhir isian -->
    <div class="card-footer py-4"></div>
    </div>
    </div>
</div>
<!-- Footer -->
    <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
                &copy; 2022 Parfum.id
            </div>
        </div>
    </footer>
</div>