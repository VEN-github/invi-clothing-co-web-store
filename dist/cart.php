<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$user = $store->get_userdata();
$title = "Cart";
require_once "../includes/header.php";
?>
  <body>
    <?php $store->checkout(); ?>
    <div class="page-container">
      <?php include_once "../includes/navbar.php"; ?>
      <!-- start of cart section -->
      <main>
        <section id="cart">
        </section>
      </main>
      <!-- end of cart section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
    <?php include_once "../includes/scripts.php"; ?>
  </body>
</html>
