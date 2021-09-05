<?php
require_once "../class/webstoreclass.php";
$userProfile = $store->setProfile();
$user = $store->get_userdata();
$title = "Order Review - Checkout";
include_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <main>
        <section id="checkout-process">
          <div class="checkout-banner">
            <!-- <div class="container">
              <img src="./assets/img/logo.png" alt="Logo" />
            </div> -->
          </div>
          <div class="container">
            <div class="checkout-wrapper">
              <div class="checkout-container">
                <div class="contact-info">
                  <form action="orderconfirmed.php?ID=<?= $user[
                    "ID"
                  ] ?>" method="post" id="orderForm">
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
                      Payment Method:
                      <p></p>
                    </div>
                  </div>
                  <div class="second-layer">
                    <div class="shipping-details">
                      Shipping Address:
                      <p></p>
                      <p></p>
                      <p></p>
                      <p></p>
                    </div>
                    <div class="billing-details">
                      Billing Address:
                      <p></p>
                      <p></p>
                      <p></p>
                      <p></p>
                    </div>
                  </div>
                  <div class="phone-details">
                    Phone Number:
                    <p></p>
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
                  <button type="submit" name="complete" class="btn primary-btn next-btn">
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
  </body>
</html>
