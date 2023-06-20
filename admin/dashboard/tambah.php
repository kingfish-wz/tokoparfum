<?php
if (isset($_POST['tambah'])) {
  $nama = $_POST['namabarang'];
  $harga = $_POST['harga'];
  @$ekstensi =  array('png');
  $kode_barang = strtolower(str_replace(" ", "_", $nama));
  @$fileName = $_FILES['foto']['name'];
  @$ext = pathinfo($fileName, PATHINFO_EXTENSION);
  if (in_array($ext, $ekstensi)) {
        $query = $koneksi->query("INSERT INTO tb_barang VALUES ('$kode_barang', '$nama', '$harga')");
        if ($query) {
            move_uploaded_file($_FILES['foto']['tmp_name'], '../../galeri/' . $kode_barang . '.png');
            echo "<script>
            alert('Data Berhasil ditambahkan');
            window.location.href = '?page=produk';
            </script>";
        }
    } else {
        echo "<script>
        alert('Data Bukan Gambar');
        window.location.href = '?page=tambah_produk';
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
              <h3>Produk</h3>
            </div>
          </div>
          <!-- akhir judul -->
        </div>
        <!-- isi disinin -->
        <?php
        if (isset($_GET['edit_id'])) : ?>
          <?php
          $getData = mysqli_fetch_assoc($koneksi->query("SELECT * FROM tb_barang WHERE kode_barang = ' $_GET[edit_id]' ")); ?>
          <form method="POST" action="" enctype="multipart/form-data">
            <div class="container-fluid">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Barang</label>
                <input type="text" name="namabarang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $getData['nama_barang'] ?>" required="true">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Stok</label>
                <input type="text" name="stok" class="form-control" id="exampleInputPassword1" value="<?= $getData['stok'] ?>" required="true">
              </div>
              <div class="form-group">
                <input type="file" accept="image/png" name="foto" class="form-control-file" id="exampleFormControlFile1">
              </div>
              <button type="submit" class="btn btn-primary" name="update">Update</button>
              <a class="btn btn-danger" href="?page=produk">Cancel</a>
          </form>
      </div>
    <?php else : ?>
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="container-fluid">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Barang</label>
            <input type="text" name="namabarang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="true">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Harga</label>
            <input type="text" name="harga" class="form-control" id="exampleInputPassword1" required="true">
          </div>
          <div class="form-group">
            <input type="file" name="foto" accept="image/png" class="form-control-file" id="exampleFormControlFile1" required="true">
          </div>
          <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
          <a class="btn btn-danger" href="?page=produk">Cancel</a>
      </form>
    </div>
    <?php endif  ?>
    <?php if (isset($_POST['update'])) {
        $nama = $_POST['namabarang'];
        $harga = $_POST['harga'];
        if (empty($file)) {
        $query = $koneksi->query("UPDATE tb_barang SET nama_barang = '$nama',  harga ='$harga' WHERE kode_barang = '$_GET[edit_id]' ");
        if($query) {
            echo "<script>
            alert('Data Berhasil dirubah');
            window.location.href = '?page=produk';
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