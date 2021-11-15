<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$user = $store->get_userdata();
$title = "Page not found";
include_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <?php include_once "../includes/navbar.php"; ?>
      <!-- start of 404 section -->
      <main>
        <section id="page-not-found">
          <div class="container">
            <div class="wrapper">
              <img data-sal="zoom-out" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" src="./assets/img/404.svg" alt="404" />
              <h4 data-sal="slide-down" data-sal-duration="1200" data-sal-delay="300" data-sal-easing="ease-out-bounce">Oops! Page not found</h4>
              <p data-sal="slide-down" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce">We can't seem to find the page you're looking for</p>
              <button data-sal="zoom-in" data-sal-duration="1200" data-sal-delay="600" data-sal-easing="ease-out-bounce"><a href="index.php" class="btn primary-btn back-btn" 
                >Back to Homepage</a
              ></button>
            </div>
          </div>
        </section>
      </main>
      <!-- end of 404 section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <?php require_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
  </body>
</html>