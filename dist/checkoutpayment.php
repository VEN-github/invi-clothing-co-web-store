<?php
  require_once('../class/webstoreclass.php');
  $user = $store->setProfile();
  $userID = $store->get_userdata();
  $title = 'Payment - Checkout';
  include_once('../includes/header.php');

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
                      <p class="user-name"><?php echo $user['firstName']." ".$user['lastName'];?></p>
                      <p class="user-email"><?php echo $user['email'];?></p>
                    </div>
                    <a href="profile.php?ID=<?php echo $userID['ID'];?>" class="btn secondary-btn edit-btn">
                      <span
                        class="iconify edit-icon"
                        data-icon="clarity:note-edit-line"
                        data-inline="false"
                      ></span>
                      Edit Profile</a
                    >
                  </div>
                </div>
                <form action="checkoutreview.php?ID=<?php echo $userID['ID'];?>" method="post">
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
                        href="checkoutship.php?ID=<?php echo $userID['ID'];?>"
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
              <?php
            if(!isset($_SESSION)){
                session_start();
            }
            $subtotal = 0;
            if(isset($_SESSION['cart'])){
              echo "<div class=\"order-summary\">
                      <h4>Order Summary</h4>";
                        
              
              $productID = array_column($_SESSION['cart'], "productID");

              $connection = $store->openConnection();
              $stmt = $connection->prepare("SELECT * FROM cart_table");
              $stmt->execute();
              
              while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                  foreach($productID as $ID){
                    if($result['productID'] == $ID){
                        $store->checkoutElement($result['itemImage'], $result['itemName'], $result['itemColor'], $result['itemPrice'], $result['productID'], $result['itemQty'], $result['subtotal'], $result['ID'] );
                        $subtotal = $subtotal + $result['subtotal'];
                    }
                  }
              }
            }echo 
              "<div class=\"subtotal-container\">
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
                    <span id=\"shipping-fee\">0</span>
                    <span>.00</span>
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
    <script src="./assets/js/ship.js"></script>
  </body>
</html>
