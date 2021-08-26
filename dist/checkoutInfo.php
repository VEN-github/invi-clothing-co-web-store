<?php
require_once "../class/webstoreclass.php";
$userProfile = $store->setProfile();
$user = $store->get_userdata();
$title = "Information - Checkout";
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
                <form action="checkoutship.php?ID=<?= $user[
                  "ID"
                ] ?>" method="post">
                  <div class="form">
                    <h4>Shipping Address</h4>
                    <div class="input-field">
                      <input
                        type="text"
                        name="firstName"
                        id=""
                        placeholder="First Name"
                        class="input input-left"
                      />
                      <input
                        type="text"
                        name="lastName"
                        id=""
                        placeholder="Last Name"
                        class="input input-right"
                      />
                    </div>
                    <div class="input-field">
                      <input
                        type="text"
                        name="address1"
                        id=""
                        placeholder="Address"
                        class="input input-full"
                      />
                    </div>
                    <div class="input-field">
                      <input
                        type="text"
                        name="address2"
                        id=""
                        placeholder="Apartment, suite, etc. (optional)"
                        class="input input-full"
                      />
                    </div>
                    <div class="input-field">
                      <input
                        type="text"
                        name="city"
                        id=""
                        placeholder="City"
                        class="input input-left"
                      />
                      <input
                        type="text"
                        name="postalCode"
                        id=""
                        placeholder="Postal Code"
                        class="input input-right"
                      />
                    </div>
                    <div class="input-field custom-select">
                      <select
                        class="input input-full select-menu"
                        name="region"
                        id=""
                      >
                        <option selected disabled>Region</option>
                        <option value="Metro Manila">Metro Manila</option>
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
                        id=""
                      >
                        <option selected disabled>Country</option>
                        <option value="Philippines">Philippines</option>
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
                        id=""
                        placeholder="Phone Number"
                        class="input input-full"
                      />
                    </div>
                    <div class="inputfield custom-checkbox">
                      <input type="checkbox" name="" id="" class="checkbox" />
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
                    <button type="submit" name="proceed" class="btn primary-btn next-btn">
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
              <?php
              if (!isset($_SESSION)) {
                session_start();
              }
              $subtotal = 0;
              if (isset($_SESSION["cart"])) {
                echo "<div class=\"order-summary\">
                      <h4>Order Summary</h4>";

                $productID = array_column($_SESSION["cart"], "productID");

                $connection = $store->openConnection();
                $stmt = $connection->prepare("SELECT * FROM cart_table");
                $stmt->execute();

                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  foreach ($productID as $ID) {
                    if ($result["productID"] == $ID) {
                      $store->checkoutElement(
                        $result["itemImage"],
                        $result["itemName"],
                        $result["itemColor"],
                        $result["itemPrice"],
                        $result["productID"],
                        $result["itemQty"],
                        $result["subtotal"],
                        $result["ID"]
                      );
                      $subtotal = $subtotal + $result["subtotal"];
                    }
                  }
                }
              }
              echo "<div class=\"subtotal-container\">
                <div class=\"subtotal\">
                  <p>Subtotal:</p>
                  <p class=\"price\">
                    <span
                      class=\"iconify peso-sign\"
                      data-icon=\"clarity:peso-line\"
                      data-inline=\"false\"
                    ></span>
                    <span>$subtotal.00</span>
                  </p>
                </div>
                <div class=\"shipping\">
                  <p>Shipping:</p>
                  <p class=\"price\">
                    <span
                      class=\"iconify peso-sign\"
                      data-icon=\"clarity:peso-line\"
                      data-inline=\"false\"
                    ></span>
                    <span>0.00</span>
                  </p>
                </div>
              </div>
              <div class=\"total-container\">
                Total:
                <div class=\"total\">
                  <span
                    class=\"iconify peso-sign\"
                    data-icon=\"clarity:peso-line\"
                    data-inline=\"false\"
                  ></span>
                  <span>$subtotal.00</span>
                </div>
              </div>
            </div>";
              ?>
            </div>
          </div>
        </section>
      </main>
    </div>
  </body>
</html>
