<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$userProfile = $store->setProfile();
$user = $store->get_userdata();
$title = "Return Order";
include_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <?php
      include_once "../includes/navbar.php";
      $store->return_order();
      ?>
      <!-- start of return section -->
      <main>
        <section id="profile">
          <div data-sal="zoom-out" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="banner">Return Order</div>
          <div class="container">
            <div class="profile-wrapper">
              <?php include_once "../includes/profilesummary.php"; ?>
              <div data-sal="zoom-in" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="customer-details">
                <h4>Request Return</h4>
                <p class="note-text">Note: For return policy, INVI Clothing Co. only allow 7 days from the date received for return.</p>
                <form method="post">
                  <div class="input-field">
                    <input type="hidden" name="email" value="<?= $user[
                      "email"
                    ] ?>" />
                    <input type="hidden" name="userName" value="<?= $userProfile[
                      "firstName"
                    ] .
                      " " .
                      $userProfile["lastName"] ?>" />
                    <input type="text" name="orderID" class="input input-full" placeholder=" " />
                    <label class="form-label phone-label">Order #:</label>
                  </div>
                  <div class="input-field custom-select">
                    <select
                      class="input input-full select-menu"
                      name="reason"
                    >
                      <option selected disabled>Select a reason</option>
                      <option value="Broken Item">Broken Item</option>
                      <option value="Wrong Item">Wrong Item</option>
                      <option value="Incomplete Item">Incomplete Item</option>
                      <option value="Other Reason">Other Reason</option>
                    </select>
                    <span
                      class="iconify dropdown"
                      data-icon="ls:dropdown"
                      data-inline="false"
                    ></span>
                  </div>
                  <div class="input-field">
                    <textarea class="input input-full" name="comment" placeholder="Write additional comments here (Optional)"></textarea>
                  </div>
                  <div class="button-container">
                    <button type="submit" name="returnSubmit" class="btn primary-btn submit-return">
                      Submit
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- end of return section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <?php require_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
    <script src="./assets/js/avatar.js"></script>
    <script src="./assets/js/buttons.js"></script>
  </body>
</html>
