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
          <div class="hero"></div>
        </div>
      </section>
      <!-- end of hero section -->
      <!-- start of features section -->
      <section>
        <?php if ($randomProducts) { ?>
          <div class="container features">
            <h1>Our products</h1>
            <div class="carousel-container owl-carousel">
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
        <video class="lazy" width="100%" height="100%" autoplay loop muted playsinline>
          <source data-src="./assets/vid/Peek-A-Boo.webm" src="" type="video/webm" />
          <source data-src="./assets/vid/Peek-A-Boo.mp4" src="" type="video/mp4" />
          Sorry, your browser doesn't support embedded videos.
        </video>
      </section>
      <!-- end of ads section -->
      <!-- start of faq section -->
      <section>
        <div class="container faq-container">
          <h1>Frequently Asked Questions</h1>
          <div class="accordion">
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
          <div class="see-moreBtn"><a href="#"><button class="btn primary-btn">See More</button></a></div>
        </div>
      </section>
      <!-- end of faq section -->
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

      if ("IntersectionObserver" in window) {
        var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
          entries.forEach(function(video) {
            if (video.isIntersecting) {
              for (var source in video.target.children) {
                var videoSource = video.target.children[source];
                if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
                  videoSource.src = videoSource.dataset.src;
                }
              }

              video.target.load();
              video.target.classList.remove("lazy");
              lazyVideoObserver.unobserve(video.target);
            }
          });
        });

        lazyVideos.forEach(function(lazyVideo) {
          lazyVideoObserver.observe(lazyVideo);
        });
      }
    });
  </script>
  <script>
    $(".carousel-container").owlCarousel({
      center: true,
      lazyLoad:true,
      loop:true,
      autoplay:true,
      nav:false,
      dots:false,
      autoWidth:true,
      autoplayTimeout:2000,
      autoplayHoverPause:true,
      responsiveClass:true,
      responsive:{
        0:{
          items:1,
          nav:false
        },
        600:{
          items:2,
          nav:false
        },
        1000:{
          items:3,
          nav:false,
        }
      }
    });
  </script>
  <script src="./assets/js/accordion.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" integrity="sha512-dLxUelApnYxpLt6K2iomGngnHO83iUvZytA3YjDUCjT0HDOHKXnVYdf3hU4JjM8uEhxf9nD1/ey98U3t2vZ0qQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js" integrity="sha512-eP6ippJojIKXKO8EPLtsUMS+/sAGHGo1UN/38swqZa1ypfcD4I0V/ac5G3VzaHfDaklFmQLEs51lhkkVaqg60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="./assets/js/hover-effect.umd.js"></script>
  <script>
    var myAnimation = new hoverEffect({
      parent: document.querySelector('.hero'),
      intensity: 0.2,
      image1: 'assets/img/hero-img.png',
      image2: 'assets/img/hero-img2.png',
      displacementImage: 'assets/img/heightMap.png',
    });
  </script>
</body>
</html>