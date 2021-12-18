<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$user = $store->get_userdata();
$title = "Track Order";
include_once "../includes/header.php";
$acctID = $_GET["acctID"];
$orderID = $_GET["orderID"];
$tracking = $store->track_order($acctID, $orderID);
$store->cancel_order();
?>
  <body>
    <div class="page-container">
      <?php include_once "../includes/navbar.php"; ?>
      <!-- start of tracking order section -->
      <main>
        <section id="track-order">
          <div class="container">
            <?php if ($tracking) { ?>
              <?php foreach ($tracking as $track) { ?>
                <div class="contact-info" style="display:none">
                  <h4>Contact Information:</h4>
                  <div class="first-layer">
                    <div class="user">
                      <div class="user-details">
                        <p class="user-name"><?= $track["accountFname"] .
                          " " .
                          $track["accountLname"] ?></p>
                        <p class="user-email"><?= $track["email"] ?></p>
                      </div>
                    </div>
                    <br>
                    <div class="payment-details">
                      <h4>Shipping Address:</h4>
                      <p><?= $track["addressFname"] .
                        " " .
                        $track["addressLname"] ?></p>
                      <p><?= $track["address1"] ?></p>
                      <p><?= $track["address2"] ?></p>
                      <p><?= $track["city"] . " " . $track["postalCode"] ?></p>
                      <p><?= $track["region"] . " " . $track["country"] ?></p>
                    </div>
                  </div>
                  <br>
                  <div class="second-layer">
                    <div class="shipping-details">
                      <h4>Shipping Method:</h4>
                      <p><?= $track["shipMethod"] .
                        " - PHP " .
                        number_format($track["shipFee"], 2) ?></p>
                    </div>
                    <br>
                    <div class="billing-details">
                      <h4>Payment Method:</h4>
                      <p><?= $track["paymentMethod"] ?></p>
                    </div>
                    <br>
                    <div class="phone-details">
                    <h4>Phone Number:</h4>
                    <p><?= $track["phoneNumber"] ?></p>
                    </div>
                  </div>  
                </div>
              <?php } ?>
            <?php } ?>
            <div class="wrapper">
              <div class="card-body">
                <?php if ($tracking) { ?>
                    <?php foreach ($tracking as $track) { ?>
                    <?php } ?>  
                    <?php if ($track["orderStatus"] === "Cancelled") { ?>
                      <div class="progress-bar">
                        <ul>
                          <li><a class="active cancelled">Cancelled</a></li>
                        </ul>  
                      </div>    
                    <?php } else { ?>  
                      <div class="progress-bar">
                        <ul>
                          <li><a class="active">Order Placed</a></li>
                          <li><a class="<?php if ($tracking) {
                            foreach ($tracking as $track) {
                            }
                            if (
                              $track["orderStatus"] === "Processing" ||
                              $track["orderStatus"] === "Shipped" ||
                              $track["orderStatus"] === "Delivered"
                            ) { ?>active<?php }
                          } ?>">Processing</a></li>
                          <li><a class="<?php if ($tracking) {
                            foreach ($tracking as $track) {
                            }
                            if (
                              $track["orderStatus"] === "Shipped" ||
                              $track["orderStatus"] === "Delivered"
                            ) { ?>active<?php }
                          } ?>">Shipped</a></li>
                          <li><a class="last <?php if ($tracking) {
                            foreach ($tracking as $track) {
                            }
                            if (
                              $track["orderStatus"] === "Delivered"
                            ) { ?>active<?php }
                          } ?>">Delivered</a></li>
                        </ul>
                      </div>
                    <?php } ?>  
                  
                <?php } ?>  
                <div>
                  <div class="user-details">
                    <div class="order-details">
                      <?php if ($tracking) { ?>
                        <?php foreach ($tracking as $track) { ?>
                        <?php } ?>
                        <form method="post" id="cancelForm">
                          <input type="hidden" name="orderID" value="<?= $track[
                            "orderID"
                          ] ?>">
                          <input type="hidden" name="userEmail" value="<?= $user[
                            "email"
                          ] ?>" />
                          <input type="hidden" name="userName" value="<?= $user[
                            "firstName"
                          ] .
                            " " .
                            $user["lastName"] ?>" />
                          <input type="hidden" name="paymentMethod" value="<?= $track[
                            "paymentMethod"
                          ] ?>">
                        </form>
                        <p>Order #: <?= strtoupper($track["orderID"]) ?></p>
                        <p>Ships to <?= $track["addressFname"] .
                          " " .
                          $track["addressLname"] ?></p>
                      <?php } ?>
                    </div>
                    <div class="view-details">
                      <p id="view-details">View Details</p>
                    </div>
                  </div>
                  <div class="item-details">
                    <div class="items">
                      <?php if ($tracking) { ?>
                        <?php foreach ($tracking as $track) { ?>
                          <div class="orders">
                            <img
                              src="./assets/img/<?= $track["variantImage"] ?>"
                              alt="<?= $track["variantImage"] ?>"
                            />
                            <div class="order-details">
                              <h4><?= $track["productName"] ?></h4>
                              <?php if (is_null($track["size"])) { ?>
                                <p>Color: <?= $track["variantName"] ?></p>
                              <?php } else { ?>
                                <p>Color: <?= $track["variantName"] ?></p>
                                <p>Size: <?= $track["size"] ?></p>
                              <?php } ?>
                              <p class="price-container">
                                <span
                                  class="iconify peso-sign"
                                  data-icon="clarity:peso-line"
                                  data-inline="false"
                                ></span>
                                <span class="price"><?= number_format(
                                  $track["netSales"],
                                  2
                                ) ?></span>
                                <span class="qty">x <?= $track[
                                  "salesQty"
                                ] ?></span>
                              </p>
                            </div>
                          </div>
                        <?php } ?>
                      <?php } ?>
                    </div>
                    <div class="billing-statement">
                      <div class="payments">
                        <h4>Subtotal:</h4>
                        <p class="price-container">
                          <span
                            class="iconify peso-sign"
                            data-icon="clarity:peso-line"
                            data-inline="false"
                          ></span>
                          <span class="price"><?= number_format(
                            $track["totalAmount"] - $track["shipFee"],
                            2
                          ) ?></span>
                        </p>
                        <h4>Shipping Fee:</h4>
                        <p class="price-container">
                          <span
                            class="iconify peso-sign"
                            data-icon="clarity:peso-line"
                            data-inline="false"
                          ></span>
                          <span class="price"><?= number_format(
                            $track["shipFee"],
                            2
                          ) ?></span>
                        </p>
                        <h4>Total:</h4>
                        <p class="price-container">
                          <span
                            class="iconify peso-sign"
                            data-icon="clarity:peso-line"
                            data-inline="false"
                          ></span>
                          <span class="price"><?= number_format(
                            $track["totalAmount"],
                            2
                          ) ?></span>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="buttons">
                    <button type="button" id="cancelBtn" class="btn outline-primary-btn cancel-btn <?php if (
                      $tracking
                    ) {
                      foreach ($tracking as $track) {
                      }
                      if (
                        $track["shipMethod"] === "Express Delivery" ||
                        $track["orderStatus"] === "Shipped" ||
                        $track["orderStatus"] === "Delivered" ||
                        $track["orderStatus"] === "Cancelled"
                      ) { ?>disabled-btn<?php }
                    } ?>" href="">
                      <span
                        class="iconify cancel-icon"
                        data-icon="topcoat:cancel"
                      ></span>
                      Cancel Order
                    </button>
                    <a class="btn primary-btn back-btn" href="shop.php">
                      <span
                        class="iconify left-arrow"
                        data-icon="dashicons:arrow-left-alt"
                        data-inline="false"
                      ></span>
                      Go back Shopping
                    </a>
                  </div>        
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- end of tracking order section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <?php require_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
    <script>
      const view = document.querySelector("#view-details");
      const userInfo = document.querySelector(".contact-info").innerHTML;
      if (view) {
        view.addEventListener("click", () => {
          Swal.fire({
            title: "Customer Information",
            html: userInfo,
            showConfirmButton: false,
            showCloseButton: true,
          });
        });
      }
    </script>
    <script>
      const cancelBtn = document.querySelector("#cancelBtn");
      if (cancelBtn) {
        cancelBtn.addEventListener("click", () => {
          Swal.fire({
            title: 'Do you wish to cancel your order?',
            text: "Note: Refunds may take up to 5-7 business days to reflect on your account",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'No',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire({
                title: 'Cancel Order',
                text: 'Your order has been cancelled.',
                icon: 'success',
                showConfirmButton: false
              });
              setTimeout(function() { 
              document.querySelector('#cancelForm').submit();
            }, 1000);
            }
          })
        });
      }
    </script>
  </body>
</html>