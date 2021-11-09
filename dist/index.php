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
    <?php include_once "../includes/navbar.php"; ?>
    <main>
      <!-- start of hero section -->
      <section class="showcase">
        <div class="container grid">
          <div class="showcase-text">
            <h1 data-sal="slide-down" data-sal-duration="1200" data-sal-delay="100" data-sal-easing="ease-out-bounce"><span>Step Up</span><span>Your Style</span></h1>
            <p data-sal="slide-right" data-sal-duration="1200" data-sal-delay="300" data-sal-easing="ease-out-bounce">
              <span>INVI Clothing Co. provides quality products </span>
              <span>that never goes out of style. Your comfort is</span>
              <span>our mission.</span>
            </p>
            <button data-sal="zoom-in" data-sal-duration="1200" data-sal-delay="600" data-sal-easing="ease-out-bounce" class="cta">
              <a class="btn primary-btn" href="shop.php">Shop Now</a>
            </button>
          </div>
          <div data-sal="slide-left" data-sal-duration="1200" data-sal-delay="800" data-sal-easing="ease-out-bounce" class="hero"></div>
        </div>
      </section>
      <!-- end of hero section -->
      <!-- start of features section -->
      <section>
          <div class="container features">
            <h1 data-sal="slide-up" data-sal-duration="1200" data-sal-delay="300" data-sal-easing="ease-out-bounce">Our products</h1>
            <?php if ($randomProducts) { ?>
            <div data-sal="zoom-in" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce" class="carousel-container owl-carousel">
              <?php foreach ($randomProducts as $randomProduct) { ?>
                <?php if ($randomProduct["availability"] === "Available") { ?>
                  <div class="carousel-box">
                    <a href="productdetails.php?ID=<?= $randomProduct["ID"] ?>">
                    <img loading="lazy" class="owl-lazy" data-src="./assets/img/<?= $randomProduct[
                      "coverPhoto"
                    ] ?>" data-src-retina="./assets/img/<?= $randomProduct[
  "coverPhoto"
] ?>" src="./assets/img/<?= $randomProduct[
  "coverPhoto"
] ?>" alt="<?= $randomProduct["coverPhoto"] ?>" ></a>
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
                        <?= number_format($randomProduct["netSales"], 2) ?>
                      </p>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?> 
            </div>
            <div data-sal="zoom-in" data-sal-duration="1200" data-sal-delay="600" data-sal-easing="ease-out-bounce" class="cta">
              <a href="shop.php" class="btn primary-btn">Shop Now</a>
            </div>
          </div>
          <?php } else { ?>
            <div data-sal="zoom-in" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce" class="container features no-data"><img src="./assets/img/no-data.svg" alt="No Data"><p>No Data Available</p></div>
          <?php } ?>  
        </section>
        <!-- end of features section -->
      <!-- start of ads section -->
      <section>
        <video data-sal="zoom-in" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="lazy" width="100%" height="100%" autoplay loop muted playsinline>
          <source data-src="./assets/vid/Peek-A-Boo.webm" src="" type="video/webm" />
          Sorry, your browser doesn't support embedded videos.
        </video>
      </section>
      <!-- end of ads section -->
      <!-- start of faq section -->
      <section>
        <div class="container faq-container">
          <h1 data-sal="slide-down" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce">Frequently Asked Questions</h1>
          <div data-sal="zoom-out" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce" class="accordion">
            <div class="content-box">
              <div class="question"><h4>What is the status of my order?</h4><span class="plus-icon">+</span></div>
              <div class="answer"><p>We have you covered! We will email you as items in your order ship, or if there are updates on the status of your order. Can't find the email? Go to Profile > Orders > Track. COVID-19 potential delivery delay. We apologize for the inconvenience this may cause.</p></div>
            </div>
            <div class="content-box">
              <div class="question"><h4>What is the status of my order?</h4><span class="plus-icon">+</span></div>
              <div class="answer"><p>We have you covered! We will email you as items in your order ship, or if there are updates on the status of your order. Can't find the email? Go to Profile > Orders > Track. COVID-19 potential delivery delay. We apologize for the inconvenience this may cause.</p></div>
            </div>
            <div class="content-box">
              <div class="question"><h4>What is the status of my order?</h4><span class="plus-icon">+</span></div>
              <div class="answer"><p>We have you covered! We will email you as items in your order ship, or if there are updates on the status of your order. Can't find the email? Go to Profile > Orders > Track. COVID-19 potential delivery delay. We apologize for the inconvenience this may cause.</p></div>
            </div>
            <div class="content-box">
              <div class="question"><h4>What is the status of my order?</h4><span class="plus-icon">+</span></div>
              <div class="answer"><p>We have you covered! We will email you as items in your order ship, or if there are updates on the status of your order. Can't find the email? Go to Profile > Orders > Track. COVID-19 potential delivery delay. We apologize for the inconvenience this may cause.</p></div>
            </div>
            <div class="content-box">
              <div class="question"><h4>What is the status of my order?</h4><span class="plus-icon">+</span></div>
              <div class="answer"><p>We have you covered! We will email you as items in your order ship, or if there are updates on the status of your order. Can't find the email? Go to Profile > Orders > Track. COVID-19 potential delivery delay. We apologize for the inconvenience this may cause.</p></div>
            </div>
          </div>
          <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="600" data-sal-easing="ease-out-bounce" class="see-moreBtn"><a href="faq.php"><button class="btn primary-btn">See More</button></a></div>
        </div>
      </section>
      <!-- end of faq section -->
      <!-- start of info section -->
      <section class="info">
        <div class="container info-container">
          <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="box">
            <span class="iconify shirt-icon" data-icon="ion:shirt" data-inline="false"></span>
            <div class="box-details">
              <h4>XS - 3XL</h4>
              <p>
                <span>Our garments are range in size</span><span>from XS up to 3XL</span>
              </p>
            </div>
          </div>
          <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce" class="box">
            <span class="iconify money-icon" data-icon="fa-solid:money-bill-alt" data-inline="false"></span>
            <div class="box-details">
              <h4>Affordable Prices</h4>
              <p>Always the best prices</p>
            </div>
          </div>
          <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="600" data-sal-easing="ease-out-bounce" class="box">
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
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script> 
    <?php require_once "../includes/scripts.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" integrity="sha512-dLxUelApnYxpLt6K2iomGngnHO83iUvZytA3YjDUCjT0HDOHKXnVYdf3hU4JjM8uEhxf9nD1/ey98U3t2vZ0qQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./assets/js/hover-effect.umd.js"></script>
    <script>
      var myAnimation = new hoverEffect({
        parent: document.querySelector('.hero'),
        intensity: 0.2,
        image1: 'assets/img/hero-img.webp',
        image2: 'assets/img/hero-img2.webp',
        displacementImage: 'assets/img/heightMap.png',
      });
    </script> 
  </script>
    </script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./assets/js/carousel.js"></script>
    <script src="./assets/js/lazy.js"></script>
    <script src="./assets/js/accordion.js"></script>
  </div>
</body>
</html>