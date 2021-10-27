<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$title = "Create New Password";
include_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <?php
      include_once "../includes/navbar.php";
      $store->subscribe();
      $store->forgot_password();
      ?>
      <!-- start of new password section -->
      <main>
        <section id="forgot-password">
          <div class="container">
            <div class="forgotPass-grid">
              <div class="illustration">
                <img src="./assets/img/secure-login.svg" alt="Secure Login" />
              </div>
              <div class="forgotPass-form">
                <h4>Create New Password</h4>
                <p>
                  Your new password must be different from previous used
                  passwords.
                </p>
                <form method="post">
                  <div class="input-field">
                    <input
                      type="password"
                      name="newPass"
                      placeholder="Password"
                      class="input input-full"
                    />
                    <button class="show-password">
                      <span
                        class="iconify show-pass"
                        data-icon="ant-design:eye-invisible-outlined"
                        data-inline="false"
                      ></span>
                    </button>
                  </div>
                  <div class="input-field">
                    <input
                      type="password"
                      name="confirmPass"
                      placeholder="Confirm Password"
                      class="input input-full"
                    />
                    <button class="show-password">
                      <span
                        class="iconify show-pass"
                        data-icon="ant-design:eye-invisible-outlined"
                        data-inline="false"
                      ></span>
                    </button>
                  </div>
                  <div class="input-field">
                    <button type="submit" name="resetPass" class="btn primary-btn resetpass-btn">
                      Reset Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- end of new password section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
  </body>
</html>
