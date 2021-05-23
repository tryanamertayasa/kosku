<?php

  session_start();

  if(!isset($_SESSION["login"])){
    header("Location: pemilik-login.php");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
        include("header.php");
    ?>
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
            class="list-group-item list-group-item-action active"
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
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">
                  Ringkasan data kos-kosan anda
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">
                          Jumlah Kos
                        </div>
                        <div class="dashboard-card-subtitle">
                          4
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">
                          Harga Kos Termurah
                        </div>
                        <div class="dashboard-card-subtitle">
                          Rp 600.000
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">
                          Harga Kos Termurah
                        </div>
                        <div class="dashboard-card-subtitle">
                          Rp 1.000.000
                        </div>
                      </div>
                    </div>
                  </div>
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