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
    <?php
    include_once "../includes/navbar.php";
    $store->subscribe();
    ?>
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
  <script src="./assets/js/cart.js"></script>
</body>
</html>