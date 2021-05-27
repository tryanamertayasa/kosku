<?php

  session_start();

  if(!isset($_SESSION["login"])){
    header("Location: admin-login.php");
    exit;
  }
  require 'functions.php';
  $userlist = query("SELECT * FROM `user`");
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
            class="list-group-item list-group-item-action"
            >Dashboard</a
          >
          <a
            href="admin-userlist.php"
            class="list-group-item list-group-item-action active"
            >User List</a
          >
          <a
            href="admin-pemiliklist.php"
            class="list-group-item list-group-item-action"
            >Pemilik Kos List</a
          >
          </div>
        </div>
        
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
                <h2 class="dashboard-title">User List</h2>
                <p class="dashboard-subtitle">
                  List User di situs KOSKU!
                </p>
              </div>
              <?php include ("template/_userlist-table.php");?>
              </div>
            </div>
          </div>
        </div>
        <!-- /#page-content-wrapper -->
    

    <footer>
     <?php
        include("footer.php")
     ?>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.slim.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="/script/navbar-scroll.js"></script>
  </body>
</html>
