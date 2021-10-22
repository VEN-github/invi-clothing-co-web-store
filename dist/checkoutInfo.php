<?php
require_once "../class/webstoreclass.php";
$userProfile = $store->setProfile();
$user = $store->get_userdata();
$title = "Information - Checkout";
include_once "../includes/header.php";
$regions = $store->region();
$store->checkout_process();
$ID = $_GET["ID"];
$addresses = $store->get_address($ID);
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
            <?php include_once "../includes/stepper.php"; ?>
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
                <form method="post">
                  <div class="form">
                    <h4>Shipping Address</h4>
                    <input type="hidden" name="addressID" id="addressID" value="<?= $checkout
                      ? $checkout["addressID"]
                      : rand() ?>">
                    <?php if ($addresses) { ?>
                      <div class="input-field custom-select">
                        <select
                          class="input input-full select-menu" id="addresses"
                        >
                          <option selected disabled>Saved Addresses</option>
                          <?php foreach ($addresses as $address) { ?>
                          <option data-addressid="<?= $address[
                            "addressID"
                          ] ?>" data-fname = "<?= $address[
  "firstName"
] ?>" data-lname = "<?= $address["lastName"] ?>" data-address1 = "<?= $address[
  "address1"
] ?>" data-address2 = "<?= $address["address2"] ?>" data-city = "<?= $address[
  "city"
] ?>" data-zip = "<?= $address["postalCode"] ?>" data-region = "<?= $address[
  "region"
] ?>" data-country = "<?= $address["country"] ?>" data-phone = "<?= $address[
  "phoneNumber"
] ?>" data-primary="<?= $address["addressType"] ?>"><?= $address["address1"] .
  ", " .
  $address["city"] .
  ", " .
  $address["postalCode"] .
  " " .
  $address["region"] .
  "-" .
  $address["country"] ?></option>
                          <?php } ?>
                        </select>
                        <span
                          class="iconify dropdown"
                          data-icon="ls:dropdown"
                          data-inline="false"
                        ></span>
                      </div>
                    <?php } ?>
                    <div class="input-field">
                      <input
                        type="text"
                        name="firstName"
                        id="firstName"
                        placeholder="First Name"
                        value="<?= $checkout ? $checkout["firstName"] : "" ?>"
                        class="input input-left"
                      />
                      <input
                        type="text"
                        name="lastName"
                        id="lastName"
                        value="<?= $checkout ? $checkout["lastName"] : "" ?>"
                        placeholder="Last Name"
                        class="input input-right"
                      />
                    </div>
                    <div class="input-field">
                      <input
                        type="text"
                        name="address1"
                        id="address1"
                        value="<?= $checkout ? $checkout["address1"] : "" ?>"
                        placeholder="House Number, Street Address"
                        class="input input-full"
                      />
                    </div>
                    <div class="input-field">
                      <input
                        type="text"
                        name="address2"
                        id="address2"
                        value="<?= $checkout ? $checkout["address2"] : "" ?>"
                        placeholder="Apartment, suite, etc. (optional)"
                        class="input input-full"
                      />
                    </div>
                    <div class="input-field">
                      <input
                        type="text"
                        name="city"
                        id="city"
                        value="<?= $checkout ? $checkout["city"] : "" ?>"
                        placeholder="City"
                        class="input input-left"
                      />
                      <input
                        type="text"
                        name="postalCode"
                        id="postalCode"
                        value="<?= $checkout ? $checkout["postalCode"] : "" ?>"
                        placeholder="Postal Code"
                        class="input input-right"
                      />
                    </div>
                    <div class="input-field custom-select">
                      <select
                        class="input input-full select-menu"
                        name="region"
                        id="region"
                      >
                        <option selected disabled>Region</option>
                        <?php foreach ($regions as $region) { ?>
                          <option value="<?= $region["name"] ?>" <?= !empty(
  $checkout["region"]
) && $checkout["region"] == $region["name"]
  ? 'selected="selected"'
  : "" ?>><?= $region["name"] ?></option>
                        <?php } ?>
                      </select>
                      <span
                        class="iconify dropdown"
                        data-icon="ls:dropdown"
                        data-inline="false"
                      ></span>
                    </div>
                    <div class="input-field custom-select">
                      <select
                        class="input input-full select-menu"
                        name="country"
                        id="country"
                      >
                        <option selected disabled>Country</option>
                        <option value="Philippines" <?= $checkout
                          ? 'selected="selected"'
                          : "" ?> >Philippines</option>
                      </select>
                      <span
                        class="iconify dropdown"
                        data-icon="ls:dropdown"
                        data-inline="false"
                      ></span>
                    </div>
                    <div class="input-field">
                      <input
                        type="text"
                        name="phoneNumber"
                        id="phoneNumber"
                        value="<?= $checkout ? $checkout["phoneNumber"] : "" ?>"
                        placeholder="Phone Number"
                        class="input input-full"
                      />
                    </div>
                    <div class="inputfield custom-checkbox">
                      <input type="checkbox" name="primaryAddress" id="primaryAddress" class="checkbox" value="primary address" <?= !empty(
                        $checkout["primaryAddress"]
                      )
                        ? "checked"
                        : "" ?>/>
                      <label for="">Set as primary address</label>
                    </div>
                  </div>
                  <div class="button-container">
                    <button>
                      <a
                        class="btn outline-primary-btn back-btn"
                        href="cart.php"
                      >
                        <span
                          class="iconify left-arrow"
                          data-icon="dashicons:arrow-left-alt"
                          data-inline="false"
                        ></span
                        >Back to Cart</a
                      >
                    </button>
                    <button type="submit" name="proceedShip" class="btn primary-btn next-btn">
                      Proceed to Shipping
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
    <script src="./assets/js/addresses.js"></script>
  </body>
</html>
