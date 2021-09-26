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
      <?php include_once "../includes/navbar.php"; ?>
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
