<?php
require_once "../class/webstoreclass.php";
$store->update_userdata();
$store->delete_userdata();
$userProfile = $store->setProfile();
$user = $store->get_userdata();
$title = "Profile";
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
              <li><a href="shop.php" class="nav-link">Shop</a></li>
              <li><a href="#" class="nav-link">About</a></li>
              <li><a href="#" class="nav-link">Contact</a></li>
            </ul>
          </nav>
          <div class="side-menu">
            <div class="icon-menu">
              <div class="icon-link">
                <span
                  class="iconify search-icon"
                  data-icon="fe:search"
                  data-inline="false"
                ></span>
              </div>
              <div class="shopping-container">
                <a href="cart.php" class="icon-link">
                  <span
                    class="iconify cart-icon"
                    data-icon="gg:shopping-bag"
                    data-inline="false"
                  ></span
                ></a>
                <span id="counter" class="counter">0</span>     
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
                    <a href="profile.php?ID=<?= $user["ID"] ?>"
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
      <!-- start of profile section -->
      <main>
        <section id="profile">
          <div class="banner">Profile</div>
          <div class="container">
            <div class="profile-wrapper">
              <div class="profile-summary">
                <div class="user">
                  <span
                    class="iconify avatar"
                    data-icon="carbon:user-avatar-filled-alt"
                    data-inline="false"
                  ></span>
                  <button class="camera-btn">
                    <span
                      class="iconify camera"
                      data-icon="bx:bxs-camera"
                      data-inline="false"
                    ></span>
                  </button>
                  <p class="user-name"><?= $userProfile["firstName"] .
                    " " .
                    $userProfile["lastName"] ?></p>
                </div>
                <ul class="menu">
                  <li>
                    <a href="profile.php?ID=<?= $userProfile[
                      "ID"
                    ] ?>" class="visited"
                      ><span
                        class="iconify visited"
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
              <div class="customer-details">
                <h4>Personal Details</h4>
                <form action="" method="post">
                  <div class="input-field">
                    <input type="text" name="firstName" id="" class="input left-input" value="<?= $userProfile[
                      "firstName"
                    ] ?>" />
                    <input type="text" name="lastName" id="" class="input" value="<?= $userProfile[
                      "lastName"
                    ] ?>" />
                  </div>
                  <div class="input-field">
                    <input type="text" name="email" id="" class="input left-input disabled"
                    value="<?= $userProfile["email"] ?>" />
                    <input type="text" name="contactNumber" id="" class="input" placeholder="Contact Number"         
                    value="<?= $userProfile["contactNumber"] ?>" />
                  </div>
                  <!-- <div class="input-field">
                    <input
                      type="text"
                      name=""
                      id=""
                      class="input password left-input"
                    />
                    <input type="text" name="" id="" class="input password" />
                  </div> -->
                  <div class="button-container">
                    <button
                      type="submit"
                      name="delete"
                      class="btn outline-primary-btn del-btn"
                    >
                      <span
                        class="iconify del-acct"
                        data-icon="line-md:account-delete"
                        data-inline="false"
                      ></span>
                      Delete Account
                    </button>
                    <button type="submit" name="update" class="btn primary-btn update-btn">
                      <span
                        class="iconify save-icon"
                        data-icon="fluent:save-20-regular"
                        data-inline="false"
                      ></span>
                      Save Changes
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- end of profile section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
  </body>
</html>
