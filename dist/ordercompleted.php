<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$userProfile = $store->setProfile();
$user = $store->get_userdata();
$title = "Order Completed - Checkout";
include_once "../includes/header.php";
$ID = $_GET["ID"];
$orderID = $store->get_orderID($ID);
?>
  <body>
    <div class="page-container">
      <?php include_once "../includes/navbar.php"; ?>
      <!-- start of order confirmed section -->
      <main>
        <section id="confirmation">
          <div class="container">
            <div data-sal="fade" data-sal-duration="1200" data-sal-delay="100" data-sal-easing="ease-out-bounce" class="confirmation-container">
              <h1>ORDER COMPLETED</h1>
              <img
                src="./assets/img/order-confirmed.svg"
                alt="Order Confirmed"
              />
              <div class="confirmation-details">
                <p class="confirmation-notif">
                  Hey, <?= $userProfile["firstName"] .
                    " " .
                    $userProfile["lastName"] ?>. Thank you for your purchase.
                </p>
                <p>
                  Your order has been placed and will be processed as soon as
                  possible.
                </p>
                <p>
                  You will be receiving an email shortly with order details.
                </p>
              </div>
              <div class="button-container">
                <a class="btn secondary-btn left-btn" href="shop.php">
                  <span
                    class="iconify left-arrow"
                    data-icon="dashicons:arrow-left-alt"
                    data-inline="false"
                  ></span
                  >Go Back Shopping</a
                >
                <a class="btn primary-btn right-btn" href="trackorder.php?acctID=<?= $user[
                  "ID"
                ] ?>&orderID=<?= $orderID["orderID"] ?>">
                  <span
                    class="iconify track-icon"
                    data-icon="fluent:location-20-regular"
                    data-inline="false"
                  ></span>
                  Track Order</a
                >
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- end of confirmed section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <?php require_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
  </body>
</html>
