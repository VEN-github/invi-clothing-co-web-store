<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$user = $store->get_userdata();
$title = "Terms & Condition";
include_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <?php include_once "../includes/navbar.php"; ?>
      <!-- start of Terms & Condition section -->
      <main>
        <section id="terms-wrapper">
          <div data-sal="zoom-out" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="banner">Terms & Condition</div>
          <div class="container terms-container">
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="100" data-sal-easing="ease-out-bounce" class="content">
              <h1>Lorem Ipsum</h1>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione beatae voluptates, explicabo quaerat, culpa numquam aliquid ducimus amet, sapiente deserunt impedit. Commodi magni alias, repellat itaque quisquam ducimus est hic!</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="content">
              <h1>Lorem Ipsum</h1>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione beatae voluptates, explicabo quaerat, culpa numquam aliquid ducimus amet, sapiente deserunt impedit. Commodi magni alias, repellat itaque quisquam ducimus est hic!</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="300" data-sal-easing="ease-out-bounce" class="content">
              <h1>Lorem Ipsum</h1>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione beatae voluptates, explicabo quaerat, culpa numquam aliquid ducimus amet, sapiente deserunt impedit. Commodi magni alias, repellat itaque quisquam ducimus est hic!</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce" class="content">
              <h1>Lorem Ipsum</h1>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione beatae voluptates, explicabo quaerat, culpa numquam aliquid ducimus amet, sapiente deserunt impedit. Commodi magni alias, repellat itaque quisquam ducimus est hic!</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="500" data-sal-easing="ease-out-bounce" class="content">
              <h1>Lorem Ipsum</h1>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione beatae voluptates, explicabo quaerat, culpa numquam aliquid ducimus amet, sapiente deserunt impedit. Commodi magni alias, repellat itaque quisquam ducimus est hic!</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="600" data-sal-easing="ease-out-bounce" class="content">
              <h1>Lorem Ipsum</h1>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione beatae voluptates, explicabo quaerat, culpa numquam aliquid ducimus amet, sapiente deserunt impedit. Commodi magni alias, repellat itaque quisquam ducimus est hic!</p>
            </div>
          </div>
        </section>
      </main>
      <!-- end of Terms & Condition section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <?php require_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
  </body>
</html>