<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
        include("header.php");
        require("functions.php");
    ?>
  </head>

  <body>
    <!-- Page Content -->
    <div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="images/success.svg" alt="" class="mb-4" />
              <h2>
                Welcome to kosku!
              </h2>
              <p>
                Registrasi Akun Sukses! <br />
                Let’s grow up now.
              </p>
              <div>
                <a class="btn btn-success w-50 mt-4" href="/dashboard.html">
                  Dashboard
                </a>
                <a class="btn btn-signup w-50 mt-2" href="/index.html">
                  Lihat Kos
                </a>
              </div>
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
    <script src="/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="/script/navbar-scroll.js"></script>
  </body>
</html>
