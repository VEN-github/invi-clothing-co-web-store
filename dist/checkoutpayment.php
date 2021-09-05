<?php
require_once "../class/webstoreclass.php";
$userProfile = $store->setProfile();
$user = $store->get_userdata();
$title = "Payment - Checkout";
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
                <form action="checkoutreview.php?ID=<?= $user[
                  "ID"
                ] ?>" method="post">
                  <div class="form">
                    <h4>Choose Payment Method</h4>
                    <label class="radio-field">
                      <input type="radio" name="payment" id="" value="Cash on Delivery (COD)" class="radio" />
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
                    <label class="radio-field">
                      <input type="radio" name="payment" id="" value="Credit / Debit Card" class="radio" />
                      <p class="ship-label">
                        <span
                          class="iconify payment-icon"
                          data-icon="wpf:bank-cards"
                          data-inline="false"
                        ></span
                        >Credit / Debit Card
                      </p>
                      <span class="checkmark"></span>
                    </label>
                    <label class="radio-field">
                      <input type="radio" name="payment" id="" value="Gcash" class="radio" />
                      <p class="ship-label">
                        <img
                          src="assets/img/gcash-icon.png"
                          alt="Gcash"
                          class="gcash"
                        />
                        Gcash
                      </p>
                      <span class="checkmark"></span>
                    </label>
                    <label class="radio-field">
                      <input type="radio" name="payment" id="" value="Paymaya" class="radio" />
                      <p class="ship-label">
                        <img
                          src="assets/img/paymaya-icon.png"
                          alt="Paymaya"
                          class="payment-icon"
                        />
                        Paymaya
                      </p>
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="form">
                    <h4>Billing Address</h4>
                    <label class="radio-field">
                      <input
                        type="radio"
                        name="billingAdd"
                        id=""
                        class="radio"
                      />
                      <p class="ship-label">Same as shipping address</p>
                      <span class="checkmark"></span>
                    </label>
                    <label class="radio-field">
                      <input
                        type="radio"
                        name="billingAdd"
                        id=""
                        class="radio"
                      />
                      <p class="ship-label">Use a different Billing address</p>
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="button-container">
                    <button>
                      <a
                        class="btn outline-primary-btn back-btn"
                        href="checkoutship.php?ID=<?= $user["ID"] ?>"
                      >
                        <span
                          class="iconify left-arrow"
                          data-icon="dashicons:arrow-left-alt"
                          data-inline="false"
                        ></span
                        >Back to Shipping</a
                      >
                    </button>
                    <button type="submit" name="proceed" class="btn primary-btn next-btn">
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
  </body>
</html>
