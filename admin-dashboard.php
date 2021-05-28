<?php

  session_start();

  if(!isset($_SESSION["login"])){
    header("Location: admin-login.php");
    exit;
  }
  include 'functions.php';
  $dashboard = query("SELECT COUNT(k.id_kos) AS jumlah_kos, COALESCE(MAX(k.price), 0) AS max_price, COALESCE(MIN(k.price), 0) AS min_price FROM `kos` AS k RIGHT JOIN `pemilik_kos` AS pk USING (id_pemilik_kos)")[0];
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
            href="admin-dashboard.php"
            class="list-group-item list-group-item-action active"
            >Dashboard</a
          >
          <a
            href="admin-alllist.php"
            class="list-group-item list-group-item-action"
            >Semua List</a
          >
          <a
            href="admin-userlist.php"
            class="list-group-item list-group-item-action"
            >User List</a
          >
          <a
            href="admin-pemiliklist.php"
            class="list-group-item list-group-item-action"
            >Pemilik Kos List</a
          >
          </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <?php
            include('template/_navbar-admin.php');
          ?>

          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">
                  Ringkasan data KOSKU!
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
                        <?= $dashboard["jumlah_kos"] ?>
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
                        <?= $dashboard["min_price"] ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">
                          Harga Kos Termahal
                        </div>
                        <div class="dashboard-card-subtitle">
                        <?= $dashboard["max_price"] ?>
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
