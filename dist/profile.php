<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$store->update_userdata();
$store->delete_userdata();
$userProfile = $store->setProfile();
$user = $store->get_userdata();
$title = "Profile";
include_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <?php
      include_once "../includes/navbar.php";
      $store->subscribe();
      ?>
      <!-- start of profile section -->
      <main>
        <section id="profile">
          <div class="banner">Profile</div>
          <div class="container">
            <div class="profile-wrapper">
              <?php include_once "../includes/profilesummary.php"; ?>
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
