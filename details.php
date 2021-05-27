<?php
  $id_kos=$_GET["id_kos"];
  session_start();
  ;
  if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
  }
  require 'functions.php';
  $kosdetails = query("SELECT `id_kos`, `name`, `title`, `price`, `description`, `id_location`, `no_hp` FROM `kos` INNER JOIN `pemilik_kos` USING (`id_pemilik_kos`) WHERE `id_kos`=$id_kos")[0];
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
        include("template/navbar.php")
    ?>

    <!-- Page Content -->
    <div class="page-content page-details">
      <?php
      include("template/_kos-breadcrumb.php");
      include("template/_kos-gallery.php");
      ?>
      
      <div class="store-details-container" data-aos="fade-up">
        <?php
            include("template/_kos-heading.php");
            include("template/_kos-description.php");
        ?>              
      </div>
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
    <script src="vendor/vue/vue.js"></script>
    <script>
      var gallery = new Vue({
        el: "#gallery",
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 0,
          photos: [
            <?php $kosimages = query("SELECT `picture` FROM `kos_galleries` WHERE `id_kos`=$id_kos");?>
            <?php $i = 1; ?>
            <?php foreach ($kosimages as $rowimages) : ?>
            {
              id: <?php echo $i;?>,
              url: "images/kos/<?php echo $rowimages['picture'];?>",
            },
          <?php $i++; ?>
            <?php endforeach; ?>
            
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
    <script src="script/navbar-scroll.js"></script>
  </body>
</html>
