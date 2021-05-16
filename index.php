<!DOCTYPE html>
<html lang="en">
  <head>
        <?php
            include("header.php");
            require("functions.php")
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
        include("template/_kos-carousel.php");
      ?>
     <?php
        include("template/_kos-location.php")
     ?>
     <?php
        include("template/_kos-newlist.php")
     ?>
    </div>

    <?php
        include("footer.php")
    ?>

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
