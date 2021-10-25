<?php
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
require_once "../class/webstoreclass.php";
$userProfile = $store->setProfile();
$user = $store->get_userdata();
$title = "Order Review - Checkout";
include_once "../includes/header.php";
$checkout = $store->get_checkout();
$store->sales();
$store->shipping_address();
$store->placed_order_email();
?>
  <body>
    <div class="page-container">
      <main>
        <section id="checkout-process">
          <div class="checkout-banner">
            <div class="container">
              <img src="./assets/img/logo.png" alt="Logo" />
            </div>
            <?php include_once "../includes/stepper.php"; ?>
          </div>
          <div class="container">
            <div class="checkout-wrapper">
              <div class="checkout-container">
                <div class="contact-info">
                  <form method="post" id="orderForm">
                    <input type="hidden" name="orderID" id="orderID">
                    <input type="hidden" name="addressID" value="<?= $checkout[
                      "addressID"
                    ] ?>">
                    <input type="hidden" name="acctID" value="<?= $user[
                      "ID"
                    ] ?>">
                    <input type="hidden" name="userEmail" value="<?= $user[
                      "email"
                    ] ?>">
                    <input type="hidden" name="userName" value="<?= $userProfile[
                      "firstName"
                    ] .
                      " " .
                      $userProfile["lastName"] ?>">
                    <input type="hidden" name="firstName" value="<?= $checkout[
                      "firstName"
                    ] ?>">
                    <input type="hidden" name="lastName" value="<?= $checkout[
                      "lastName"
                    ] ?>">
                    <input type="hidden" name="address1" value="<?= $checkout[
                      "address1"
                    ] ?>">
                    <input type="hidden" name="address2" value="<?= $checkout[
                      "address2"
                    ] ?>">
                    <input type="hidden" name="city" value="<?= $checkout[
                      "city"
                    ] ?>">
                    <input type="hidden" name="postalCode" value="<?= $checkout[
                      "postalCode"
                    ] ?>">
                    <input type="hidden" name="region" value="<?= $checkout[
                      "region"
                    ] ?>">
                    <input type="hidden" name="country" value="<?= $checkout[
                      "country"
                    ] ?>">
                    <input type="hidden" name="phoneNumber" value="<?= $checkout[
                      "phoneNumber"
                    ] ?>">
                    <input type="hidden" name="primaryAddress" value="<?= $checkout[
                      "primaryAddress"
                    ] ?>">
                    <input type="hidden" name="deliveryMethod" value="<?= $checkout[
                      "method"
                    ] ?>">
                    <input type="hidden" name="sf" value="<?= $checkout[
                      "sf"
                    ] ?>">
                    <input type="hidden" name="payment" value="<?= $checkout[
                      "payment"
                    ] ?>">
                    <input type="hidden" name="paymentStatus" value="<?= $checkout[
                      "payment"
                    ] === "PayPal or Credit / Debit Card"
                      ? "Paid"
                      : "Pending" ?>">
                    <input type="hidden" name="orderStatus" value="Pending">
                    <h4>Customer Information</h4>
                    <p class="contact-details">Contact Information:</p>
                    <div class="first-layer">
                      <div class="user">
                        <span
                          class="iconify avatar"
                          data-icon="carbon:user-avatar-filled-alt"
                          data-inline="false"
                        ></span>
                        <div class="user-details">
                          <p class="user-name"><?= $userProfile["firstName"] .
                            " " .
                            $userProfile["lastName"] ?></p>
                          <p class="user-email"><?= $user["email"] ?></p>
                        </div>
                      </div>
                      <div class="payment-details">
                        Shipping Address:
                        <p><?= $checkout["firstName"] .
                          " " .
                          $checkout["lastName"] ?></p>
                        <p><?= $checkout["address1"] ?></p>
                        <p><?= $checkout["address2"] ?></p>
                        <p><?= $checkout["city"] .
                          " " .
                          $checkout["postalCode"] ?></p>
                        <p><?= $checkout["region"] .
                          " " .
                          $checkout["country"] ?></p>
                      </div>
                    </div>
                    <div class="second-layer">
                      <div class="shipping-details">
                        Shipping Method:
                        <p><?= $checkout["method"] .
                          " " .
                          $checkout["sf"] ?></p>
                      </div>
                      <div class="billing-details">
                        Payment Method:
                        <p><?= $checkout["payment"] ?></p>
                      </div>
                      <div class="phone-details">
                      Phone Number:
                      <p><?= $checkout["phoneNumber"] ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="button-container">
                    <button>
                      <a
                        class="btn outline-primary-btn back-btn"
                        href="checkoutpayment.php?ID=<?= $user["ID"] ?>"
                      >
                        <span
                          class="iconify left-arrow"
                          data-icon="dashicons:arrow-left-alt"
                          data-inline="false"
                        ></span
                        >Back to Payment</a
                      >
                    </button>
                    <button type="submit" name="complete" id="complete" class="btn primary-btn next-btn">
                      Complete Order
                      <span
                        class="iconify right-arrow"
                        data-icon="dashicons:arrow-right-alt"
                        data-inline="false"
                      ></span>
                    </button>
                  </div>
                </form>
              </div>
              <div class="order-summary">
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
    <script src="./assets/js/checkout.js"></script>
    <script src="./assets/js/ship.js"></script>
    <script>
      const completeBtn = document.querySelector("#complete");
      
      if (completeBtn) {
        completeBtn.addEventListener("click", () => {   
          document.querySelector("#orderID").value = Math.random().toString(36).slice(-5);
          localStorage.removeItem('productsInCart');
          localStorage.removeItem('cartNumbers');
          localStorage.removeItem('totalCost');
          localStorage.removeItem('shippingFee');
          localStorage.removeItem('total');
        });
      }
    </script>
  </body>
</html>
