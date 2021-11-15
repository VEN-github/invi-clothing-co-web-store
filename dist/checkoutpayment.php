<?php
require_once "../class/webstoreclass.php";
$userProfile = $store->setProfile();
$user = $store->get_userdata();
$title = "Payment - Checkout";
include_once "../includes/header.php";
$store->checkout_process();
$checkout = $store->get_checkout();
?>
  <body>
    <div class="page-container">
      <main>
        <section id="checkout-process">
          <div class="checkout-banner">
            <div class="container">
              <div class="banner-logo">
                <img src="./assets/img/logo.png" alt="Logo" />
              </div>
            </div>
            <?php include_once "../includes/stepper.php"; ?>
          </div>
          <div class="container">
            <div class="checkout-wrapper">
              <div class="checkout-container">
                <div class="contact-info">
                  <h4>Contact Information</h4>
                  <div class="user">
                    <?php if ($userProfile) { ?>
                      <?php if (
                        is_null($userProfile["profileImg"]) ||
                        empty($userProfile["profileImg"])
                      ) { ?>
                        <img alt="Profile image" class="avatar">
                      <?php } else { ?>
                        <img src="./assets/img/<?= $userProfile[
                          "profileImg"
                        ] ?>" alt="Profile image" class="avatar-img">
                      <?php } ?>
                        <input type="hidden" id="initials" value="<?= strtoupper(
  mb_substr($userProfile["firstName"], 0, 1)
),
                          strtoupper(
                            mb_substr($userProfile["lastName"], 0, 1)
                          ) ?>">
                    <?php } ?>
                    <div class="user-details">
                      <p class="user-name"><?= $userProfile["firstName"] .
                        " " .
                        $userProfile["lastName"] ?></p>
                      <p class="user-email"><?= $user["email"] ?></p>
                    </div>
                    <a href="profile.php?ID=<?= $user[
                      "ID"
                    ] ?>" class="btn secondary-btn edit-btn">
                      <span
                        class="iconify edit-icon"
                        data-icon="clarity:note-edit-line"
                        data-inline="false"
                      ></span>
                      Edit Profile</a
                    >
                  </div>
                </div>
                <form method="post">
                  <div class="form">
                    <h4>Choose Payment Method</h4>
                    <label class="radio-field" id="cod" <?= !empty(
                      $checkout["payment"]
                    ) && $checkout["payment"] == "paypal"
                      ? "style='pointer-events:none'"
                      : "" ?>>
                      <input type="radio" name="payment" value="Cash on Delivery (COD)" class="radio"
                        <?= !empty($checkout["payment"]) &&
                        $checkout["payment"] == "Cash on Delivery (COD)"
                          ? "checked=checked"
                          : "" ?>/>
                      <p class="ship-label">
                        <span
                          class="iconify payment-icon"
                          data-icon="carbon:delivery"
                          data-inline="false"
                        ></span
                        >Cash on Delivery (COD)
                      </p>
                      <span class="checkmark"></span>
                    </label>
                    <label class="radio-field" id="paypal">
                      <input type="radio" name="payment" id="paypalRadio" value="PayPal or Credit / Debit Card" class="radio" <?= !empty(
                        $checkout["payment"]
                      ) &&
                      $checkout["payment"] == "PayPal or Credit / Debit Card"
                        ? "checked=checked"
                        : "" ?>/>
                      <p class="ship-label">
                        <span class="iconify payment-icon" data-icon="icons8:paypal"></span>
                        PayPal or Credit / Debit Card
                      </p>
                      <span class="checkmark"></span>
                    </label>
                    <div id="paypal-buttons-container"></div>
                  </div>
                  <div class="button-container">
                    <button type="submit" name="backShip" class="btn outline-primary-btn back-btn">
                      <span
                        class="iconify left-arrow"
                        data-icon="dashicons:arrow-left-alt"
                        data-inline="false"
                      ></span>
                      Back to Shipping
                    </button>
                    <button type="submit" name="proceedReview" class="btn primary-btn next-btn">
                      Proceed to Order Review
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
    <script src="./assets/js/paypal.js"></script>
    <script src="./assets/js/avatar.js"></script>
  </body>
</html>
