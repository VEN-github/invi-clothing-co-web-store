<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$randomProducts = $store->get_random_products();
$title = "Home";
include_once "../includes/header.php";
?>

<body>
  <div class="page-container">
    <!-- start of navbar -->
    <header id="main-header">
      <div class="container flex">
        <div class="logo">
          <a href="index.php"><img src="./assets/img/logo.png" alt="Logo" /></a>
        </div>
        <nav>
          <ul class="nav-links">
            <li><a href="index.php" class="nav-link active">Home</a></li>
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
                <span id="counter" class="counter">0</span>               
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
    <main>
      <!-- start of hero section -->
      <section class="showcase">
        <div class="container grid">
          <div class="showcase-text">
            <h1><span>Step Up</span><span>Your Style</span></h1>
            <p>
              <span>INVI Clothing Co. provides quality products </span>
              <span>that never goes out of style. Your comfort is</span>
              <span>our mission.</span>
            </p>
            <button class="cta">
              <a class="btn primary-btn" href="shop.php">Shop Now</a>
            </button>
          </div>
          <div class="hero">
            <img src="./assets/img/hero-img.png" alt="Hero Image" />
          </div>
        </div>
      </section>
      <!-- end of hero section -->
      <!-- start of features section -->
      <section>
          <div class="container features">
            <h1>Our products</h1>
            <div class="carousel-container">
            <?php foreach ($randomProducts as $randomProduct) { ?>
              <div class="carousel-box">
                <div class="labels">
                  <span class="product-label"></span>
                  <!-- <button class="wishlist">
                    <span
                      class="iconify heart"
                      data-icon="ant-design:heart-outlined"
                      data-inline="false"
                    ></span>
                  </button> -->
                </div>
                <a href="productdetails.php?ID=<?= $randomProduct["ID"] ?>"
                  ><?= '<img src="./assets/img/' .
                    $randomProduct["coverPhoto"] .
                    '" alt="' .
                    $randomProduct["coverPhoto"] .
                    '">' ?></a>
                <div class="details">
                <a href="productdetails.php?ID=<?= $randomProduct[
                  "ID"
                ] ?>"><?= $randomProduct["productName"] ?></a>
                  <p class="color">
                    <?= $randomProduct["productColor"] ?>
                  </p>
                  <p class="price">
                    <span
                      class="iconify peso-sign"
                      data-icon="clarity:peso-line"
                      data-inline="false"
                    ></span>
                    <?= $randomProduct["productPrice"] ?>
                    <span>.00</span>
                  </p>
                </div>
              </div>
              <?php } ?> 
            </div>
            <div class="cta">
              <a href="shop.php" class="btn primary-btn">Shop Now</a>
            </div>
          </div>
        </section>
        <!-- end of features section -->
      <!-- start of ads section -->
      <section>
        <video width="100%" height="100%" autoplay loop muted>
          <source src="./assets/vid/INVI x Itachi Uchiha.webm" type="video/webm" />
          <source src="./assets/vid/INVI x Itachi Uchiha.mp4" type="video/mp4" />
          Sorry, your browser doesn't support embedded videos.
        </video>
      </section>
      <!-- end of ads section -->
      <!-- start of card section -->
      <section class="product-card">
        <div class="container">
          <h1>Recommendations for you</h1>
          <div class="card">
            <div class="card-container tees">
              <img src="./assets/img/Folded - Shirt - Mockup.png" alt="Tees" class="card-img" />
              <!-- <div class="card-body">
                <h4 class="card-title">Tees</h4>
                <a href="#" class="btn primary-btn">Shop Now</a>
              </div> -->
            </div>
            <div class="card-container accessories">
              <img src="./assets/img/accessories.png" alt="Accessories" class="card-img" />
              <!-- <div class="card-body">
                <h4 class="card-title">Accessories</h4>
                <a href="#" class="btn primary-btn">Shop Now</a>
              </div> -->
            </div>
            <div class="card-container collection">
              <img src="./assets/img/December - 2020 - Collection.png" alt="December 2020 Collection" />
              <!-- <div class="card-body">
                <h4 class="card-title">December 2020 Collection</h4>
                <a href="#" class="btn primary-btn">Shop Now</a>
              </div> -->
            </div>
          </div>
        </div>
      </section>
      <!-- end of card section -->
      <!-- start of info section -->
      <section class="info">
        <div class="container info-container">
          <div class="box">
            <span class="iconify shirt-icon" data-icon="ion:shirt" data-inline="false"></span>
            <div class="box-details">
              <h4>XS - 3XL</h4>
              <p>
                <span>Our garments are range in size</span><span>from XS up to 3XL</span>
              </p>
            </div>
          </div>
          <div class="box">
            <span class="iconify money-icon" data-icon="fa-solid:money-bill-alt" data-inline="false"></span>
            <div class="box-details">
              <h4>Affordable Prices</h4>
              <p>Always the best prices</p>
            </div>
          </div>
          <div class="box">
            <span class="iconify ph-flag" data-icon="emojione:flag-for-philippines" data-inline="false"></span>
            <div class="box-details">
              <h4>Made in Philippines</h4>
              <p>
                <span>Local clothing brand from</span><span>Pasig City, Philippines 1600</span>
              </p>
            </div>
          </div>
        </div>
      </section>
      <!-- end of info section -->
    </main>
    <?php require_once "../includes/footer.php"; ?>
  </div>
  <script src="./assets/js/header.js"></script>
  <script src="./assets/js/user.js"></script>
  <script src="./assets/js/cart.js"></script>
</body>
</html>