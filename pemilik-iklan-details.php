<?php 
require 'functions.php';

//ambil data di url
$id_kos = $_GET["id_kos"];
$id_pemilik_kos = $_COOKIE['id_pemilik'];

//query data kos
$kos = query("SELECT * FROM `kos` WHERE `id_kos`=$id_kos AND  `id_pemilik_kos`=$id_pemilik_kos")[0];

// cek tombol submit ditekan
if (isset($_POST["submit_update"])) {
  // cek data berhasil diubah atau tidak
  if (updateKos($_POST) > 0){
    echo "<script>
          alert('Data Kos Berhasil Diubah');
          document.location.href = 'pemilik-iklan.php';
        </script>";

  } else {
    echo "Data Kos Gagal Diubah";
  }
}
if (isset($_POST["submit_delete"])) {
  // cek data berhasil diubah atau tidak
  if (deleteKos() > 0){
    echo "<script>
          alert('Data Kos Berhasil Dihapus');
          document.location.href = 'pemilik-iklan.php';
        </script>";

  } else {
    echo "Data Kos Gagal Diubah";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("header.php");?>
  </head>

  <body>
  <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="images/logo.png" alt="" class="my-4" />
          </div>
          <div class="list-group list-group-flush">
            <a
            href="pemilik-dashboard.php"
            class="list-group-item list-group-item-action"
            >Dashboard</a
          >
          <a
            href="pemilik-iklan.php"
            class="list-group-item list-group-item-action"
            >List Kos</a
          >
          <a
            href="buat-iklan.php"
            class="list-group-item list-group-item-action"
            >Buat Iklan</a
          >
          <a
            class="list-group-item list-group-item-action active"
            >Update Iklan</a
          >
          <a
            class="list-group-item list-group-item-action active"
            >Hapus Iklan</a
          >
          <a
            href="pemilik-account.php"
            class="list-group-item list-group-item-action"
            >My Account</a
          >
          </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
        <?php
            include('template/_navbar-pemilik.php');
        ?>

          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Update atau Hapus</h2>
                <p class="dashboard-subtitle">
                  Disini kamu bisa mengupdate atau menghapus data kos yang kamu miliki
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="" method="post">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="name">Nama Kos</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  aria-describedby="name"
                                  name="kos_name"
                                  value="<?= $kos["title"] ?>"
                                />
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group">
                                <label for="price">Harga Per Bulan</label>
                                <input
                                  type="number"
                                  class="form-control"
                                  id="price"
                                  aria-describedby="price"
                                  name="price"
                                  value="<?= $kos["price"] ?>"
                                />
                              </div>
                            </div>     
                            <div class="col-md-2">
                                <div class="form-group" v-if="is_store_open">
                                <label>Lokasi</label>
                                <select name="location" class="form-control">
                                    <option value="1">Badung</option>
                                    <option value="2">Bangli</option>
                                    <option value="3">Buleleng</option>
                                    <option value="4">Gianyar</option>
                                    <option value="5">Jembrana</option>
                                    <option value="6">Karangasem</option>
                                    <option value="7">Klungkung</option>
                                    <option value="8">Tabanan</option>
                                    <option value="9">Denpasar</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea
                                  name="description"
                                  id=""
                                  cols="30"
                                  rows="4"
                                  class="form-control"
                                >
                                </textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="thumbnails">Upload Foto Kos Mu</label>
                                <input
                                  type="file"
                                  multiple
                                  class="form-control pt-1"
                                  id="thumbnails"
                                  aria-describedby="thumbnails"
                                  name="pictures"
                                />
                                <small class="text-muted">
                                  Kamu dapat memilih lebih dari satu file
                                </small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-md-6">
                          <button
                            type="submit"
                            name="submit_update"
                            class="btn btn-success btn-block px-5"
                          >
                            Ubah Iklan
                          </button>
                        </div>
                        <div class="col-md-6">
                          <button
                            type="submit"
                            name="submit_delete"
                            class="btn btn-danger btn-block px-5"
                          >
                            Hapus Iklan
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /#page-content-wrapper -->
      </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.slim.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <!-- Menu Toggle Script -->
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
  </body>
</html>
