<?php

  session_start();

  if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
  }
  require 'functions.php';
  $koswishlist = query("SELECT * FROM `wishlist`");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
        <?php
            include("header.php");
        ?>

  </head>
  <body>
    <!-- Navigation -->
    <?php
        include("template/navbar.php");
    ?>

    <!-- Page Content -->
    <div class="page-content page-cart">
    <?php
        include("template/_wishlist-breadcrumb.php");
    ?>
      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
            <?php
                include("template/_wishlist-table.php");
            ?>
            </div>
          </div>
        </div>
      </section>
    </div>

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
