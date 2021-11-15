<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$title = "Verify Password";
include_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <?php
      include_once "../includes/navbar.php";
      $store->forgot_password();
      ?>
      <!-- start of verify password section -->
      <main>
        <section id="forgot-password">
          <div class="container">
            <div class="forgotPass-grid">
              <div class="illustration">
                <img data-sal="slide-right" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce"
                  src="./assets/img/authentication.svg"
                  alt="Authentication"
                />
              </div>
              <div data-sal="zoom-in" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="forgotPass-form">
                <h4>Verification</h4>
                <p>
                  Enter the verification code we just sent you on your email
                  address.
                </p>
                <form method="post">
                  <div class="input-verification">
                    <input
                      type="text"
                      name="verifyCode1"
                      class="input input-verify"
                      maxlength="1"
                    />
                    <input
                      type="text"
                      name="verifyCode2"
                      class="input input-verify"
                      maxlength="1"
                    />
                    <input
                      type="text"
                      name="verifyCode3"
                      class="input input-verify"
                      maxlength="1"
                    />
                    <input
                      type="text"
                      name="verifyCode4"
                      class="input input-verify"
                      maxlength="1"
                    />
                  </div>
                  <div class="resend-code">
                    If you didn’t receive a code!
                    <span><a href="forgotpassword.php" class="btn resend-btn">Resend</a> </span
                    >
                  </div>
                  <div class="input-field forgotPass-btn">
                    <button type="submit" name="verifyCode" class="btn primary-btn send-btn">
                      Verify
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- end of verify password section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <?php require_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
    <script src="./assets/js/buttons.js"></script>
  </body>
</html>
