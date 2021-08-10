<?php
require_once "../class/webstoreclass.php";
$ID = $store->login();
$user = $store->setProfile();
$userID = $store->get_userdata();
$title = "Order Confirmed - Checkout";
include_once "../includes/header.php";
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
              <li><a href="#" class="nav-link">Shop</a></li>
              <li><a href="#" class="nav-link">About</a></li>
              <li><a href="#" class="nav-link">Contact</a></li>
            </ul>
          </nav>
          <div class="side-menu">
            <div class="icon-menu">
              <div>
                <span
                  class="iconify search-icon"
                  data-icon="fe:search"
                  data-inline="false"
                ></span>
              </div>
              <div class="shopping-container">
                <a href="cart.php">
                  <span
                    class="iconify cart-icon"
                    data-icon="gg:shopping-bag"
                    data-inline="false"
                  ></span
                ></a>
                <span class="counter">0</span>
              </div>
              <div class="profile-menu">
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
            <div class="burger-btn">
              <div class="line1"></div>
              <div class="line2"></div>
              <div class="line3"></div>
            </div>
          </div>
        </div>
      </header>
      <!-- end of navbar -->
      <!-- start of order confirmed section -->
      <main>
        <section id="confirmation">
          <div class="container">
            <div class="confirmation-container">
              <h1>ORDER CONFIRMED</h1>
              <img
                src="./assets/img/order-confirmed.svg"
                alt="Order Confirmed"
              />
              <div class="confirmation-details">
                <p class="confirmation-notif">
                  Thank you, <?php echo $user["firstName"] .
                    " " .
                    $user["lastName"]; ?>. Your Order is confirmed
                </p>
                <p>
                  Your order has been placed and will be processed as soon as
                  possible.
                </p>
                <p>
                  You will be receiving an email shortly with confirmation of
                  your order.
                </p>
              </div>
              <div class="button-container">
                <a class="btn secondary-btn left-btn" href="#">
                  <span
                    class="iconify left-arrow"
                    data-icon="dashicons:arrow-left-alt"
                    data-inline="false"
                  ></span
                  >Go Back Shopping</a
                >
                <a class="btn primary-btn right-btn" href="#">
                  <span
                    class="iconify track-icon"
                    data-icon="fluent:location-20-regular"
                    data-inline="false"
                  ></span>
                  Track Order</a
                >
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- end of confirmed section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
  </body>
</html>
