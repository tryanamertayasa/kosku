<!-- Navigation -->
<nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
      aria-label="Navbar"
    >
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="images/logo.png" alt="" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="templat/_kost-newlist.php">Kos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="template/_kos-lokasi.php">Lokasi</a>
            </li>
            <?php
              if(!isset($_SESSION["login"])){
                include ("template/_navbar-wosession.php");
              }
            ?>
          </ul>
          <?php
          if(isset($_SESSION["login"])){
            include ("template/_navbar-session.php");
          }
          ?>
        </div>
      </div>
    </nav>