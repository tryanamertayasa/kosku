<!-- Desktop Menu -->
          <ul class="navbar-nav d-none d-lg-flex">
            <li class="nav-item dropdown">
                <a
                  class="nav-link"
                  href="#"
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
                    $result = mysqli_query($db, "SELECT `nama` FROM user WHERE `id_user` = '$id'");
                    $row = mysqli_fetch_assoc($result);
                    echo $row["nama"];
                  ?>
                </a>
              
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link d-inline-block mt-2" href="#">
                <img src="images/icon-cart-filled.svg" alt="" />
                <div class="cart-badge">3</div>
              </a>
            </li>
          </ul>

          <!-- Mobile Menu -->
          <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <?php
                    $db = mysqli_connect("localhost", "root", "", "kosku");
                    $id=$_COOKIE['id'];
                    $result = mysqli_query($db, "SELECT `nama` FROM user WHERE `id_user` = '$id'");
                    $row = mysqli_fetch_assoc($result);
                    echo $row["nama"];
                  ?>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-inline-block" href="#">
                Cart
              </a>
            </li>
          </ul>