<?php 
  require 'functions.php';

  if(isset($_POST["register"])){
    if(userRegister($_POST) > 0){
      echo "<script>
            alert('Akun Berhasil Dibuat!');
            window.location.replace('login.php');
          </script>";
    } else {
      //echo mysql_error($db);
    }
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
    <!-- Navigation -->
    <?php
        include("template/navbar.php")
    ?>

    <!-- Page Content -->
    <div class="page-content page-auth mt-5" id="register">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4">
              <h2>
                Buat akunmu sekarang! <br />
                Cari kos lebih mudah 
              </h2>
              <form class="mt-3" method="post">
                <div class="form-group">
                  <label>Nama</label>
                  <input
                    type="text"
                    class="form-control"
                    aria-describedby="nameHelp"
                    v-model="name"
                    name="name"
                    autofocus
                  />
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input
                    type="email"
                    class="form-control"
                    aria-describedby="emailHelp"
                    v-model="email"
                    name="email"
                  />
                </div>
                <div class="form-group">
                  <label>No. HP</label>
                  <input
                    type="phone"
                    class="form-control"
                    aria-describedby="emailHelp"
                    v-model="email"
                    name="phone"
                  />
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input 
                    type="password" 
                    class="form-control" 
                    name="password"
                  />
                </div>
                <button type="submit" class="btn btn-success btn-block mt-4" name="register">
                  Sign Up Now
                </button>
                <button type="submit" class="btn btn-signup btn-block mt-2">
                  Back to Sign In
                </button>
              </form>
            </div>
          </div>
        </div>
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
    <script src="script/navbar-scroll.js"></script>
  </body>
</html>
