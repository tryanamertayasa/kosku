<nav
            class="navbar navbar-store navbar-expand-lg navbar-light fixed-top"
            data-aos="fade-down"
          >
            <button
              class="btn btn-secondary d-md-none mr-auto mr-2"
              id="menu-toggle"
            >
              &laquo; Menu
            </button>

            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto d-none d-lg-flex">
                <li class="nav-item dropdown">
                  <a
                    class="nav-link"
                    href="pemilik-dashboard.php"
                    id="navbarDropdown"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <img
                      src="images/icon-user.png"
                      alt=""
                      class="rounded-circle mr-2 profile-picture"
                    />
                    <?php
                    $db = mysqli_connect("localhost", "root", "", "kosku");
                    $id=$_COOKIE['id'];
                    $result = mysqli_query($db, "SELECT `name` FROM `pemilik_kos` WHERE `id_pemilik_kos` = '$id'");
                    $row = mysqli_fetch_assoc($result);
                    echo $row["name"];
                  ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php"
                      >Home</a
                    >>
                    <a class="dropdown-item" href="pemilik-logout.php">Logout</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-inline-block mt-2" href="#">
                    <img src="images/icon-cart-empty.svg" alt="" />
                  </a>
                </li>
              </ul>
              <!-- Mobile Menu -->
              <ul class="navbar-nav d-block d-lg-none mt-3">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                  <?php
                    $db = mysqli_connect("localhost", "root", "", "kosku");
                    $id=$_COOKIE['id'];
                    $result = mysqli_query($db, "SELECT `name` FROM `pemilik_kos` WHERE `id_pemilik_kos` = '$id'");
                    $row = mysqli_fetch_assoc($result);
                    echo $row["name"];
                  ?>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-inline-block" href="#">
                    Wishlist
                  </a>
                </li>
              </ul>
            </div>
          </nav>