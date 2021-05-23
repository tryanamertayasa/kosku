<?php 
    session_start();
    require 'functions.php';
    // cek tombol submit ditekan
    if (isset($_POST["submit"])) {
        // cek data berhasil ditambahkan atau tidak
        echo 'mantap';
        if (createKos($_POST) > 0){
            echo "<script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'pemilik-iklan.php';
                </script>";

        } else {
            echo "<script>
                alert('Data Gagal Ditambahkan');
                </script>";
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
            class="list-group-item list-group-item-action active"
            >Buat Iklan</a
          >
          <a
            href="update-iklan.php"
            class="list-group-item list-group-item-action"
            >Update Iklan</a
          >
          <a
            href="hapus-iklan.php"
            class="list-group-item list-group-item-action"
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
                <h2 class="dashboard-title">Tambah Kos</h2>
                <p class="dashboard-subtitle">
                  Buat listing kos baru
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
                                  value=""
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
                                  value=""
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
                        <div class="col">
                          <button
                            type="submit"
                            name="submit"
                            class="btn btn-success btn-block px-5"
                          >
                            Buat Iklan Kos Mu!
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
