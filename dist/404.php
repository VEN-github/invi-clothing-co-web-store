<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$title = "Page not found";
include_once "../includes/header.php";
?>

<body>
  <div class="page-container">
    <!-- start of navbar -->
    <header id="main-header" class="bg">
      <div class="container flex">
        <div class="logo">
          <a href="index.php"><img src="./assets/img/logo.png" alt="Logo" /></a>
        </div>
        <nav>
          <ul class="nav-links">
            <li><a href="index.php" class="nav-link">Home</a></li>
            <li><a href="shop.php" class="nav-link">Shop</a></li>
            <li><a href="#" class="nav-link">About</a></li>
            <li><a href="#" class="nav-link">Contact</a></li>
            <?php if (isset($_SESSION["userdata"])) { ?>
            <?php } else { ?>
            <li>
              <a href="login.php" class="login-nav btn outline-primary-btn">Login</a>
            </li>
            <?php } ?>
          </ul>
        </nav>
        <div class="side-menu">
          <div class="icon-menu">
            <div>
              <span class="iconify search-icon" data-icon="fe:search" data-inline="false"></span>
            </div>
            <div class="shopping-container">
              <a href="cart.php">
                <span class="iconify cart-icon" data-icon="gg:shopping-bag" data-inline="false"></span></a>

                <?php if (isset($_SESSION["cart"])) {
                  $count = count($_SESSION["cart"]);
                  echo "<span class=\"counter\">$count</span>";
                } else {
                  echo "<span class=\"counter\">0</span>";
                } ?>             
            </div>
            
            <div class="profile-menu">
            <?php if (isset($_SESSION["userdata"])) { ?>
              <div class="hover">
                <span
                  class="iconify user-icon"
                  data-icon="carbon:user-avatar"
                  data-inline="false"
                ></span>
                <span
                  class="iconify arrow"
                  data-icon="dashicons:arrow-down-alt2"
                  data-inline="false"
                ></span>
              </div>          
              <ul class="menu">
                <li>
                  <a href="profile.php?ID=<?= $user["ID"] ?>"
                    ><span
                      class="iconify"
                      data-icon="fa-solid:user"
                      data-inline="false"
                    ></span
                    >Profile</a
                  >
                </li>
                <li>
                  <a href="#">
                    <span
                      class="iconify"
                      data-icon="ant-design:home-filled"
                      data-inline="false"
                    ></span
                    >Addresses</a
                  >
                </li>
                <li>
                  <a href="#"
                    ><span
                      class="iconify"
                      data-icon="fa-solid:shopping-bag"
                      data-inline="false"
                    ></span
                    >Orders</a
                  >
                </li>
                <li>
                  <a href="#"
                    ><span
                      class="iconify"
                      data-icon="emojione-monotone:heart-suit"
                      data-inline="false"
                    ></span
                    >Wishlist</a
                  >
                </li>
                <li>
                  <a href="../includes/logout.php"
                    ><span
                      class="iconify"
                      data-icon="ls:logout"
                      data-inline="false"
                    ></span
                    >Logout</a
                  >
                </li>
              </ul>
            </div>
          </div>
          <?php } else { ?>
          <a href="login.php" class="btn outline-primary-btn login-btn">Login</a>
          <?php } ?>
          <div class="burger-btn">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
          </div>
        </div>
      </div>
    </header>
    <!-- end of navbar -->
    <!-- start of 404 section -->
    <main>
      <section id="page-not-found">
        <div class="container">
          <div class="wrapper">
            <img src="./assets/img/404.svg" alt="404" />
            <h4>Oops! Page not found</h4>
            <p>We can't seem to find the page you're looking for</p>
            <a href="index.php" class="btn primary-btn back-btn"
              >Back to Homepage</a
            >
          </div>
        </div>
      </section>
    </main>
    <!-- end of 404 section -->
    <?php require_once "../includes/footer.php"; ?>
  </div>
  <script src="./assets/js/header.js"></script>
  <script src="./assets/js/user.js"></script>
  <!-- <script src="./assets/js/cart.js"></script> -->
</body>
</html>