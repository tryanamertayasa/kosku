<?php

  session_start();

  if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
  }
  require 'functions.php';
  $kosdata = query("SELECT `id_kos`, `title`, `price`, `id_location`, `picture` FROM `kos` INNER JOIN `kos_galleries` USING (`id_kos`) WHERE `price` BETWEEN 500000 AND 800000 GROUP BY `id_kos`");
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
    <div class="page-content page-home">
      <?php
        include("template/_kos-newlist.php");
      ?>
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
    <script src="script/navbar-scroll.js"></script>
  </body>
</html>
