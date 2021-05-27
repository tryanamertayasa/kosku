<?php 
require 'functions.php';
session_start();
//ambil data di url
$id_pemilik_kos = $_COOKIE['id_pemilik'];

//query data kos
$pemilik = query("SELECT * FROM `pemilik_kos` WHERE `id_pemilik_kos`=$id_pemilik_kos")[0];

// cek tombol submit ditekan
if (isset($_POST["submit"])) {
  // cek data berhasil diubah atau tidak
  if (updatePemilikAccount($_POST) > 0){
    echo "<script>
          alert('Profil Berhasil Diubah');
          document.location.href = 'pemilik-account.php';
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
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Dashboard - Your Best Marketplace</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="style/main.css" rel="stylesheet" />
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
            href="pemilik-account.php"
            class="list-group-item list-group-item-action active"
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
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">
                  Update profil kamu
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="" method="post">
                      <div class="card">
                        <div class="card-body">
                          <div class="row mb-2">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="name">Nama</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  aria-describedby="emailHelp"
                                  name="name"
                                  value="<?= $pemilik["name"] ?>"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  id="email"
                                  aria-describedby="emailHelp"
                                  name="email"
                                  value="<?= $pemilik["email"] ?>"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="address">Alamat</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="addressOne"
                                  aria-describedby="emailHelp"
                                  name="address"
                                  value="<?= $pemilik["address"] ?>"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="city">Kabupaten atau Kota</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="addressOne"
                                  aria-describedby="emailHelp"
                                  name="regencies"
                                  value="<?= $pemilik["regencies"] ?>"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="mobile">No Telpon</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="mobile"
                                  name="no_hp"
                                  value="<?= $pemilik["no_hp"] ?>"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="zip_code">Kode Pos</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="zip_code"
                                  name="zip_code"
                                  value="<?= $pemilik["zip_code"] ?>"
                                />
                              </div>
                            </div>
                            <div class="col-md-3">
                            <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input
                                type="date"
                                class="form-control"
                                name="birth_date"
                                value="<?= $pemilik["birth_date"] ?>"
                            />
                            </div>
                            </div>
                            
                          </div>
                          <div class="row">
                            <div class="col text-right">
                              <button
                                type="submit"
                                name="submit"
                                class="btn btn-success px-5"
                              >
                                Ubah Profil
                              </button>
                            </div>
                          </div>
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
    <script src="/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
