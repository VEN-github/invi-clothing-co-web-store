<?php
require_once "../class/webstoreclass.php";
$userProfile = $store->setProfile();
$user = $store->get_userdata();
$title = "Shipping - Checkout";
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
              <img src="./assets/img/logo.png" alt="Logo" />
            </div>
          </div>
          <div class="container">
            <div class="checkout-wrapper">
              <div class="checkout-container">
                <div class="contact-info">
                  <h4>Contact Information</h4>
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
                <div class="form">
                  <h4>Choose Shipping Method</h4>
                  <form method="post" id="sf-method">
                    <label class="radio-field">
                      <input type="radio" name="delivery" id="ship-method" class="radio" value="Standard Delivery" <?= !empty(
                        $checkout["method"]
                      ) &&
                      $checkout["method"] == "Standard Delivery" &&
                      !empty($checkout["sf"])
                        ? "checked=checked"
                        : "" ?>/>
                      <p class="ship-label">Standard Delivery</p>
                      <div class="ship-details">
                        <div class="del-time">
                          Delivery time
                          <p class="del-details"><?= !empty(
                            $checkout["region"] == "Metro Manila"
                          )
                            ? "2-3 Days"
                            : "5-7 Days" ?></p>
                        </div>
                        <div class="ship-fee">
                          Shipping Fee
                          <p class="price">
                            <span
                              class="iconify peso-sign"
                              data-icon="clarity:peso-line"
                              data-inline="false"
                            ></span>
                            <span id="sf"><?= !empty(
                              $checkout["region"] == "Metro Manila"
                            )
                              ? "100.00"
                              : "180.00" ?></span>
                          </p>
                        </div>
                      </div>
                      <span class="checkmark"></span>
                    </label>
                    <?php date_default_timezone_set("Asia/Manila"); ?>
                    <?= $checkout["region"] == "Metro Manila" &&
                    (date("H") >= 8 && date("H") <= 15)
                      ? '
                    <label class="radio-field">
                      <input type="radio" name="delivery" id="ship-method" class="radio" value="Express Delivery"' .
                        (!empty($checkout["method"]) &&
                        $checkout["method"] == "Express Delivery" &&
                        !empty($checkout["sf"])
                          ? "checked=checked"
                          : "") .
                        '/>
                      <p class="ship-label">Express Delivery</p>
                      <div class="ship-details">
                        <div class="del-time">
                          Delivery time
                          <p class="del-details">Same Day</p>
                        </div>
                        <div class="ship-fee">
                          Shipping Fee
                          <p class="price">
                            <span
                              class="iconify peso-sign"
                              data-icon="clarity:peso-line"
                              data-inline="false"
                            ></span>
                            <span id="sf">200.00</span>
                          </p>
                        </div>
                      </div>
                      <span class="checkmark"></span>
                    </label>'
                      : "" ?>
                  </div>
                  <div class="button-container">
                    <button>
                      <a
                        class="btn outline-primary-btn back-btn"
                        href="checkoutInfo.php?ID=<?= $user["ID"] ?>"
                      >
                        <span
                          class="iconify left-arrow"
                          data-icon="dashicons:arrow-left-alt"
                          data-inline="false"
                        ></span
                        >Back to Information</a
                      >
                    </button>
                    <button type="submit" name="proceedPayment" id="proceedPayment" class="btn primary-btn next-btn">
                      Proceed to Payment
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
