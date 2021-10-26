<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$user = $store->get_userdata();
$randomProducts = $store->get_random_products();
$title = "Home";
include_once "../includes/header.php";
?>
<body>
  <div class="page-container">
    <?php
    include_once "../includes/navbar.php";
    $store->subscribe();
    ?>
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
        <?php if ($randomProducts) { ?>
          <div class="container features">
            <h1>Our products</h1>
            <div class="carousel-container">
              <?php foreach ($randomProducts as $randomProduct) { ?>
                <?php if ($randomProduct["availability"] === "Available") { ?>
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
                        <?= $randomProduct["netSales"] ?>
                        <span>.00</span>
                      </p>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?> 
            </div>
            <div class="cta">
              <a href="shop.php" class="btn primary-btn">Shop Now</a>
            </div>
          </div>
          <?php } else { ?>
            <div class="container features"><h1>No Data Available</h1></div>
          <?php } ?>  
        </section>
        <!-- end of features section -->
      <!-- start of ads section -->
      <section>
        <video width="100%" height="100%" autoplay loop muted>
          <source src="./assets/vid/Peek-A-Boo.webm" type="video/webm" />
          <source src="./assets/vid/Peek-A-Boo.mp4" type="video/mp4" />
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