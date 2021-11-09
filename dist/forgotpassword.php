<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$title = "Forgot Password";
include_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <?php
      include_once "../includes/navbar.php";
      $store->forgot_password();
      ?>
      <!-- start of forgot password section -->
      <main>
        <section id="forgot-password">
          <div class="container">
            <div class="forgotPass-grid">
              <div class="illustration">
                <img data-sal="slide-right" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce"
                  src="./assets/img/forgot-password.svg"
                  alt="Forgot Password"
                />
              </div>
              <div data-sal="zoom-in" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="forgotPass-form">
                <h4>Forgot Password?</h4>
                <p>Enter your registered email address to reset the password</p>
                <form method="post">
                  <div class="input-field">
                    <input
                      type="hidden"
                      name="code1"
                      value="<?= strtoupper(
                        substr(
                          str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"),
                          0,
                          1
                        )
                      ) ?>"
                    />
                    <input
                      type="hidden"
                      name="code2"
                      value="<?= strtoupper(
                        substr(
                          str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"),
                          0,
                          1
                        )
                      ) ?>"
                    />
                    <input
                      type="hidden"
                      name="code3"
                      value="<?= strtoupper(
                        substr(
                          str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"),
                          0,
                          1
                        )
                      ) ?>"
                    />
                    <input
                      type="hidden"
                      name="code4"
                      value="<?= strtoupper(
                        substr(
                          str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"),
                          0,
                          1
                        )
                      ) ?>"
                    />
                    <input
                      type="email"
                      name="customerEmail"
                      class="input input-full"
                      placeholder=" "
                    />
                    <label class="form-label">Email Address</label>
                  </div>
                  <div class="forgotPass-btn-container">
                    <a href="login.php">< Back</a>
                    <button type="submit" name="sendEmail" class="btn primary-btn send-btn">
                      Send
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- end of forgot password section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <?php require_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
    <script src="./assets/js/buttons.js"></script>
  </body>
</html>
