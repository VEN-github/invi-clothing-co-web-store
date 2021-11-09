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
      $store->forgot_password();
      ?>
      <!-- start of new password section -->
      <main>
        <section id="forgot-password">
          <div class="container">
            <div class="forgotPass-grid">
              <div class="illustration">
                <img data-sal="slide-right" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" src="./assets/img/secure-login.svg" alt="Secure Login" />
              </div>
              <div data-sal="zoom-in" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="forgotPass-form">
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
                      id="signup-pass-input"
                      placeholder=" "
                      class="input input-full"
                    />
                    <label class="form-label full-label">Password</label>
                    <button type="button" class="show-password signup-show-pass signup-show-invisible">
                      <span
                        class="iconify show-pass"
                        data-icon="ant-design:eye-invisible-outlined"
                        data-inline="false"
                      ></span>
                    </button>
                    <button type="button" class="show-password signup-show-pass signup-show-visible" style="display:none;"> 
                      <span
                        class="iconify show-pass"
                        data-icon="ant-design:eye-outlined"
                        data-inline="false"
                      ></span>
                    </button>
                  </div>
                  <div class="input-field">
                    <input
                      type="password"
                      name="confirmPass"
                      id="confirm-password-input"
                      placeholder=" "
                      class="input input-full"
                    />
                    <label class="form-label full-label">Confirm Password</label>
                    <button type="button" class="show-password signup-show-confirmpass confirm-invisible">
                      <span
                        class="iconify show-pass"
                        data-icon="ant-design:eye-invisible-outlined"
                        data-inline="false"
                      ></span>
                    </button>
                    <button type="button" class="show-password signup-show-confirmpass confirm-visible" style="display:none;"> 
                      <span
                        class="iconify show-pass"
                        data-icon="ant-design:eye-outlined"
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
    <?php require_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
    <script src="./assets/js/buttons.js"></script>
  </body>
</html>
