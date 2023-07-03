<?php
if(isset($_GET['hapus_id'])) {
  $query = $koneksi->query("DELETE FROM tb_users WHERE username = '$_GET[hapus_id]'");
if($query) {
  echo "<script>
  alert('Data Berhasil dihapus');
  window.location.href = '?page=adminmenu';
</script>";
  }
}
?>
<div class="header bg-gradient-primary  pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      </div>  
    </div>
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row">
                <div class="col-6">
                  <h3>Daftar Admin</h3>
                </div>
                <div class="col-6 text-right">
                  <a class="btn btn-success" href ="?page=tambahadmin">Tambah</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th class="text-center" scope="col">#</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE tb_users.group <> 'owner' AND tb_users.group <> 'developer'");
                    $no = 1;
                    while ($d = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['username']?></td>
                            <td class="text-center">
                              <a href="?page=tambahadmin&edit_id=<?= $d['username'] ?>" class="text-info mr-3"> <i class="fas fa-pen"></i></a>
                              <a href="?page=adminmenu&hapus_id=<?= $d['username'] ?>" class="text-danger"> <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2022 Parfum.id</a>
            </div>
          </div>
      </footer>
    </div>