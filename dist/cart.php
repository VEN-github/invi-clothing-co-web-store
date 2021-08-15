<?php
require_once "../class/webstoreclass.php";
session_start();
// $ID = $store->login();
$store->add_cart();
$userID = $store->get_userdata();
$title = "Cart";
require_once "../includes/header.php";

if (isset($_POST["remove"])) {
  if ($_GET["action"] == "remove") {
    foreach ($_SESSION["cart"] as $key => $value) {
      if ($value["productID"] == $_GET["ID"]) {
        unset($_SESSION["cart"][$key]);
        // echo "<script>alert('Product has been removed')</script>";
        // echo "<script>window.location='cart.php'</script>";
      }
    }
  }
}
?>
  <body>
    <div class="page-container">
      <!-- start of navbar -->
      <header id="main-header" class="bg">
        <div class="container flex">
          <div class="logo">
            <a href="index.php"
              ><img src="./assets/img/logo.png" alt="Logo"
            /></a>
          </div>
          <nav>
            <ul class="nav-links">
              <li><a href="index.php" class="nav-link">Home</a></li>
              <li><a href="shop.php" class="nav-link">Shop</a></li>
              <li><a href="#" class="nav-link">About</a></li>
              <li><a href="#" class="nav-link">Contact</a></li>
              <?php if (isset($_SESSION["userdata"])) { ?>
              <?php } else { ?>
              <li>
                <a href="login.php" class="login-nav btn outline-primary-btn"
                  >Login</a
                >
              </li>
              <?php } ?>
            </ul>
          </nav>
          <div class="side-menu">
            <div class="icon-menu">
              <div class="icon-link visited">
                <span
                  class="iconify search-icon"
                  data-icon="fe:search"
                  data-inline="false"
                ></span>
              </div>
              <div class="shopping-container">
                <a href="cart.php" class="icon-link visited">
                  <span
                    class="iconify cart-icon"
                    data-icon="gg:shopping-bag"
                    data-inline="false"
                  ></span
                ></a>
                <?php if (isset($_SESSION["cart"])) {
                  $count = count($_SESSION["cart"]);
                  echo "<span class=\"counter\">$count</span>";
                } else {
                  echo "<span class=\"counter\">0</span>";
                } ?>
              </div>
              <div class="profile-menu">
              <?php if (isset($_SESSION["userdata"])) { ?>
                <div class="hover">
                  <span
                    class="iconify user-icon"
                    data-icon="carbon:user-avatar"
                    data-inline="false"
                  ></span>
                  <span
                    class="iconify arrow"
                    data-icon="dashicons:arrow-down-alt2"
                    data-inline="false"
                  ></span>
                </div>
                <ul class="menu">
                  <li>
                    <a href="profile.php?ID=<?php echo $userID["ID"]; ?>"
                      ><span
                        class="iconify"
                        data-icon="fa-solid:user"
                        data-inline="false"
                      ></span
                      >Profile</a
                    >
                  </li>
                  <li>
                    <a href="#">
                      <span
                        class="iconify"
                        data-icon="ant-design:home-filled"
                        data-inline="false"
                      ></span
                      >Addresses</a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span
                        class="iconify"
                        data-icon="fa-solid:shopping-bag"
                        data-inline="false"
                      ></span
                      >Orders</a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span
                        class="iconify"
                        data-icon="emojione-monotone:heart-suit"
                        data-inline="false"
                      ></span
                      >Wishlist</a
                    >
                  </li>
                  <li>
                    <a href="../includes/logout.php"
                      ><span
                        class="iconify"
                        data-icon="ls:logout"
                        data-inline="false"
                      ></span
                      >Logout</a
                    >
                  </li>
                </ul>
              </div>
            </div>
            <?php } else { ?>
            <a
              href="login.php"
              class="btn login-outline-btn outline-primary-btn"
              >Login</a
            >
            <?php } ?>
            <div class="burger-btn">
              <div class="line1"></div>
              <div class="line2"></div>
              <div class="line3"></div>
            </div>
          </div>
        </div>
      </header>
      <!-- end of navbar -->
      <!-- start of cart section -->
      <main>
        <section id="cart">
          <?php
          if (!isset($_SESSION)) {
            session_start();
          }
          $subtotal = 0;
          if (isset($_SESSION["cart"])) {
            echo "<div class=\"banner\">Your Cart</div>
                      <div class=\"container\">
                        <div class=\"cart-wrapper\">
                          <div class=\"cart-container\">
                            <div class=\"cart-header\">
                              <p class=\"label-item\">Item</p>
                              <p class=\"label-price\">Price</p>
                              <p class=\"label-quantity\">Quantity</p>
                              <p>Total</p>
                            </div>";
            $productID = array_column($_SESSION["cart"], "productID");

            $connection = $store->openConnection();
            $stmt = $connection->prepare(
              "SELECT cart_table.ID, cart_table.productID, cart_table.itemImage, cart_table.itemName, cart_table.itemColor, cart_table.itemPrice, cart_table.itemQty, cart_table.subtotal ,product_table.stocks FROM cart_table INNER JOIN product_table ON cart_table.productID = product_table.ID"
            );
            $stmt->execute();

            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
              foreach ($productID as $ID) {
                if ($result["productID"] == $ID) {
                  $store->cartElement(
                    $result["itemImage"],
                    $result["itemName"],
                    $result["itemColor"],
                    $result["itemPrice"],
                    $result["stocks"],
                    $result["productID"],
                    $result["itemQty"],
                    $result["subtotal"]
                  );
                  $subtotal = $subtotal + $result["subtotal"];
                }
              }
            }
            echo "<div class=\"cont-shop\"><a href=\"index.php\">< Continue Shopping</a></div>
                </div>
                <div class=\"order-summary\">
                  <h4>Order Summary</h4>
                  <p>
                    Shipping, taxes, and discounts will be calculated at checkout.
                  </p>
                  <div class=\"note\">
                    <p>Add Note</p>
                    <textarea class=\"note-input\" name=\"\" id=\"\"></textarea>
                  </div>
                  <div class=\"subtotal-container\">
                    Subtotal:
                    <div class=\"subtotal\">
                      <span
                        class=\"iconify peso-sign\"
                        data-icon=\"clarity:peso-line\"
                        data-inline=\"false\"
                      ></span>
                      <span id=\"subtotal\">$subtotal</span>
                      <span>.00</span>
                      <input type=\"hidden\" name=\"subtotal\" id=\"input-subtotal\" value=\"$subtotal\" form=\"checkoutForm\" >
                    </div>
                  </div>
                  <div class=\"checkout\">
                    <button type=\"submit\" name=\"checkout\" class=\"btn primary-btn checkout-btn\" form=\"checkoutForm\">
                        Proceed to Checkout
                        <span
                          class=\"iconify right-arrow\"
                          data-icon=\"dashicons:arrow-right-alt\"
                          data-inline=\"false\"
                        ></span
                    </button>
                  </div>
                </div>
              </div>
            </div>";
          } else {
            echo "<div class=\"container\">
                      <div class=\"empty-cart\">
                        <img src=\"./assets/img/empty-cart.svg\" alt=\"Empty Cart\" />
                        <div class=\"empty-cart-details\">
                          <h3>Your Cart is Currently Empty</h3>
                          <p>Looks like you haven't added anything to cart yet</p>
                        </div>
                        <button><a href=\"index.php\" class=\"btn primary-btn\">Shop Now</a></button>
                      </div>
                    </div>";
          }
          ?>
        </section>
      </main>
      <!-- end of cart section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
  </body>
</html>
