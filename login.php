<?php 
  session_start();

  if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
  }
  require 'functions.php';

  // cek cookie
  if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil username berdasarkan id
    $result = mysqli_query($db, "SELECT `nama` FROM user WHERE id_user = '$id'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if($key === hash('sha256', $row["nama"])){
      $_SESSION['login'] = true;
    }
  }

  if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
  }

  if(isset($_POST["login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "CALL user_login('$email')");

    // cek username
    if(mysqli_num_rows($result) === 1){
      // cek password
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row["password"])){
        // set session
        $_SESSION["login"] = true;
        setcookie('id', $row['id_user'], time()+30000);
        setcookie('key', hash('sha256', $row['email']), time()+30000);

        header("Location: index.php");
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
        include("template/navbar.php")
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
                Cari kosan, <br />
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
                <a
                  class="btn btn-success btn-block w-75 mt-4"
                  href="pemilik-login.php"
                >
                  Sign In to Pemilik Account
                </a>
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

    <?php
 
if(isset($_POST["login"]))
{

	$email = $_POST["email"];
	$password = $_POST["password"];
	$ambil = $koneksi->query("SELECT * FROM user WHERE email='$email' AND password='$password'");

	$akunyangcocok = $ambil->num_rows;

	if($akunyangcocok==1)
	{
		$akun = $ambil->fetch_assoc();
		$_SESSION["pelanggan"] = $akun;
		echo "<script>alert(' Anda sukses login');</script>";
		echo "<script>location = 'index.php';</script>";
	}
	else
	{
		echo "<script>alert('Anda gagal login, Periksa akun Anda');</script>";
		echo "<script>location = 'login.php';</script>";
	}
}

?>

  </body>
</html>
