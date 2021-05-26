<?php 
  session_start();

  if(isset($_SESSION["login"])){
    header('Location: pemilik-dashboard.php');
    exit;
  }
  require 'functions.php';

  // cek cookie
  if(isset($_COOKIE['id_pemilik']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id_pemilik'];
    $key = $_COOKIE['key'];

    //ambil username berdasarkan id
    $result = mysqli_query($db, "SELECT `name` FROM `pemilik_kos` WHERE `id_pemilik_kos` = '$id'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if($key === hash('sha256', $row["name"])){
      $_SESSION['login'] = true;
    }
  }

  if(isset($_SESSION["login"])){
    header('Location: pemilik-dashboard.php');
    exit;
  }

  if(isset($_POST["login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM `pemilik_kos` WHERE `email` = '$email'");

    // cek username
    if(mysqli_num_rows($result) === 1){
      // cek password
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row["password"])){
        // set session
        $_SESSION["login"] = true;
        setcookie('id_pemilik', $row['id_pemilik_kos'], time()+3000);
        setcookie('key', hash('sha256', $row['email']), time()+3000);
        header('Location: pemilik-dashboard.php');
        exit;
      }
    }

    $error = true;
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
        include('template\navbar.php')
    ?>

    <!-- Page Content -->
    <div class="page-content page-auth">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center row-login">
            <div class="col-lg-6 text-center">
              <img
                src="images/login-placeholder.jpg"
                alt=""
                class="w-50 mb-4 mb-lg-none"
              />
            </div>
            <div class="col-lg-5">
              <h2>
                Pasang Iklan Kos, <br />
               jadi lebih mudah
              </h2>
              <form class="mt-3" method="post">
                <div class="form-group">
                  <label>Email address</label>
                  <input
                    type="email"
                    class="form-control w-75"
                    aria-describedby="emailHelp"
                    name="email"
                  />
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control w-75" name="password"/>
                </div>
                <button
                  class="btn btn-success btn-block w-75 mt-4"
                  name="login"
                >
                  Sign In to My Account
                </button>
                <a class="btn btn-signup w-75 mt-2" href="register.php">
                  Sign Up
                </a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer>
    <?php
        include('footer.php')
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
